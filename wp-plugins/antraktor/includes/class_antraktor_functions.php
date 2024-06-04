<?php
class AF {
  public static function get_tmdb_movie_details_by_id($movie_id, $parsed_object = true, $json_print = false): GetMovieDetails|string {
    $tmdb_details_data = ApiCommunicator::send(
      QueryTmdb::class,
      QueryTmdb::$get_movie_details_by_id,
      array('get_movie_details_by_id' => $movie_id)
    );
    if ($$json_print) {
      HelperScripts::print($tmdb_details_data);
    }
    if (!$parsed_object) {
      return $tmdb_details_data;
    }
    $parsed_data = ApiDataParser::parse(
      QueryTmdb::class,
      $tmdb_details_data,
      QueryTmdb::$get_movie_details_by_id
    );
    return $parsed_data;
  }

  public static function get_tmdb_series_details_by_id($series_id, $parsed_object = true, $json_print = false): GetSeriesDetails|string {
    $tmdb_details_data = ApiCommunicator::send(
      QueryTmdb::class,
      QueryTmdb::$get_series_details_by_id,
      array('get_series_details_by_id' => $series_id)
    );
    if ($$json_print) {
      HelperScripts::print($tmdb_details_data);
    }
    if (!$parsed_object) {
      return $tmdb_details_data;
    }
    $parsed_data = ApiDataParser::parse(
      QueryTmdb::class,
      $tmdb_details_data,
      QueryTmdb::$get_series_details_by_id
    );
    return $parsed_data;
  }

  public static function get_tmdb_series_by_name($name, $parsed_object = true, $json_print = false): GetSeries|string {
    $tmdb_data = ApiCommunicator::send(
      QueryTmdb::class,
      QueryTmdb::$get_series_by_name,
      array('get_series_by_name' => $name)
    );
    if ($json_print) {
      echo '<h3>Series</h3>';
      HelperScripts::print($tmdb_data);
    }
    if (!$parsed_object) {
      return $tmdb_data;
    }
    $parsed_data = ApiDataParser::parse(
      QueryTmdb::class,
      $tmdb_data,
      QueryTmdb::$get_series_by_name
    );
    return $parsed_data;
  }

  public static function get_tmdb_movie_by_name($name, $parsed_object = true, $json_print = false): GetMovie|string {
    $tmdb_data = ApiCommunicator::send(
      QueryTmdb::class,
      QueryTmdb::$get_movie_by_name,
      array('get_movie_by_name' => $name)
    );
    if ($$json_print) {
      HelperScripts::print($tmdb_details_data);
    }
    if (!$parsed_object) {
      return $tmdb_data;
    }
    $parsed_data = ApiDataParser::parse(
      QueryTmdb::class,
      $tmdb_data,
      QueryTmdb::$get_movie_by_name
    );
    return $parsed_data;
  }
  public static function get_kodi_status($parsed_object = true, $json_print = false): PlayerGetActivePlayers|string {
    try {
      $kodi_status_data = ApiCommunicator::send(
        QueryKodi::class,
        QueryKodi::$player_get_active_players
      );
      if ($$json_print) {
        HelperScripts::print($tmdb_details_data);
      }
      if (!$parsed_object) {
        return $kodi_status_data;
      }
      $parsed_data = ApiDataParser::parse(
        QueryKodi::class,
        $kodi_status_data,
        QueryKodi::$player_get_active_players
      );
      return $parsed_data;
    } catch (Exception) {
      return '';
    }
  }
  public static function get_kodi_now_playing($parsed_object = true, $json_print = false): PlayerGetItem|string {
    try {
      $kodi_now_playing_data = ApiCommunicator::send(
        QueryKodi::class,
        QueryKodi::$player_get_item
      );
      if ($$json_print) {
        HelperScripts::print($tmdb_details_data);
      }
      if (strlen($kodi_now_playing_data) < ANTRAKTOR_KODI_BLANK_RESPONSE_LENGTH) {
        return '';
      }
      if (!$parsed_object) {
        return $kodi_now_playing_data;
      }
      $parsed_data = ApiDataParser::parse(
        QueryKodi::class,
        $kodi_now_playing_data,
        QueryKodi::$player_get_item
      );
      return $parsed_data;
    } catch (Exception) {
      return '';
    }
  }
  public static function get_testing_data($array_id) {
    $file = file_get_contents(ABSPATH . 'wp-content/plugins/antraktor/antraktor_testing_data.json');
    return json_encode(json_decode($file, true)[$array_id]);
  }
}
