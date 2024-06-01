<?php
class QueryTmdb {
  public static $get_movie_by_name = 'get_movie_by_name';
  public static $get_movie_details_by_id = 'get_movie_details_by_id';
  public static $get_series_by_name = 'get_series_by_name';
  public static $get_series_details_by_id = 'get_series_details_by_id';

  public static function get_movie_by_name($atts) {
    $movie = $atts['get_movie'];
    if (!isset($movie)) {
      throw new Exception('Movie name not set');
    }
    return 'search/movie?query=' . $movie;
  }

  public static function get_movie_details_by_id($atts) {
    $movie_id = $atts['get_movie_details_by_id'];
    if (!isset($movie_id)) {
      throw new Exception('Movie id not set');
    }
    return 'movie/' . $movie_id;
  }

  public static function get_series_by_name($atts) {
    $series = $atts['get_series_by_name'];
    if (!isset($series)) {
      throw new Exception('Series name not set');
    }
    return 'search/tv?query=' . $series;
  }

  public static function get_series_details_by_id($atts) {
    $series_id = $atts['get_series_details_by_id'];
    if (!isset($series_id)) {
      throw new Exception('Series id not set');
    }
    return 'tv/' . $series_id;
  }
}
