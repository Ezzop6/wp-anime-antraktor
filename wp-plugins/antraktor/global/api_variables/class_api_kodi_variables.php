<?php
class ApiKodiVariables {
  public static $kodi_user;
  public static $kodi_pass;
  public static $kodi_port;
  public static $kodi_host;
  public static $kodi_api_url;
  public static $kodi_basic_auth;

  public static $db_key_kodi_user = 'kodi_user';
  public static $db_key_kodi_pass = 'kodi_pass';
  public static $db_key_kodi_port = 'kodi_port';
  public static $db_key_kodi_host = 'kodi_host';

  public static function init() {
    self::$kodi_user = AntraktorVariableManager::get_key_value(self::$db_key_kodi_user) ?? '';
    self::$kodi_pass = AntraktorVariableManager::get_key_value(self::$db_key_kodi_pass) ?? '';
    self::$kodi_port = AntraktorVariableManager::get_key_value(self::$db_key_kodi_port) ?? '';
    self::$kodi_host = AntraktorVariableManager::get_key_value(self::$db_key_kodi_host) ?? '';
    self::$kodi_api_url = 'http://' . self::$kodi_host . ':' . self::$kodi_port . '/jsonrpc';
    self::$kodi_basic_auth = base64_encode(self::$kodi_user . ':' . self::$kodi_pass);
  }

  public static function check_kodi_variables() {
    self::init();
    $values = [
      'kodi_user' => self::$kodi_user,
      'kodi_pass' => self::$kodi_pass,
      'kodi_port' => self::$kodi_port,
      'kodi_host' => self::$kodi_host,
      'kodi_api_url' => self::$kodi_api_url,
      'kodi_basic_auth' => self::$kodi_basic_auth,
    ];
    if (in_array(null, $values)) {
      throw new Exception('Some values are null');
    }
  }
}

ApiKodiVariables::init();
