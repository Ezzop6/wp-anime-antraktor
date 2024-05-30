<?php
class AntraktApiCommunicator {
  public static $targets = array(
    'kodi' => 'http://10.0.1.100:3333/jsonrpc',
    'iss_tracking' => 'http://api.open-notify.org/iss-now.json',
  );

  public static function init() {
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
    $response = wp_remote_get(self::$targets['iss_tracking']);
    return self::validate_response($response);
  }

  public static function send_kodi($api_query_name) {
    //https://kodi.wiki/view/JSON-RPC_API/Examples
    $query = AntraktorApiQueryLoader::get_query('kodi', $api_query_name);
    $username = 'user'; // 'kodi
    $password = 'passs'; // 'kodi'
    $auth = base64_encode("$username:$password");

    $response = wp_remote_post(
      self::$targets['kodi'],
      array(
        'body' => $query,
        'headers' => array(
          'Content-Type' => 'application/json',
          'Authorization' => 'Basic ' . $auth,
        ),
      )
    );

    return self::validate_response($response);
  }
}
