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
      $sql = "INSERT INTO " . self::$table_name . " (tmdb_episode_id, tmdb_series_id, tmdb_season_id, tmdb_data, name, season_number, episode_number) VALUES (%d, %s, %d, %s, %s, %d, %d)";
      $prepared_sql = self::$DB->prepare(
        $sql,
        $episode_id,
        $tmdb_series_id,
        $season_id,
        base64_encode(json_encode($tmdb_data)),
        $name,
        $season_number,
        $episode_number
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
