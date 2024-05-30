<?php
class AntraktorPageManager {
  public static $table_name;
  public static $DB;

  public static function init() {
    global $wpdb;
    self::$table_name = ANTRAKTOR_DB_PREFIX . 'registered_pages';
    self::$DB = $wpdb;
  }

  public static function get_pages_meta_ids() {
    AntraktorPageManager::init();
    $result = self::$DB->get_results("SELECT * FROM " . self::$table_name);
    if (ANTRAKTOR_DEBUG) {
      self::$DB->show_errors();
    }
    return $result;
  }

  public static function save_post_id($post_id) {
    AntraktorPageManager::init();
    $sql = "INSERT INTO " . self::$table_name . " (page_meta_id) VALUES ($post_id)";
    self::$DB->query($sql);
  }
  public static function delete_page_id(string $id) {
    AntraktorPageManager::init();
    $sql = "DELETE FROM " . self::$table_name . " WHERE page_meta_id = $id";
    self::$DB->query($sql);
  }
}
