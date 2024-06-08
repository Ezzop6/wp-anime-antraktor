<?php

class AntraktorSeasonManager {
  public static $table_name;
  public static $DB;

  public static function init() {
    if (!isset(self::$table_name)) {
      global $wpdb;
      self::$table_name = ANTRAKTOR_DB_PREFIX . 'seasons';
      self::$DB = $wpdb;
    }
  }

  public static function check_if_show_id_exists(string $show_id): bool {
    $results = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE tmdb_series_id = '$show_id'");
    return count($results) > 0;
  }

  public static function check_if_exists($tmdb_series_id, $season_number): bool {
    $results = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE tmdb_series_id = '$tmdb_series_id' AND season_number = '$season_number'");
    return count($results) > 0;
  }

  public static function add_record($tmdb_series_id, $season_number) {
    if (!AntraktorSeriesManager::check_if_exists($tmdb_series_id)) {
      AntraktorSeriesManager::add_record($tmdb_series_id);
    }

    if (!self::check_if_exists($tmdb_series_id, $season_number)) {
      $tmdb_data = AF::get_series_season_details_by_id($tmdb_series_id, $season_number);
      $season_id = $tmdb_data->id;
      $name = $tmdb_data->name;
      $sql = "INSERT INTO " . self::$table_name . " (tmdb_season_id, tmdb_series_id, tmdb_data, name, season_number) VALUES (%d, %s, %s, %s, %d)";
      $prepared_sql = self::$DB->prepare(
        $sql,
        $season_id,
        $tmdb_series_id,
        base64_encode(json_encode($tmdb_data)),
        $name,
        $season_number
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

AntraktorSeasonManager::init();
