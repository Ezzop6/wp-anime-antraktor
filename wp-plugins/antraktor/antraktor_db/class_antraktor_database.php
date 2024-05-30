<?php

class AntraktorDatabase {
  private static $DB;
  public static  function init() {
    global $wpdb;
    self::$DB = $wpdb;
    if (ANTRAKTOR_DEBUG) {
      self::$DB->show_errors();
    }
  }
  public static function load_table_file(string $file_name, string $collate) {
    $file = file_get_contents(plugin_dir_path(__FILE__) . 'schemas/' . $file_name . '.sql');
    $file = str_replace('|DB_PREFIX|',  ANTRAKTOR_DB_PREFIX, $file);
    $file = str_replace('|DB_COLLATE|',  $collate, $file);
    return $file;
  }
  public static function create_antrakt_movie_db() {
    self::init();
    $charset_collate = self::$DB->get_charset_collate();
    $sql_registered_pages = self::load_table_file('registered_pages', $charset_collate);
    $sql_variables =  self::load_table_file('variables', $charset_collate);
    $sql_movies =  self::load_table_file('movies', $charset_collate);
    $sql_movies_parts =  self::load_table_file('movies_parts', $charset_collate);
    $sql_series =  self::load_table_file('series', $charset_collate);
    $sql_series_seasons =  self::load_table_file('series_seasons', $charset_collate);
    $sql_series_seasons_episodes =  self::load_table_file('series_seasons_episodes', $charset_collate);

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql_registered_pages);
    dbDelta($sql_variables);
    dbDelta($sql_movies);
    dbDelta($sql_movies_parts);
    dbDelta($sql_series);
    dbDelta($sql_series_seasons);
    dbDelta($sql_series_seasons_episodes);


    $all_tables = $wpdb->get_results("SHOW TABLES LIKE '" . ANTRAKTOR_DB_PREFIX . "%'");

    if (ANTRAKTOR_DEBUG) {
      $fi = new FilesystemIterator(__DIR__ . '/schemas', FilesystemIterator::SKIP_DOTS);
      printf("There were %d Files", iterator_count($fi)) . "<br>";
      echo "Tables created: " . count($all_tables) . "<br>";
    }
  }
  public static function delete_antrakt_movie_db() {
    self::init();
    $all_tables = [
      ANTRAKTOR_DB_PREFIX . 'registered_pages',
      ANTRAKTOR_DB_PREFIX . 'variables',
      ANTRAKTOR_DB_PREFIX . 'movies',
      ANTRAKTOR_DB_PREFIX . 'movies_parts',
      ANTRAKTOR_DB_PREFIX . 'series_seasons_episodes',
      ANTRAKTOR_DB_PREFIX . 'series_seasons',
      ANTRAKTOR_DB_PREFIX . 'series',
    ];

    foreach ($all_tables as $table) {
      $table_name = array_values((array)$table)[0];
      self::$DB->query('DROP TABLE ' . $table_name);
    }
    if (!ANTRAKTOR_DEBUG) {
      return;
    }
    $existing_tables = self::$DB->get_results("SHOW TABLES LIKE '" . ANTRAKTOR_DB_PREFIX . "%'");
    if (empty($existing_tables)) {
      echo "Tables deleted successfully.";
    } else {
      $table_count = count($existing_tables);
      echo "Tables not deleted successfully." . "<br>";
      echo "Tables left: " . $table_count . "<br>";
      foreach ($existing_tables as $table) {
        $table_name = array_values((array)$table)[0];
        echo "Table: " . $table_name . "<br>";
      }
    }
  }
}
