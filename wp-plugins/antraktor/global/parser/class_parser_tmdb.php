<?php


class ParserTmdb {
  public static function parse($api_data, $query_name, $debug_print) {
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
}
