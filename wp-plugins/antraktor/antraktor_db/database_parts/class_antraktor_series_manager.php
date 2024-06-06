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

  public static function check_show_title_exists(string $show_title): bool {
    $results = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE name = '$show_title'");
    return count($results);
  }

  public static function add_record(GetSeries $data): int {
    $total_added  = 0;
    for ($i = 0; $i < count($data->seasons); $i++) {
      $name = $data->seasons[$i]->name;
      $tmdb_series_id = $data->seasons[$i]->id;
      if (!self::check_if_exists($tmdb_series_id)) {
        $sql = "INSERT INTO " . self::$table_name . " ( tmdb_series_id, name ) VALUES (%s, %s)";
        $prepared_sql = self::$DB->prepare(
          $sql,
          $tmdb_series_id,
          $name,
        );
        if (self::$DB->query($prepared_sql)) {

          $total_added += 1;
        } else {
          echo '<h1>' .  self::$DB->last_error . '</h1>';
        }
      }
    }
    return $total_added;
  }
}

AntraktorSeriesManager::init();
