<?php
class QueryTmdb {
  public static $movie = 'get_movie';
  public static $movie_details = 'get_movie_details';
  public static function get_movie($atts) {
    $movie = $atts['movie_name'];
    if (!isset($movie)) {
      throw new Exception('Movie name not set');
    }
    return 'search/movie?query=' . $movie;
  }
  public static function get_movie_details($atts) {
    $movie_id = $atts['movie_id'];
    if (!isset($movie_id)) {
      throw new Exception('Movie id not set');
    }
    return 'movie/' . $movie_id;
  }
}
