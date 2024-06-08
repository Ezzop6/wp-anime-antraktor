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
    $file = file_get_contents(plugin_dir_path(__FILE__) . 'schemas/' . $file_name . '.SQL');
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
    $sql_movies =  self::load_table_file('movies', $charset_collate);
    $sql_series =  self::load_table_file('series', $charset_collate);
    $sql_seasons =  self::load_table_file('seasons', $charset_collate);
    $sql_episodes =  self::load_table_file('episodes', $charset_collate);
    $sql_kodi_watched =  self::load_table_file('kodi_watched', $charset_collate);

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql_registered_pages);
    dbDelta($sql_variables);
    dbDelta($sql_movies);
    dbDelta($sql_movies);
    dbDelta($sql_series);
    dbDelta($sql_seasons);
    dbDelta($sql_episodes);
    dbDelta($sql_kodi_watched);
  }

  public static function delete_antrakt_movie_db() {
    self::init();
    $all_tables = [
      ANTRAKTOR_DB_PREFIX . 'registered_pages',
      ANTRAKTOR_DB_PREFIX . 'variables',
      ANTRAKTOR_DB_PREFIX . 'kodi_watched',
      ANTRAKTOR_DB_PREFIX . 'episodes',
      ANTRAKTOR_DB_PREFIX . 'seasons',
      ANTRAKTOR_DB_PREFIX . 'series',
      ANTRAKTOR_DB_PREFIX . 'movies',
    ];

    foreach ($all_tables as $table) {
      $table_name = array_values((array)$table)[0];
      self::$DB->query('DROP TABLE ' . $table_name);
    }
  }
}
