<?php
class AF {
  public static function get_tmdb_movie_details_by_id($movie_id, $parsed_object = true, $json_print = false): GetMovieDetails|string {
    $tmdb_details_data = ApiCommunicator::send(
      QueryTmdb::init(QueryTmdb::$get_movie_details_by_id),
      array('get_movie_details_by_id' => $movie_id)
    );
    if ($json_print) {
      HelperScripts::print($tmdb_details_data);
    }
    if (!$parsed_object) {
      return $tmdb_details_data;
    }
    $parsed_data = ApiDataParser::parse(
      QueryTmdb::init(QueryTmdb::$get_movie_details_by_id),
      $tmdb_details_data
    );
    return $parsed_data;
  }

  public static function get_tmdb_series_details_by_id($series_id, $parsed_object = true, $json_print = false): GetSeriesDetails|string {
    $tmdb_details_data = ApiCommunicator::send(
      QueryTmdb::init(QueryTmdb::$get_series_details_by_id),
      array('get_series_details_by_id' => $series_id)
    );
    if ($json_print) {
      HelperScripts::print($tmdb_details_data);
    }
    if (!$parsed_object) {
      return $tmdb_details_data;
    }
    $parsed_data = ApiDataParser::parse(
      QueryTmdb::init(QueryTmdb::$get_series_details_by_id),
      $tmdb_details_data,
    );
    return $parsed_data;
  }

  public static function get_tmdb_series_by_name($name, $parsed_object = true, $json_print = false): GetSeries|string {
    $tmdb_data = ApiCommunicator::send(
      QueryTmdb::init(QueryTmdb::$get_series_by_name),
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
      QueryTmdb::init(QueryTmdb::$get_series_by_name),
      $tmdb_data,
    );
    return $parsed_data;
  }

  public static function get_tmdb_movie_by_name($name, $parsed_object = true, $json_print = false): GetMovie|string {
    $tmdb_data = ApiCommunicator::send(
      QueryTmdb::init(QueryTmdb::$get_movie_by_name),
      array('get_movie_by_name' => $name)
    );
    if ($json_print) {
      HelperScripts::print($tmdb_data);
    }
    if (!$parsed_object) {
      return $tmdb_data;
    }
    $parsed_data = ApiDataParser::parse(
      QueryTmdb::init(QueryTmdb::$get_movie_by_name),
      $tmdb_data,
    );
    return $parsed_data;
  }

  public static function player_get_properties(): PlayerGetProperties {
    $kodi_properties_data = ApiCommunicator::send(
      QueryKodi::init(QueryKodi::$player_get_properties)
    );
    $parsed_data = ApiDataParser::parse(
      QueryKodi::init(QueryKodi::$player_get_properties),
      $kodi_properties_data,
    );
    return $parsed_data;
  }

  public static function get_kodi_status($parsed_object = true, $json_print = false): PlayerGetActivePlayers|string {
    try {
      $kodi_status_data = ApiCommunicator::send(
        QueryKodi::init(QueryKodi::$player_get_active_players),

      );
      if ($json_print) {
        HelperScripts::print($kodi_status_data);
      }
      if (!$parsed_object) {
        return $kodi_status_data;
      }
      $parsed_data = ApiDataParser::parse(
        QueryKodi::init(QueryKodi::$player_get_active_players),
        $kodi_status_data,
      );
      return $parsed_data;
    } catch (Exception) {
      return '';
    }
  }
  public static function get_kodi_now_playing($parsed_object = true, $json_print = false): PlayerGetItem | string | null {
    try {
      $kodi_now_playing_data = ApiCommunicator::send(
        QueryKodi::init(QueryKodi::$player_get_item)
      );
      if ($json_print) {
        HelperScripts::print($kodi_now_playing_data);
      }
      if (strlen($kodi_now_playing_data) < ANTRAKTOR_KODI_BLANK_RESPONSE_LENGTH) {
        return null;
      }
      if (!$parsed_object) {
        return $kodi_now_playing_data;
      }
      $parsed_data = ApiDataParser::parse(
        QueryKodi::init(QueryKodi::$player_get_item),
        $kodi_now_playing_data,
      );
      return $parsed_data;
    } catch (Exception) {
      throw new Exception('Kodi is not running');
    }
  }
  public static function get_series_images_by_id($series_id, $parsed_object = true, $json_print = false): GestSeriesImages|string {
    $tmdb_images_data = ApiCommunicator::send(
      QueryTmdb::init(QueryTmdb::$get_series_images_by_id),
      array('get_series_images_by_id' => $series_id)
    );
    if ($json_print) {
      HelperScripts::print($tmdb_images_data);
    }
    if (!$parsed_object) {
      return $tmdb_images_data;
    }
    $parsed_data = ApiDataParser::parse(
      QueryTmdb::init(QueryTmdb::$get_series_images_by_id),
      $tmdb_images_data,
    );
    return $parsed_data;
  }

  public static function get_series_season_details_by_id($series_id, $season_number, $parsed_object = true, $json_print = false): GetSeriesSeasonDetails|string {
    $tmdb_season_data = ApiCommunicator::send(
      QueryTmdb::init(QueryTmdb::$get_series_season_details_by_id),
      array(
        'get_series_season_details_by_id' => $series_id,
        'season_number' => $season_number
      )
    );
    if ($json_print) {
      HelperScripts::print($tmdb_season_data);
    }
    if (!$parsed_object) {
      return $tmdb_season_data;
    }
    $parsed_data = ApiDataParser::parse(
      QueryTmdb::init(QueryTmdb::$get_series_season_details_by_id),
      $tmdb_season_data,
    );
    return $parsed_data;
  }

  public static function get_series_episode_details_by_id($series_id, $season_number, $episode_number, $parsed_object = true, $json_print = false): EpisodeDetailsID|string {
    $tmdb_episode_data = ApiCommunicator::send(
      QueryTmdb::init(QueryTmdb::$get_episode_details_by_id),
      array(
        'get_series_episode_details_by_id' => $series_id,
        'season_number' => $season_number,
        'episode_number' => $episode_number
      )
    );
    if ($json_print) {
      HelperScripts::print($tmdb_episode_data);
    }
    if (!$parsed_object) {
      return $tmdb_episode_data;
    }
    $parsed_data = ApiDataParser::parse(
      QueryTmdb::init(QueryTmdb::$get_episode_details_by_id),
      $tmdb_episode_data,
    );
    return $parsed_data;
  }

  public static function get_by_unique_id($unique_id, $external_source = 'tvdb_id', $parsed_object = true, $json_print = false): GetByUniqueId|string {
    $tmdb_data = ApiCommunicator::send(
      QueryTmdb::init(QueryTmdb::$get_by_unique_id),
      array(
        'get_by_unique_id' => $unique_id,
        'external_source' => $external_source
      )
    );
    if ($json_print) {
      HelperScripts::print($tmdb_data);
    }
    if (!$parsed_object) {
      return $tmdb_data;
    }
    $parsed_data = ApiDataParser::parse(
      QueryTmdb::init(QueryTmdb::$get_by_unique_id),
      $tmdb_data,
    );
    return $parsed_data;
  }
  public static function get_similar_movies($movie_id, $parsed_object = true, $json_print = false): GetSimilarMovies|string {
    $tmdb_data = ApiCommunicator::send(
      QueryTmdb::init(QueryTmdb::$get_similar_movies),
      array('get_similar_movies' => $movie_id)
    );
    if ($json_print) {
      HelperScripts::print($tmdb_data);
    }
    if (!$parsed_object) {
      return $tmdb_data;
    }
    $parsed_data = ApiDataParser::parse(
      QueryTmdb::init(QueryTmdb::$get_similar_movies),
      $tmdb_data,
    );
    return $parsed_data;
  }

  public static function get_similar_series($series_id, $parsed_object = true, $json_print = false): GetSimilarSeries|string {
    $tmdb_data = ApiCommunicator::send(
      QueryTmdb::init(QueryTmdb::$get_similar_series),
      array('get_similar_series' => $series_id)
    );
    if ($json_print) {
      HelperScripts::print($tmdb_data);
    }
    if (!$parsed_object) {
      return $tmdb_data;
    }
    $parsed_data = ApiDataParser::parse(
      QueryTmdb::init(QueryTmdb::$get_similar_series),
      $tmdb_data,
    );
    return $parsed_data;
  }

  public static function get_movie_videos_by_id($movie_id, $parsed_object = true, $json_print = false): GetMovieVideos|string {
    $tmdb_data = ApiCommunicator::send(
      QueryTmdb::init(QueryTmdb::$get_movie_videos_by_id),
      array('get_movie_videos_by_id' => $movie_id)
    );
    if ($json_print) {
      HelperScripts::print($tmdb_data);
    }
    if (!$parsed_object) {
      return $tmdb_data;
    }
    $parsed_data = ApiDataParser::parse(
      QueryTmdb::init(QueryTmdb::$get_movie_videos_by_id),
      $tmdb_data,
    );
    return $parsed_data;
  }

  public static function get_series_videos_by_id($series_id, $parsed_object = true, $json_print = false): GetSeriesVideos|string {
    $tmdb_data = ApiCommunicator::send(
      QueryTmdb::init(QueryTmdb::$get_series_videos_by_id),
      array('get_series_videos_by_id' => $series_id)
    );
    if ($json_print) {
      HelperScripts::print($tmdb_data);
    }
    if (!$parsed_object) {
      return $tmdb_data;
    }
    $parsed_data = ApiDataParser::parse(
      QueryTmdb::init(QueryTmdb::$get_series_videos_by_id),
      $tmdb_data,
    );
    return $parsed_data;
  }

  public static function get_testing_data($array_id) {
    $file = file_get_contents(ABSPATH . 'wp-content/plugins/antraktor/antraktor_testing_data.json');
    return json_encode(json_decode($file, true)[$array_id]);
  }
}
