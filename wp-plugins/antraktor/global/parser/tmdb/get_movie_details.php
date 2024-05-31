<?php
class GetMovieDetails {
  public static $adult;
  public static $backdrop_path;
  public static $belongs_to_collection;
  public static $budget;
  public static $genres;
  public static $homepage;
  public static $id;
  public static $imdb_id;
  public static $origin_country;
  public static $original_language;
  public static $original_title;
  public static $overview;
  public static $popularity;
  public static $poster_path;
  public static $production_companies;
  public static $production_countries;
  public static $release_date;
  public static $revenue;
  public static $runtime;
  public static $spoken_languages;
  public static $status;
  public static $tagline;
  public static $title;
  public static $video;
  public static $vote_average;
  public static $vote_count;

  public function __construct($api_data) {
    self::$adult = $api_data->adult;
    self::$backdrop_path = $api_data->backdrop_path;
    self::$belongs_to_collection = $api_data->belongs_to_collection;
    self::$budget = $api_data->budget;
    self::$genres = $api_data->genres;
    self::$homepage = $api_data->homepage;
    self::$id = $api_data->id;
    self::$imdb_id = $api_data->imdb_id;
    self::$origin_country = $api_data->origin_country;
    self::$original_language = $api_data->original_language;
    self::$original_title = $api_data->original_title;
    self::$overview = $api_data->overview;
    self::$popularity = $api_data->popularity;
    self::$poster_path = $api_data->poster_path;
    self::$production_companies = $api_data->production_companies;
    self::$production_countries = $api_data->production_countries;
    self::$release_date = $api_data->release_date;
    self::$revenue = $api_data->revenue;
    self::$runtime = $api_data->runtime;
    self::$spoken_languages = $api_data->spoken_languages;
    self::$status = $api_data->status;
    self::$tagline = $api_data->tagline;
    self::$title = $api_data->title;
    self::$video = $api_data->video;
    self::$vote_average = $api_data->vote_average;
    self::$vote_count = $api_data->vote_count;
  }

  public static function init($api_data) {
    return new self($api_data);
  }
}
