<?php
class AntraktorVariableManager {
  public static $table_name;
  public static $DB;

  public static function init() {
    if (!isset(self::$table_name)) {
      global $wpdb;
      self::$table_name = ANTRAKTOR_DB_PREFIX . 'variables';
      self::$DB = $wpdb;
    }
  }

  public static function set_variable($key, $value) {
    self::init();
    $result = self::$DB->get_results("SELECT * FROM " . self::$table_name . " WHERE var_name = '$key'");
    if (empty($result)) {
      self::add_variable($key, $value);
    } else {
      self::update_variable($key, $value, $result[0]->id);
    }
  }

  public static function update_variable($key, $value, $id) {
    self::init();
    self::$DB->update(
      self::$table_name,
      array(
        'var_name' => htmlspecialchars($key),
        'var_value' => htmlspecialchars($value)
      ),
      array('id' => $id),
    );
  }
  public static function delete_variable($id) {
    self::init();

    self::$DB->delete(
      self::$table_name,
      array('id' => $id),
      array('%d')
    );
  }
  public static function add_variable($key, $value) {
    self::init();
    self::$DB->insert(
      self::$table_name,
      array(
        'var_name' => htmlspecialchars($key),
        'var_value' => htmlspecialchars($value),
      ),
    );
  }
  public static function get_key_pairs() {
    self::init();

    try {
      $result = self::$DB->get_results("SELECT * FROM " . self::$table_name);
      return $result;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
  public static function get_key_value($key) {
    self::init();
    $result =  self::$DB->get_results("SELECT var_value FROM " . self::$table_name . " WHERE var_name = '$key'");
    if (empty($result)) {
      return null;
    }
    return $result[0]->var_value;
  }

  public static function get_keys_values(array $keys) {
    self::init();
    $result = [];
    foreach ($keys as $key) {
      $value = self::get_key_value($key);
      $result[$key] = $value;
    }
    return $result;
  }
}
