<?php
class ApiKodiVariables {
  public static $kodi_user;
  public static $kodi_pass;
  public static $kodi_port;
  public static $kodi_host;

  public static $db_key_kodi_user = 'kodi_user';
  public static $db_key_kodi_pass = 'kodi_pass';
  public static $db_key_kodi_port = 'kodi_port';
  public static $db_key_kodi_host = 'kodi_host';
  public static function init() {
    self::$kodi_user = AntraktorVariableManager::get_key_value(self::$db_key_kodi_user) ?? '';
    self::$kodi_pass = AntraktorVariableManager::get_key_value(self::$db_key_kodi_pass) ?? '';
    self::$kodi_port = AntraktorVariableManager::get_key_value(self::$db_key_kodi_port) ?? '';
    self::$kodi_host = AntraktorVariableManager::get_key_value(self::$db_key_kodi_host) ?? '';
  }
}

ApiKodiVariables::init();
