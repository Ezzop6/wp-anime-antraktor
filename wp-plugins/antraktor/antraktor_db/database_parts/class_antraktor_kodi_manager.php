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

  public static function get_record($record_key): ?stdClass {
    $result = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE record_key = '$record_key'")[0];
    if ($result) {
      $result->record_data = json_decode(base64_decode($result->record_data));
    }
    return $result ? $result : null;
  }

  public static function add_record($new_record): bool {
    $record_hash = md5(json_encode($new_record));
    $record_length = strlen(json_encode($new_record));
    $record_key = $record_hash . '-' . $record_length;

    if (!self::get_record($record_key)) {
      $encoded_data = base64_encode(json_encode($new_record));
      $sql = '';
      $sql .= "INSERT INTO " . self::$table_name;
      $sql .= " (record_key, record_hash, record_length, record_data) VALUES";
      $sql .= " ('$record_key', '$record_hash', '$record_length', '$encoded_data')";
      self::$DB->query($sql);
      return true;
    }
    return false;
  }
}

AntraktorKodiManager::init();
