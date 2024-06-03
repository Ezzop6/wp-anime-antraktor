<?php
class AF {
  public static function get_tmdb_movie_details_by_id($movie_id, $parsed_object = true): GetMovieDetails|string {
    $tmdb_details_data = ApiCommunicator::send(
      QueryTmdb::class,
      QueryTmdb::$get_movie_details_by_id,
      array('get_movie_details_by_id' => $movie_id)
    );
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

  public static function get_tmdb_series_details_by_id($series_id, $parsed_object = true): GetSeriesDetails|string {
    $tmdb_details_data = ApiCommunicator::send(
      QueryTmdb::class,
      QueryTmdb::$get_series_details_by_id,
      array('get_series_details_by_id' => $series_id)
    );
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

  public static function get_tmdb_series_by_name($name, $parsed_object = true): GetSeries|string {
    $tmdb_data = ApiCommunicator::send(
      QueryTmdb::class,
      QueryTmdb::$get_series_by_name,
      array('get_series_by_name' => $name)
    );
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

  public static function get_tmdb_movie_by_name($name, $parsed_object = true): GetMovie|string {
    $tmdb_data = ApiCommunicator::send(
      QueryTmdb::class,
      QueryTmdb::$get_movie_by_name,
      array('get_movie_by_name' => $name)
    );
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
  public static function get_kodi_status($parsed_object = true): PlayerGetActivePlayers|string {
    try {
      $kodi_status_data = ApiCommunicator::send(
        QueryKodi::class,
        QueryKodi::$player_get_active_players
      );
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
  public static function get_kodi_now_playing($parsed_object = true): PlayerGetItem|string {
    try {
      $kodi_now_playing_data = ApiCommunicator::send(
        QueryKodi::class,
        QueryKodi::$player_get_item
      );
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
}
