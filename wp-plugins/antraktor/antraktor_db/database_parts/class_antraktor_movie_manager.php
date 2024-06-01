<?php
class AntraktorMovieManager {
  public static $table_name;
  public static $DB;

  public static function init() {
    if (!isset(self::$table_name)) {
      global $wpdb;
      self::$table_name = ANTRAKTOR_DB_PREFIX . 'movies';
      self::$DB = $wpdb;
    }
  }

  public static function find_movie($movie_name) {
    $result = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE movie_name = '$movie_name'");
    return $result;
  }
  public static function get_column_names() {
    $tables = self::$DB->get_results("SHOW COLUMNS FROM " . self::$table_name);
    echo '<pre>';
    print_r($tables);
    echo '</pre>';
  }
}

AntraktorMovieManager::init();
