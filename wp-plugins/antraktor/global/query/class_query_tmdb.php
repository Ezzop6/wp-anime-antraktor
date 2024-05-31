<?php
class QueryTmdb {
  public static $get_movie = 'get_movie';
  public static $get_movie_details = 'get_movie_details';
  public static function get_movie($atts) {
    $movie = $atts['get_movie'];
    if (!isset($movie)) {
      throw new Exception('Movie name not set');
    }
    return 'search/movie?query=' . $movie;
  }
  public static function get_movie_details($atts) {
    $movie_id = $atts['get_movie_details'];
    if (!isset($movie_id)) {
      throw new Exception('Movie id not set');
    }
    return 'movie/' . $movie_id;
  }
}
