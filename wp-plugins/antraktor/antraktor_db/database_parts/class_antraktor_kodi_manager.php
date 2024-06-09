<?php

use ParagonIE\Sodium\Core\Curve25519\H;

class AntraktorKodiManager {
  public static $table_name;
  public static $DB;

  public static function init() {
    if (!isset(self::$table_name)) {
      global $wpdb;
      self::$table_name = ANTRAKTOR_DB_PREFIX . 'kodi_watched';
      self::$DB = $wpdb;
    }
  }

  public static function delete_all_invalid() {
    $sql = "DELETE FROM " . self::$table_name . " WHERE !tvdb_show_id";
    if (self::$DB->query($sql)) {
      if (self::$DB->last_error) {
        throw new Exception(self::$DB->last_error);
      }
      return true;
    }
    return false;
  }

  public static function get_rows_names(): array {
    return self::$DB->get_results("SHOW COLUMNS FROM " . self::$table_name);
  }

  public static function get_record_count(): array {
    return self::$DB->get_results("SELECT COUNT(*) FROM " . self::$table_name);
  }

  public static function get_all(): array {
    return self::$DB->get_results("SELECT * FROM " . self::$table_name);
  }

  public static function get_all_valid_with_status($type, $watch_status = null,  $limit = 10): array {
    if ($watch_status == 'all') {
      $watch_status = null;
    }
    if (!$watch_status) {
      return self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE show_type = '$type' LIMIT $limit");
    }
    return self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE watch_status = '$watch_status' AND show_type = '$type' LIMIT $limit");
  }

  public static function get_record_key_by_name(string $name): string | null {
    $prepared_sql = self::$DB->prepare("SELECT record_key FROM " . self::$table_name . " WHERE name = %s", esc_sql($name));
    return self::$DB->get_results($prepared_sql)[0]->record_key ?? null;
  }

  public static function get_record_key_by_tmdb_id(int $tmdb_id): string {
    $tmdb_id = esc_sql($tmdb_id);
    return self::$DB->get_results("SELECT record_key FROM " . self::$table_name . " WHERE tvdb_show_id = $tmdb_id")[0]->record_key;
  }

  public static function get_all_invalid(): array {
    return self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE !tvdb_show_id");
  }

  public static function get_records_count(int $limit = 10): array {
    return self::$DB->get_results("SELECT * FROM " . self::$table_name . " LIMIT $limit");
  }

  public static function delete_record($record_key): bool {
    $sql = "DELETE FROM " . self::$table_name . " WHERE record_key = %s";
    $prepared_sql = self::$DB->prepare($sql, $record_key);
    if (self::$DB->query($prepared_sql)) {
      if (self::$DB->last_error) {
        throw new Exception(self::$DB->last_error);
      }
      return true;
    }
    return false;
  }

  public static function change_status($record_key, $status): bool {
    $sql = "UPDATE " . self::$table_name . " SET watch_status = %s WHERE record_key = %s";
    $prepared_sql = self::$DB->prepare($sql, $status, $record_key);
    if (self::$DB->query($prepared_sql)) {
      if (self::$DB->last_error) {
        throw new Exception(self::$DB->last_error);
      }
      return true;
    }
    return false;
  }

  public static function is_item_exist($name, $show_type, $id_tvdb, $id_imdb, $id_tmdb): bool {
    $name = esc_sql($name);
    $sql = "SELECT * FROM " . self::$table_name . " WHERE name = %s AND show_type = %s";
    $prepared_sql = self::$DB->prepare($sql, $name, $show_type);
    $result = self::$DB->get_results($prepared_sql);
    foreach ($result as $row) {
      if (
        ($row->tvdb_show_id != null) ||
        ($row->name == $name && !$id_imdb && !$id_tmdb && !$id_tvdb) ||
        ($row->id_tvdb == $id_tvdb && $id_tvdb != null) ||
        ($row->id_imdb == $id_imdb && $id_imdb != null) ||
        ($row->id_tmdb == $id_tmdb && $id_tmdb != null)
      ) {
        return true;
      }
    }
    return false;
  }

  public static function get_kodi_data($record_key) {
    $result = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE record_key = '$record_key'")[0];
    if ($result) {
      $decoded_data = base64_decode($result->record_data);
      return json_decode($decoded_data);
    }
  }

  public static function get_tmdb_data($record_key, $type) {
    $result = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE record_key = '$record_key' AND show_type = '$type'")[0] ?? null;
    if ($result) {
      $decoded_data = base64_decode($result->tmdb_data);
      return json_decode($decoded_data);
    }
  }

  public static function get_series_details($record_key): GetSeriesDetails | null {
    require_once ANTRAKTOR_GLOBAL_DIR . 'parser/tmdb/get_series_details.php';
    $tmdb_data = self::get_tmdb_data($record_key, 'episode');
    if (!$tmdb_data) {
      return null;
    }
    if (gettype($tmdb_data) == 'string') {
      return GetSeriesDetails::init(json_decode($tmdb_data));
    } else {
      return GetSeriesDetails::init($tmdb_data);
    }
  }

  public static function get_movie_details($record_key): GetMovieDetails | null {
    require_once ANTRAKTOR_GLOBAL_DIR . 'parser/tmdb/get_movie_details.php';
    $tmdb_data = self::get_tmdb_data($record_key, 'movie');
    if (!$tmdb_data) {
      return null;
    }
    if (gettype($tmdb_data) == 'string') {
      return GetMovieDetails::init(json_decode($tmdb_data));
    }
    return GetMovieDetails::init($tmdb_data);
  }

  public static function get_record(string $record_key): object {
    return self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE record_key = '$record_key'")[0];
  }


  public static function handle_episode_sql_logic(PlayerGetItem $kodi_item) {
    $name = $kodi_item->movie_name;
    $id_tvdb = $kodi_item->uniqueid->tvdb ?? null;
    $id_imdb = $kodi_item->uniqueid->imdb ?? null;
    $id_tmdb = $kodi_item->uniqueid->tmdb ?? null;
    $tvdb_show_id = null;
    $tmdb_data = null;
    $type = $kodi_item->type;
    if (!self::is_item_exist($name, $type, $id_tvdb, $id_imdb, $id_tmdb)) {
      if ($id_tvdb) {
        $result = AF::get_by_unique_id($id_tvdb, 'tvdb_id');
        $tvdb_show_id = $result->tv_episode_results[0]->show_id;
      }
      if (!$tvdb_show_id && $id_imdb) {
        $result = AF::get_by_unique_id($id_imdb, 'imdb_id');
        $tvdb_show_id = $result->tv_episode_results[0]->show_id;
      }
      if ($tvdb_show_id) {
        $tmdb_data = AF::get_tmdb_series_details_by_id($tvdb_show_id);
      }
      if (!$tmdb_data && $name) {
        $tmdb_data = AF::get_tmdb_series_by_name($name);
        $tvdb_show_id = $tmdb_data->seasons[0]->id;
        $tmdb_data = AF::get_tmdb_series_details_by_id($tvdb_show_id);
      }
      if (!$tmdb_data) {
        throw new Exception('No tmdb data found');
      }
      $encoded_data = base64_encode(json_encode($kodi_item));
      $tmdb_data = base64_encode(json_encode($tmdb_data));
      $record_hash = md5($encoded_data);
      $record_length = strlen($encoded_data);
      $record_key = $record_hash . '-' . $record_length;
      $watch_status = $tvdb_show_id ? 'watching' : 'not_started';
      $sql = "INSERT INTO " . self::$table_name . " ( record_key, record_hash, record_length, record_data, name, show_type, id_imdb, id_tvdb, id_tmdb, tvdb_show_id, tmdb_data, watch_status ) VALUES (%s, %s, %d, %s, %s, %s, %s, %s, %s, %s, %s, %s)";
      $prepared_sql = self::$DB->prepare(
        $sql,
        $record_key,
        $record_hash,
        $record_length,
        $encoded_data,
        esc_sql($name),
        esc_sql($type),
        $id_imdb,
        $id_tvdb,
        $id_tmdb,
        $tvdb_show_id,
        $tmdb_data,
        $watch_status
      );
      return $prepared_sql;
    }
  }

  public static function handle_movie_sql_logic(PlayerGetItem $kodi_item) {
    $name = $kodi_item->movie_name;
    $id_tvdb = $kodi_item->uniqueid->tvdb ?? null;
    $id_imdb = $kodi_item->uniqueid->imdb ?? null;
    $id_tmdb = $kodi_item->uniqueid->tmdb ?? null;
    $show_type = $kodi_item->type;
    if (!self::is_item_exist($name, $show_type, $id_tvdb, $id_imdb, $id_tmdb)) {
      $show_type = $kodi_item->type;
      if ($id_tmdb) {
        $tmdb_data = AF::get_tmdb_movie_details_by_id($id_tmdb);
      }
      if (!$tmdb_data && $name) {
        $tmdb_data = AF::get_tmdb_movie_by_name($name);
        if (!$tmdb_data) {
          throw new Exception('No tmdb data found');
        }
        if (count($tmdb_data->movies) > 1) {
          $found = false;
          for ($i = 0; $i < count($tmdb_data->movies); $i++) {
            if ($tmdb_data->movies[$i]->original_title == $name) {
              $id_tmdb = $tmdb_data->movies[$i]->id;
              $tmdb_data = AF::get_tmdb_movie_details_by_id($id_tmdb);

              $found = true;
              break;
            }
          }
          if (!$found) {
            throw new Exception('Multiple movies found');
          }
        }
      }
      $encoded_data = base64_encode(json_encode($kodi_item));
      $record_hash = md5($encoded_data);
      $record_length = strlen($encoded_data);
      $record_key = $record_hash . '-' . $record_length;
      $tmdb_data = base64_encode(json_encode($tmdb_data));
      $watch_status = $tmdb_data ? 'watching' : 'not_started';
      $tvdb_show_id = $id_tmdb;
      $sql = "INSERT INTO " . self::$table_name . " ( record_key, record_hash, record_length, record_data, name, show_type, id_imdb, id_tvdb, id_tmdb, tvdb_show_id, tmdb_data, watch_status ) VALUES (%s, %s, %d, %s, %s, %s, %s, %s, %s, %s, %s, %s)";
      $prepared_sql = self::$DB->prepare(
        $sql,
        $record_key,
        $record_hash,
        $record_length,
        $encoded_data,
        $kodi_item->movie_name,
        $show_type,
        $id_imdb,
        $id_tvdb,
        $id_tmdb,
        $tvdb_show_id,
        $tmdb_data,
        $watch_status
      );
      return $prepared_sql;
    }
  }

  public static function add_record(PlayerGetItem  $kodi_item): bool {
    $show_type = $kodi_item->type;
    if ($show_type == 'episode') {
      $prepared_sql = self::handle_episode_sql_logic($kodi_item);
    }
    if ($show_type == 'movie') {
      $prepared_sql = self::handle_movie_sql_logic($kodi_item);
    }
    if (!$prepared_sql) {
      return false;
    }
    if (self::$DB->query($prepared_sql)) {
      if (self::$DB->last_error) {
        throw new Exception(self::$DB->last_error);
      }
      return true;
    }
    return false;
  }
}
AntraktorKodiManager::init();
