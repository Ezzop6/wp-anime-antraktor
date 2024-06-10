<?php


class ParserTmdb {
  public static function parse($query_name, $api_data, $debug_print) {
    if (empty($api_data)) {
      throw new Exception('No data provided');
    }
    if (empty($query_name)) {
      throw new Exception('No query name provided');
    }
    $api_data = json_decode($api_data);
    return match ($query_name) {
      QueryTmdb::$get_movie_by_name => self::get_movie($api_data, $debug_print),
      QueryTmdb::$get_movie_details_by_id => self::get_movie_details($api_data, $debug_print),
      QueryTmdb::$get_series_by_name => self::get_series_by_name($api_data, $debug_print),
      QueryTmdb::$get_series_details_by_id => self::get_series_details_by_id($api_data, $debug_print),
      QueryTmdb::$get_episode_details_by_id => self::get_episode_details_by_id($api_data, $debug_print),
      QueryTmdb::$get_series_images_by_id => self::get_series_images_by_id($api_data, $debug_print),
      QueryTmdb::$get_series_season_details_by_id => self::get_series_season_details_by_id($api_data, $debug_print),
      QueryTmdb::$get_by_unique_id => self::get_by_unique_id($api_data, $debug_print),
      QueryTmdb::$get_similar_movies => self::get_similar_movies($api_data, $debug_print),
      QueryTmdb::$get_similar_series => self::get_similar_series($api_data, $debug_print),
      default => throw new Exception('Query name not found : ' . $query_name . ' in ParserTmdb::parse() method'),
    };
  }
  public static function get_movie($api_data, $debug_print): GetMovie {
    require_once 'tmdb/get_movie.php';
    return new GetMovie($api_data);
  }
  public static function get_movie_details($api_data, $debug_print): GetMovieDetails {
    require_once 'tmdb/get_movie_details.php';
    return new GetMovieDetails($api_data);
  }
  public static function get_series_by_name($api_data, $debug_print): GetSeries {
    require_once 'tmdb/get_series.php';
    return new GetSeries($api_data);
  }
  public static function get_series_details_by_id($api_data, $debug_print): GetSeriesDetails {
    require_once 'tmdb/get_series_details.php';
    return new GetSeriesDetails($api_data);
  }
  public static function get_episode_details_by_id($api_data, $debug_print): EpisodeDetailsID {
    require_once 'tmdb/class_tmdb_episode_details_id.php';
    return new EpisodeDetailsID($api_data);
  }
  public static function get_series_images_by_id($api_data, $debug_print): GestSeriesImages {
    require_once 'tmdb/get_series_images.php';
    return new GestSeriesImages($api_data);
  }
  public static function get_series_season_details_by_id($api_data, $debug_print): GetSeriesSeasonDetails {
    require_once 'tmdb/get_series_season_details.php';
    return new GetSeriesSeasonDetails($api_data);
  }
  public static function get_by_unique_id($api_data, $debug_print): GetByUniqueId {
    require_once 'tmdb/get_by_unique_id.php';
    return new GetByUniqueId($api_data);
  }
  public static function get_similar_movies($api_data, $debug_print): GetSimilarMovies {
    require_once 'tmdb/class_tmdb_get_similar_movies.php';
    return new GetSimilarMovies($api_data);
  }
  public static function get_similar_series($api_data, $debug_print): GetSimilarSeries {
    require_once 'tmdb/class_tmdb_get_similar_movies.php';
    return new GetSimilarSeries($api_data);
  }
}
