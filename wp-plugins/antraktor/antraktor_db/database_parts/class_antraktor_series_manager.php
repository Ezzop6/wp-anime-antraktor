<?php
class AntraktorSeriesManager {
  public static $table_name;
  public static $DB;

  public static function init() {
    if (!isset(self::$table_name)) {
      global $wpdb;
      self::$table_name = ANTRAKTOR_DB_PREFIX . 'series';
      self::$DB = $wpdb;
    }
  }

  public static function check_if_exists(string $show_id): bool {
    $results = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE tmdb_series_id = '$show_id'");
    return count($results);
  }

  public static function add_record(int $tmdb_series_id): bool {
    if (!self::check_if_exists($tmdb_series_id)) {
      $tmdb_data = AF::get_tmdb_series_details_by_id($tmdb_series_id);
      $name = $tmdb_data->name;
      $sql = "INSERT INTO " . self::$table_name . " (tmdb_series_id, tmdb_data, watch_status, name) VALUES (%d, %s, %s, %s)";
      $prepared_sql = self::$DB->prepare(
        $sql,
        $tmdb_series_id,
        base64_encode(json_encode($tmdb_data)),
        'started',
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

AntraktorSeriesManager::init();
