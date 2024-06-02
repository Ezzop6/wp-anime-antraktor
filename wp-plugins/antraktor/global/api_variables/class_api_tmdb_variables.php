<?php
class ApiTmdbVariables {
  public static $api_key;
  public static $access_token;

  public static $register_url = 'https://www.themoviedb.org/';

  public static $db_key_api_key = 'tmdb_api_key';
  public static $db_key_access_token = 'tmdb_access_token';

  public static function init() {
    self::$api_key =  AntraktorVariableManager::get_key_value(self::$db_key_api_key) ?? '';
    self::$access_token =  AntraktorVariableManager::get_key_value(self::$db_key_access_token) ?? '';
  }
}
