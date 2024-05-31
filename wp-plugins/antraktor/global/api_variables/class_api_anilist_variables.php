<?php
class ApiAnilistVariables {
  public static $client_id;
  public static $client_secret;
  public static $client_acc_token;
  public static $client_auth_token;

  public static $db_key_id = 'anilist_client_id';
  public static $db_key_secret = 'anilist_secret';
  public static $db_key_access_token = 'anilist_access_token';
  public static $db_key_auth_token = 'anilist_auth_token';

  public static function init() {
    self::$client_id = AntraktorVariableManager::get_key_value(self::$db_key_id) ?? '';
    self::$client_secret = AntraktorVariableManager::get_key_value(self::$db_key_secret) ?? '';
    self::$client_acc_token = AntraktorVariableManager::get_key_value(self::$db_key_access_token) ?? '';
    self::$client_auth_token = AntraktorVariableManager::get_key_value(self::$db_key_auth_token) ?? '';
  }
}
