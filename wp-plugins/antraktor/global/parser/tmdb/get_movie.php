<?php
class GetMovie {
  public static $similar_movies;
  public static $page;
  public static $adult;
  public static $backdrop_path;
  public static $genre_ids;
  public static $id;
  public static $original_language;
  public static $original_title;
  public static $overview;
  public static $popularity;
  public static $poster_path;
  public static $release_date;
  public static $title;
  public static $video;
  public static $vote_average;
  public static $vote_count;

  public function __construct($api_data, $index = 0) {
    echo 'GetMovie::__construct';
    HelperScripts::print_all_object_attributes($api_data);
    self::$similar_movies = count($api_data->results);
    self::$page = $api_data->page;
    $result = $api_data->results[$index];
    self::$adult = $result->adult ? 'true' : 'false';
    self::$backdrop_path = $result->backdrop_path;
    self::$genre_ids = $result->genre_ids;
    self::$id = $result->id;
    self::$original_language = $result->original_language;
    self::$original_title = $result->original_title;
    self::$overview = $result->overview;
    self::$popularity = $result->popularity;
    self::$poster_path = $result->poster_path;
    self::$release_date = $result->release_date;
    self::$title = $result->title;
    self::$video = $result->video;
    self::$vote_average = $result->vote_average;
    self::$vote_count = $result->vote_count;
  }

  public static function init($data) {
    return new self($data);
  }
}
