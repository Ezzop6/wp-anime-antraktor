<?php
class QueryTmdb {
  public static $get_movie_by_name = 'get_movie_by_name';
  public static $get_movie_details_by_id = 'get_movie_details_by_id';
  public static function get_movie_by_name($atts) {
    $movie = $atts['get_movie'];
    if (!isset($movie)) {
      throw new Exception('Movie name not set');
    }
    return 'search/movie?query=' . $movie;
  }
  public static function get_movie_details_by_id($atts) {
    $movie_id = $atts['get_movie_details'];
    if (!isset($movie_id)) {
      throw new Exception('Movie id not set');
    }
    return 'movie/' . $movie_id;
  }
}
