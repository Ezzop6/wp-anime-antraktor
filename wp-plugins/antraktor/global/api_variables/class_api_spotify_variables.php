<?php
class ApiSpotifyVariables {
  public static $spotify_client_id;
  public static $spotify_client_secret;
  public static $spotify_token;

  public static $db_key_spotify_client_id = 'spotify_client_id';
  public static $db_key_spotify_client_secret = 'spotify_client_secret';
  public static $db_key_spotify_token = 'spotify_token';

  public static function init($regenerate = true) {
    self::$spotify_client_id =  AntraktorVariableManager::get_key_value(self::$db_key_spotify_client_id) ?? '';
    self::$spotify_client_secret =  AntraktorVariableManager::get_key_value(self::$db_key_spotify_client_secret) ?? '';
    self::$spotify_token =  AntraktorVariableManager::get_key_value(self::$db_key_spotify_token) ?? '';
    if (!self::$spotify_token  && self::$spotify_client_id  && self::$spotify_client_secret) {
      self::generate_token();
    }
    if ($regenerate && self::$spotify_token) {
      self::regenerate_token();
    }
  }
  public static function generate_token() {
    $url = 'https://accounts.spotify.com/api/token';
    $body = array(
      'grant_type' => 'client_credentials',
      'client_id' => self::$spotify_client_id,
      'client_secret' => self::$spotify_client_secret
    );
    $response = wp_remote_post($url, array(
      'method' => 'POST',
      'headers' => array(
        'Content-Type' => 'application/x-www-form-urlencoded',
      ),
      'body' => $body,
      'timeout' => 45,
    ));
    if (is_wp_error($response)) {
      throw new Exception($response->get_error_message());
    }
    $response_body = wp_remote_retrieve_body($response);
    $data = json_decode($response_body);
    if (isset($data->error)) {
      throw new Exception($data->error . ' ' . $data->error_description);
    }
    self::$spotify_token = $data->access_token;
    AntraktorVariableManager::set_variable(self::$db_key_spotify_token, self::$spotify_token);
    AntraktorVariableManager::set_variable('spotify_token_expires_in', $data->expires_in);
    AntraktorVariableManager::set_variable('spotify_token_timestamp', time());
    AntraktorVariableManager::set_variable('spotify_token_type', $data->token_type);
    AntraktorVariableManager::set_variable('spotify_token_regenerated_count', AntraktorVariableManager::get_key_value('spotify_token_regenerated_count') + 1);
  }

  public static function regenerate_token() {
    $spotify_token_expires_in = AntraktorVariableManager::get_key_value('spotify_token_expires_in');
    $spotify_token_timestamp = AntraktorVariableManager::get_key_value('spotify_token_timestamp');
    if (time() - $spotify_token_timestamp > $spotify_token_expires_in) {
      self::generate_token();
    }
  }

  public static function check_token_validaty() {
    if (!self::$spotify_token) {
      return false;
    }
    $spotify_token_expires_in = AntraktorVariableManager::get_key_value('spotify_token_expires_in');
    $spotify_token_timestamp = AntraktorVariableManager::get_key_value('spotify_token_timestamp');
    if (time() - $spotify_token_timestamp > $spotify_token_expires_in) {
      return false;
    }
    return true;
  }
}
