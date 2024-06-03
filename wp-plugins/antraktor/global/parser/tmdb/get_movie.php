<?php
class GetMovie {
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
  public static $similar_movies;

  public function __construct($data, $index = 0) {
    self::$page = $data->page; // int
    $result = $data->results[$index]; // object
    self::$adult = $result->adult; // bool
    self::$backdrop_path = $result->backdrop_path; // string
    self::$genre_ids = $result->genre_ids; // array
    self::$id = $result->id; // int
    self::$original_language = $result->original_language; // string
    self::$original_title = $result->original_title; // string
    self::$overview = $result->overview; // string
    self::$popularity = $result->popularity; // float
    self::$poster_path = $result->poster_path; // string
    self::$release_date = $result->release_date; // date
    self::$title = $result->title; // string
    self::$video = $result->video; // ??
    self::$vote_average = $result->vote_average; // float
    self::$vote_count = $result->vote_count; // int
    self::$similar_movies = count($data->results) > 1 ? $data->results : null;
  }

  public static function init($data) {
    return new self($data);
  }
}
