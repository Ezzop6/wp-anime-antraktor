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

  public static function mark_as_complete($id_tmdb) {
    $watch_status =  'watched';
    $watch_progress = 100;
    $sql = "UPDATE " . self::$table_name . " SET watch_status = %s, watch_progress = %d WHERE tmdb_show_id = %s";
    $prepared_sql = self::$DB->prepare($sql, $watch_status, $watch_progress, $id_tmdb,);
    if (self::$DB->query($prepared_sql)) {
      if (self::$DB->last_error) {
        throw new Exception(self::$DB->last_error);
      }
      return true;
    }
    return false;
  }

  public static function update_progress($id_tmdb, $progress) {
    $sql = "UPDATE " . self::$table_name . " SET watch_progress = %s WHERE tmdb_show_id = %s";
    $prepared_sql = self::$DB->prepare($sql, $progress, $id_tmdb);
    if (self::$DB->query($prepared_sql)) {
      if (self::$DB->last_error) {
        throw new Exception(self::$DB->last_error);
      }
      return true;
    }
    return false;
  }

  public static function get_record($id_tmdb) {
    return self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE tmdb_show_id = $id_tmdb")[0] ?? null;
  }

  public static function is_item_exists($id_tmdb): bool {
    $result = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE tmdb_show_id = $id_tmdb");
    return count($result) > 0;
  }

  public static function add_record(string $id_tmdb) {
    if (!self::is_item_exists($id_tmdb)) {
      $movie_data = AF::get_tmdb_movie_details_by_id($id_tmdb);
      if (!$movie_data) {
        return false;
      }
      $tmdb_show_id = $movie_data->id;
      $imdb_id = $movie_data->imdb_id;
      $tmdb_data = base64_encode(json_encode($movie_data));
      $watch_status = 'watching';
      $title = $movie_data->title;
      $original_title = $movie_data->original_title;
      $type = 'movie';
      $sql = "INSERT INTO " . self::$table_name . " (tmdb_show_id, imdb_id, tmdb_data, watch_status, title, original_title, type ) VALUES (%s, %s, %s, %s, %s, %s, %s)";
      $prepared_sql = self::$DB->prepare(
        $sql,
        $tmdb_show_id,
        $imdb_id,
        $tmdb_data,
        $watch_status,
        $title,
        $original_title,
        $type
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
