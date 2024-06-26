<?php
class QueryTmdb {
  public static $query_name;
  public static $get_movie_by_name = 'get_movie_by_name';
  public static $get_movie_details_by_id = 'get_movie_details_by_id';
  public static $get_series_by_name = 'get_series_by_name';
  public static $get_series_details_by_id = 'get_series_details_by_id';
  public static $get_series_season_details_by_id = 'get_series_season_details_by_id';
  public static $get_episode_details_by_id = 'get_episode_details_by_id';
  public static $get_series_images_by_id = 'get_series_images_by_id';
  public static $get_by_unique_id = 'get_by_unique_id';
  public static $get_similar_movies = 'get_similar_movies';
  public static $get_similar_series = 'get_similar_series';
  public static $get_movie_videos_by_id = 'get_movie_videos_by_id';
  public static $get_series_videos_by_id = 'get_series_videos_by_id';

  public static function init($query_name) {
    self::$query_name = $query_name;
    $class_vars = get_class_vars(__CLASS__);
    if (!in_array($query_name, $class_vars)) {
      throw new Exception('Query name is not exist');
    }
    return new self;
  }

  public static function get_similar_movies($atts) {
    $movie_id = $atts['get_similar_movies'];
    if (!isset($movie_id)) {
      throw new Exception('Movie id not set');
    }
    return 'movie/' . $movie_id . '/similar';
  }

  public static function get_similar_series($atts) {
    $series_id = $atts['get_similar_series'];
    if (!isset($series_id)) {
      throw new Exception('Series id not set');
    }
    return 'tv/' . $series_id . '/similar';
  }

  public static function get_movie_by_name($atts) {
    $movie = $atts['get_movie_by_name'];
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

  public static function get_series_season_details_by_id($atts) {
    $series_id = $atts['get_series_season_details_by_id'];
    $season_number = $atts['season_number'];
    if (!isset($series_id)) {
      throw new Exception('Series id not set');
    }
    if (!isset($season_number)) {
      throw new Exception('Season number not set');
    }
    return 'tv/' . $series_id . '/season/' . $season_number;
  }

  public static function get_by_unique_id($atts) {
    $unique_id = $atts['get_by_unique_id'];
    $external_source = $atts['external_source'];
    if (!isset($unique_id)) {
      throw new Exception('Unique id not set');
    }
    if (!isset($external_source)) {
      throw new Exception('External source not set');
    }
    return 'find/' . $unique_id . '?external_source=' . $external_source;
  }

  public static function get_series_episode_details_by_id($atts) {
    $series_id = $atts['get_series_episode_details_by_id'];
    $season_number = $atts['season_number'];
    $episode_number = $atts['episode_number'];
    if (!isset($series_id)) {
      throw new Exception('Series id not set');
    }
    if (!isset($season_number)) {
      throw new Exception('Season number not set');
    }
    if (!isset($episode_number)) {
      throw new Exception('Episode number not set');
    }
    return 'tv/' . $series_id . '/season/' . $season_number . '/episode/' . $episode_number;
  }

  public static function get_series_images_by_id($atts) {
    $series_id = $atts['get_series_images_by_id'];
    if (!isset($series_id)) {
      throw new Exception('Series id not set');
    }
    return 'tv/' . $series_id . '/images';
  }

  public static function get_movie_videos_by_id($atts) {
    $movie_id = $atts['get_movie_videos_by_id'];
    if (!isset($movie_id)) {
      throw new Exception('Movie id not set');
    }
    return 'movie/' . $movie_id . '/videos';
  }

  public static function get_series_videos_by_id($atts) {
    $series_id = $atts['get_series_videos_by_id'];
    if (!isset($series_id)) {
      throw new Exception('Series id not set');
    }
    return 'tv/' . $series_id . '/videos';
  }
}
