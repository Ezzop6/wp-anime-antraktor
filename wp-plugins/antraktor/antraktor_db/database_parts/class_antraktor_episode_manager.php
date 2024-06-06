<?php

class AntraktorEpisodeManager {
  public static $table_name;
  public static $DB;

  public static function init() {
    if (!isset(self::$table_name)) {
      global $wpdb;
      self::$table_name = ANTRAKTOR_DB_PREFIX . 'episodes';
      self::$DB = $wpdb;
    }
  }

  // public static function check_if_record_exists($record_key): bool {
  //   return self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE record_key = '$record_key'")[0] ? true : false;
  // }

  // public static function add_record(GetSeries $new_record) {
  //   return AntraktorEpisodeManager::add_record($new_record);
  // }
}

AntraktorEpisodeManager::init();
