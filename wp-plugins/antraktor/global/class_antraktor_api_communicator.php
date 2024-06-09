<?php

class ApiCommunicator {

  public static function send($class_name, $api_query_name, $atts = array()) {
    return match ($class_name) {
      QueryIss::class => self::send_to_iss_tracking(),
      QueryKodi::class => self::send_to_kodi($api_query_name),
      QueryTmdb::class => self::send_to_tmdb($api_query_name, $atts),
      QuerySpotify::class => self::send_to_spotify($api_query_name, $atts),
      QueryAnilist::class => self::send_to_anilist($api_query_name, $atts),
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
    $response_code = wp_remote_retrieve_response_code($response);
    $response_body = wp_remote_retrieve_body($response);
    if ($response_code === 401) {
      throw new Exception('Unauthorized access: ' . wp_remote_retrieve_body($response_body));
    }
    if ($response_code === 204) {
      throw new Exception('No content found');
    }
    if ($response_code !== 200) {
      throw new Exception('Invalid response code: ' . $response_code . ' ' . $response_body);
    }
    return wp_remote_retrieve_body($response);
  }

  public static function send_to_iss_tracking() {
    $response = wp_remote_get('http://api.open-notify.org/iss-now.json');
    return self::validate_response($response);
  }

  public static function send_to_kodi($api_query_name): string {
    ApiKodiVariables::check_kodi_variables();
    //https://kodi.wiki/view/JSON-RPC_API/Examples
    $response = wp_remote_post(
      ApiKodiVariables::$kodi_api_url,
      array(
        'body' => AntraktorApiQueryLoader::get_query(QueryKodi::class, $api_query_name),
        'headers' => array(
          'Content-Type' => 'application/json',
          'Authorization' => 'Basic ' . ApiKodiVariables::$kodi_basic_auth,
        ),
      )
    );
    return self::validate_response($response);
  }
  public static function send_to_tmdb($api_query_name, $atts): string {
    // https://developer.themoviedb.org/reference/intro/getting-started
    AntraktorVariableManager::update_tmdb_total_requests();
    ApiTmdbVariables::init();
    $response = wp_remote_get(
      'https://api.themoviedb.org/3' . '/' . AntraktorApiQueryLoader::get_query(QueryTmdb::class, $api_query_name, $atts),
      array(
        'headers' => array(
          'Authorization' => 'Bearer ' . ApiTmdbVariables::$access_token,
        ),
      )
    );
    return self::validate_response($response);
  }

  public static function send_to_anilist($api_query_name, $atts): string {
    // https://anilist.gitbook.io/anilist-apiv2-docs/
    $response = wp_remote_post(
      'https://graphql.anilist.co',
      array(
        'body' =>  AntraktorApiQueryLoader::get_query(QueryAnilist::class, $api_query_name, $atts),
        'headers' => array(
          'Content-Type' => 'application/json',
          'Accept' => 'application/json',
          'Authorization' => 'Bearer ' . ApiAnilistVariables::$client_acc_token,
        ),
      )
    );
    return self::validate_response($response);
  }
  static function send_to_spotify($api_query_name, $atts): string {
    // https://developer.spotify.com/documentation/web-api/reference/
    ApiSpotifyVariables::init();
    $response = wp_remote_get(
      'https://api.spotify.com/v1/' . AntraktorApiQueryLoader::get_query(QuerySpotify::class, $api_query_name, $atts),
      array(
        'headers' => array(
          'Authorization' => 'Bearer ' . ApiSpotifyVariables::$spotify_token,
        ),
      )
    );
    return self::validate_response($response);
  }
}
