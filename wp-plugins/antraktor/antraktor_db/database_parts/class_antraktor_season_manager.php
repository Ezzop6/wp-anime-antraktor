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

  public static function check_if_exists($tmdb_series_id, $season_count): bool {
    $results = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE tmdb_season_id = '$tmdb_series_id'");
    return count($results) > $season_count;
  }

  public static function add_record($tmdb_series_id, $season_number, $season_count) {
    echo $tmdb_series_id . ' ' . $season_number . ' ' . $season_count . '<br>';
    if (!self::check_if_exists($tmdb_series_id, $season_count)) {
      $tmdb_data = AF::get_series_season_details_by_id($tmdb_series_id, $season_number);
      $name = $tmdb_data->name;
      $sql = "INSERT INTO " . self::$table_name . " (tmdb_season_id, tmdb_data, name) VALUES (%d, %s, %s)";
      $prepared_sql = self::$DB->prepare(
        $sql,
        $tmdb_series_id,
        base64_encode(json_encode($tmdb_data)),
        $name
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
