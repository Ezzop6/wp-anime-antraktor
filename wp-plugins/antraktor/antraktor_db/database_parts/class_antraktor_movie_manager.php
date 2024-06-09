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

  public static function get_record($id_tmdb) {
    return self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE tvdb_show_id = $id_tmdb");
  }

  public static function is_item_exists($id_tmdb): bool {
    $result = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE tvdb_show_id = $id_tmdb");
    return count($result) > 0;
  }

  public static function add_record($id_tmdb) {
    if (!self::is_item_exists($id_tmdb)) {
      $movie_data = AF::get_tmdb_movie_details_by_id($id_tmdb, 0, 0);
      $tmdb_data = base64_encode(json_encode($movie_data));
      // TODO: tvdb_show_id is not a valid column name this is tmdb_show_id
      $sql = "INSERT INTO " . self::$table_name . " (tvdb_show_id,) VALUES ($id_tmdb)";
      $prepared_sql = self::$DB->prepare(
        $sql
      );
      wp_die(HelperScripts::print($movie_data));
      if (self::$DB->query($prepared_sql)) {
        if (self::$DB->last_error) {
          throw new Exception(self::$DB->last_error);
        }
        return true;
      }
      return false;
    }
    throw new Exception('Not implemented');
    // database must colum names
    if (!self::is_item_exists($id_tmdb)) {
      $id_tmdb = esc_sql($id_tmdb);
      $movie_data = AF::get_tmdb_movie_details_by_id($id_tmdb);
      $sql = "INSERT INTO " . self::$table_name . " (imdb_number,) VALUES ($id_tmdb)";
      $prepared_sql = self::$DB->prepare(
        $sql
      );
      if (self::$DB->query($prepared_sql)) {
        if (self::$DB->last_error) {
          throw new Exception(self::$DB->last_error);
        }
        return true;
      }
      return false;
    }
  }
}

AntraktorMovieManager::init();
