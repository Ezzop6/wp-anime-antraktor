<?php

class AntraktorEpisodeManager {
  public static $table_name;
  public static $DB;

  public static function init() {
    if (!isset(self::$table_name)) {
      global $wpdb;
      self::$table_name = ANTRAKTOR_DB_PREFIX . 'episodes';
      self::$DB = $wpdb;
    }
  }

  public static function get_record($tmdb_series_id, $season_number, $episode_number) {
    return self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE tmdb_series_id = '$tmdb_series_id' AND season_number = '$season_number' AND episode_number = '$episode_number'")[0] ?? null;
  }

  public static function delete_episode($tmdb_series_id, $season_number, $episode_number) {
    $result = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE tmdb_series_id = '$tmdb_series_id' AND season_number = '$season_number' AND episode_number = '$episode_number'")[0];
    if (!$result) {
      throw new Exception("Episode not found for tmdb_series_id = $tmdb_series_id, season_number = $season_number, episode_number = $episode_number");
    }
    $table_name = self::$table_name;
    $sql = "DELETE FROM $table_name WHERE tmdb_series_id = %s AND season_number = %d AND episode_number = %d";
    $prepared_sql = self::$DB->prepare($sql, $tmdb_series_id, $season_number, $episode_number);
    self::$DB->query($prepared_sql);
    if (self::$DB->last_error) {
      throw new Exception(self::$DB->last_error);
    }
    return true;
  }

  public static function update_episode_details($tmdb_series_id, $season_number, $episode_number) {
    self::delete_episode($tmdb_series_id, $season_number, $episode_number);
    self::add_record($tmdb_series_id, $season_number, $episode_number);
  }

  public static function delete_all_episodes($tmdb_series_id) {
    $table_name = self::$table_name;
    $sql = "DELETE FROM $table_name WHERE tmdb_series_id = %s";
    $prepared_sql = self::$DB->prepare($sql, $tmdb_series_id);
    self::$DB->query($prepared_sql);
    if (self::$DB->last_error) {
      throw new Exception(self::$DB->last_error);
    }
    return true;
  }

  public static function update_progress($tmdb_series_id, $season_number, $episode_number, float $progress): bool {
    $result = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE tmdb_series_id = '$tmdb_series_id' AND season_number = '$season_number' AND episode_number = '$episode_number'")[0];
    if (!$result) {
      throw new Exception("Episode not found for tmdb_series_id = $tmdb_series_id, season_number = $season_number, episode_number = $episode_number");
    }
    $table_name = self::$table_name;
    $watch_status = 'watching';
    $sql = <<<SQL
    UPDATE $table_name
    SET watch_progress = %f,
        watch_last_time = NOW(),
        watch_status = %s
    WHERE tmdb_series_id = %s
    AND season_number = %d
    AND episode_number = %d
  SQL;
    $prepared_sql = self::$DB->prepare($sql, $progress, $watch_status, $tmdb_series_id, $season_number, $episode_number);
    self::$DB->query($prepared_sql);
    if (self::$DB->last_error) {
      throw new Exception(self::$DB->last_error);
    }
    return true;
  }

  public static function mark_as_complete($tmdb_series_id, $season_number, $episode_number): bool {
    $result = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE tmdb_series_id = '$tmdb_series_id' AND season_number = '$season_number' AND episode_number = '$episode_number'")[0];
    if (!$result) {
      throw new Exception("Episode not found for tmdb_series_id = $tmdb_series_id, season_number = $season_number, episode_number = $episode_number");
    }
    $table_name = self::$table_name;
    $watch_status = $result->watch_status;
    $watch_count = $result->watch_count + 1;
    $watch_status = 'watched';
    $watch_progress = 100;
    $sql = <<<SQL
    UPDATE $table_name
    SET watch_status = %s,
        watch_count = %d,
        watch_progress = %d
    WHERE tmdb_series_id = %s
    AND season_number = %d
    AND episode_number = %d
  SQL;
    $prepared_sql = self::$DB->prepare($sql, $watch_status,  $watch_count, $watch_progress, $tmdb_series_id, $season_number, $episode_number);
    self::$DB->query($prepared_sql);
    if (self::$DB->last_error) {
      throw new Exception(self::$DB->last_error);
    }
    return true;
  }

  public static function check_if_exists($tmdb_series_id, $season_number, $episode_number): bool {
    $results = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE tmdb_series_id = '$tmdb_series_id' AND season_number = '$season_number' AND episode_number = '$episode_number'");
    return count($results) > 0;
  }

  public static function add_record($tmdb_series_id, $season_number, $episode_number) {
    if (!AntraktorSeriesManager::check_if_exists($tmdb_series_id)) {
      AntraktorSeriesManager::add_record($tmdb_series_id);
    }

    if (!AntraktorSeasonManager::check_if_exists($tmdb_series_id, $season_number)) {
      AntraktorSeasonManager::add_record($tmdb_series_id, $season_number);
    }

    $season_id_result = self::$DB->get_results("SELECT id FROM " . AntraktorSeasonManager::$table_name . " WHERE tmdb_series_id = '$tmdb_series_id' AND season_number = '$season_number'");
    if (count($season_id_result) == 0) {
      throw new Exception("Season ID not found for tmdb_series_id = $tmdb_series_id and season_number = $season_number");
    }
    $season_id = $season_id_result[0]->id;

    if (!self::check_if_exists($tmdb_series_id, $season_number, $episode_number)) {
      $tmdb_data = AF::get_series_episode_details_by_id($tmdb_series_id, $season_number, $episode_number);
      $episode_id = $tmdb_data->id;
      $name = $tmdb_data->name;
      $watch_status = 'watching';
      $sql = "INSERT INTO " . self::$table_name . " (tmdb_episode_id, tmdb_series_id, tmdb_season_id, tmdb_data, name, season_number, episode_number, watch_status) VALUES (%d, %d, %d, %s, %s, %d, %d, %s)";
      $prepared_sql = self::$DB->prepare(
        $sql,
        $episode_id,
        $tmdb_series_id,
        $season_id,
        base64_encode(json_encode($tmdb_data)),
        $name,
        $season_number,
        $episode_number,
        $watch_status
      );
      self::$DB->query($prepared_sql);
      if (self::$DB->last_error) {
        throw new Exception(self::$DB->last_error);
      }
      return true;
    }
    return false;
  }
}

AntraktorEpisodeManager::init();
