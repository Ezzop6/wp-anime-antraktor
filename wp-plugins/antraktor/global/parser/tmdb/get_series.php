<?php
class GetSeries {
  public static $pages;
  public static $adult;
  public static $backdrop_path;
  public static $genre_ids;
  public static $id;
  public static $origin_country;
  public static $original_language;
  public static $overview;
  public static $original_name;
  public static $popularity;
  public static $poster_path;
  public static $first_air_date;
  public static $name;
  public static $vote_average;
  public static $vote_count;

  public function __construct($data, $index = 0) {
    self::$pages = $data->total_pages;
    $result = $data->results[$index];
    self::$adult = $result->adult ? 'true' : 'false';
    self::$backdrop_path = $result->backdrop_path;
    self::$genre_ids = $result->genre_ids;
    self::$id = $result->id;
    self::$origin_country = $result->origin_country;
    self::$original_language = $result->original_language;
    self::$overview = $result->overview;
    self::$original_name = $result->original_name;
    self::$popularity = $result->popularity;
    self::$poster_path = $result->poster_path;
    self::$first_air_date = $result->first_air_date;
    self::$name = $result->name;
    self::$vote_average = $result->vote_average;
    self::$vote_count = $result->vote_count;
  }

  public static function init($data) {
    return new self($data);
  }
}
