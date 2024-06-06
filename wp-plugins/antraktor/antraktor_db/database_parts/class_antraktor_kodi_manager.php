<?php
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

  public static function get_rows_names(): array {
    return self::$DB->get_results("SHOW COLUMNS FROM " . self::$table_name);
  }

  public static function get_record_count(): array {
    return self::$DB->get_results("SELECT COUNT(*) FROM " . self::$table_name);
  }

  public static function get_all(): array {
    return self::$DB->get_results("SELECT * FROM " . self::$table_name);
  }

  public static function get_records_count(int $limit = 10): array {
    return self::$DB->get_results("SELECT * FROM " . self::$table_name . " LIMIT $limit");
  }

  public static function isItemExist($name, $type, $id_tvdb, $id_imdb, $id_tmdb): bool {
    $name = esc_sql($name);
    $result = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE name = '$name' AND show_type = '$type'");
    foreach ($result as $row) {
      if (
        ($row->tvdb_show_id != null) ||
        ($row->id_tvdb == $id_tvdb && $id_tvdb != null) ||
        ($row->id_imdb == $id_imdb && $id_imdb != null) ||
        ($row->id_tmdb == $id_tmdb && $id_tmdb != null)
      ) {
        return true;
      }
    }
    return false;
  }

  public static function get_record($record_key) {
    $result = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE record_key = '$record_key'")[0];
    if ($result) {
      $decoded_data = base64_decode($result->record_data);
      return json_decode($decoded_data);
    }
  }

  public static function add_record(PlayerGetItem | null $kodi_item): bool {
    if (!$kodi_item) {
      return false;
    }
    $name = $kodi_item->movie_name;
    $show_type = $kodi_item->type;
    $id_tvdb = $kodi_item->uniqueid->tvdb;
    $id_imdb = $kodi_item->uniqueid->imdb;
    $id_tmdb = $kodi_item->uniqueid->tmdb;
    $tvdb_show_id = null;
    if (!self::isItemExist($name, $show_type, $id_tvdb, $id_imdb, $id_tmdb)) {
      if ($id_tvdb) {
        $result = AF::get_by_unique_id($id_tvdb, 'tvdb_id');
        $tvdb_show_id = $result->tv_episode_results[0]->show_id;
      }
      if (!$tvdb_show_id && $id_imdb) {
        $result = AF::get_by_unique_id($id_imdb, 'imdb_id');
        $tvdb_show_id = $result->tv_episode_results[0]->show_id;
      }
      $encoded_data = base64_encode(json_encode($kodi_item));
      $record_hash = md5($encoded_data);
      $record_length = strlen($encoded_data);
      $record_key = $record_hash . '-' . $record_length;
      $sql = "INSERT INTO " . self::$table_name . " ( record_key, record_hash, record_length, record_data, name, show_type, id_imdb, id_tvdb, id_tmdb, tvdb_show_id ) VALUES (%s, %s, %d, %s, %s, %s, %s, %s, %s, %s)";
      $prepared_sql = self::$DB->prepare(
        $sql,
        $record_key,
        $record_hash,
        $record_length,
        $encoded_data,
        $kodi_item->movie_name,
        $kodi_item->type,
        $id_imdb,
        $id_tvdb,
        $id_tmdb,
        $tvdb_show_id ?? null,
      );
      if (self::$DB->query($prepared_sql)) {
        if (self::$DB->last_error) {
          throw new Exception(self::$DB->last_error);
        }
        return true;
      }
    }
    return false;
  }
}
AntraktorKodiManager::init();
