<?php
class ApiCommunicator {
  public static $kodi_api_url;
  public static $iss_tracking_url;
  public static $tmdb_api_url;
  public static $anilist_api_url;

  public static $target_iss = 'iss_tracking';
  public static $target_kodi = 'kodi';
  public static $target_tmdb = 'tmdb';
  public static $target_anilist = 'anilist';

  public static function send($api_target, $api_query_name, $atts = array()) {
    return match ($api_target) {
      self::$target_iss => self::send_to_iss_tracking(),
      self::$target_kodi => self::send_to_kodi($api_query_name),
      self::$target_tmdb => self::send_to_tmdb($api_query_name, $atts),
      self::$target_anilist => self::send_to_anilist($api_query_name, $atts),
      default => throw new Exception('Invalid API target'),
    };
  }

  public static function validate_response($response): string {
    if (is_wp_error($response)) {
      if (strpos($response->get_error_message(), 'cURL error 7:') !== false) {
        throw new AntraktorException('cURL error 7: Could not connect to the server at this time. Please try again later.');
      }
      throw new Exception('HTTP request error: ' . $response->get_error_message());
    }
    if (wp_remote_retrieve_response_code($response) === 401) {
      throw new Exception('Unauthorized access: ' . wp_remote_retrieve_body($response));
    }

    if (wp_remote_retrieve_response_code($response) === 204) {
      throw new Exception('No content found');
    }
    if (wp_remote_retrieve_response_code($response) !== 200) {
      throw new Exception('Invalid response code: ' . wp_remote_retrieve_response_code($response));
    }
    return wp_remote_retrieve_body($response);
  }

  public static function send_to_iss_tracking() {
    self::$iss_tracking_url = 'http://api.open-notify.org/iss-now.json';
    $response = wp_remote_get(self::$iss_tracking_url);
    return self::validate_response($response);
  }

  public static function send_to_kodi($api_query_name): string {
    ApiKodiVariables::init();
    self::$kodi_api_url = ApiKodiVariables::$kodi_api_url;
    //https://kodi.wiki/view/JSON-RPC_API/Examples
    $response = wp_remote_post(
      self::$kodi_api_url,
      array(
        'body' => AntraktorApiQueryLoader::get_query('kodi', $api_query_name),
        'headers' => array(
          'Content-Type' => 'application/json',
          'Authorization' => 'Basic ' . ApiKodiVariables::$kodi_basic_auth,
        ),
      )
    );
    return self::validate_response($response);
  }
  public static function send_to_tmdb($api_query_name, $atts): string {
    self::$tmdb_api_url = 'https://api.themoviedb.org/3';
    // https://developer.themoviedb.org/reference/intro/getting-started
    ApiTmdbVariables::init();
    $response = wp_remote_get(
      self::$tmdb_api_url . '/' . AntraktorApiQueryLoader::get_query('tmdb', $api_query_name, $atts),
      array(
        'headers' => array(
          'Authorization' => 'Bearer ' . ApiTmdbVariables::$access_token,
        ),
      )
    );
    return self::validate_response($response);
  }

  public static function send_to_anilist($api_query_name, $atts): string {
    self::$anilist_api_url = 'https://graphql.anilist.co';
    // https://anilist.gitbook.io/anilist-apiv2-docs/
    $response = wp_remote_post(
      self::$anilist_api_url,
      array(
        'body' =>  AntraktorApiQueryLoader::get_query('anilist', $api_query_name, $atts),
        'headers' => array(
          'Content-Type' => 'application/json',
          'Accept' => 'application/json',
          'Authorization' => 'Bearer ' . ApiAnilistVariables::$client_acc_token,
        ),
      )
    );
    return self::validate_response($response);
  }
}
