<?php
class AntraktApiCommunicator {
  public static $kodi_api_url;
  public static $iss_tracking_url;

  public static function init() {
    self::$kodi_api_url = ApiKodiVariables::$kodi_api_url;
    self::$iss_tracking_url = 'http://api.open-notify.org/iss-now.json';
  }

  public static function send($api_target, $api_query_name) {
    return match ($api_target) {
      'kodi' => self::send_kodi($api_query_name),
      'iss_tracking' => self::send_to_iss_tracking(),
      default => false,
    };
  }

  public static function validate_response($response) {
    if (is_wp_error($response)) {
      return $response->get_error_message();
    }
    if (wp_remote_retrieve_response_code($response) !== 200) {
      $error =  array(
        'code' => wp_remote_retrieve_response_code($response),
        'message' => wp_remote_retrieve_response_message($response),
        'body' => wp_remote_retrieve_body($response)
      );
      throw new Exception(json_encode($error));
    }
    return wp_remote_retrieve_body($response);
  }

  public static function send_to_iss_tracking() {
    self::init();
    $response = wp_remote_get(self::$iss_tracking_url);
    return self::validate_response($response);
  }

  public static function send_kodi($api_query_name) {
    self::init();
    //https://kodi.wiki/view/JSON-RPC_API/Examples
    $query = AntraktorApiQueryLoader::get_query('kodi', $api_query_name);
    $response = wp_remote_post(
      self::$kodi_api_url,
      array(
        'body' => $query,
        'headers' => array(
          'Content-Type' => 'application/json',
          'Authorization' => 'Basic ' . ApiKodiVariables::$kodi_basic_auth,
        ),
      )
    );
    return self::validate_response($response);
  }
}
