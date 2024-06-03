<?php

require_once 'class_tmdb_belongs_to_collection.php';
require_once 'class_tmdb_genres.php';
require_once 'class_tmdb_production_companies.php';
require_once 'class_tmdb_production_countries.php';
require_once 'class_tmdb_spoken_languages.php';

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
    self::$adult = $api_data->adult; // bool
    self::$backdrop_path = $api_data->backdrop_path; // string
    self::$belongs_to_collection = BelongsToCollection::init($api_data->belongs_to_collection); // object
    self::$budget = $api_data->budget; // int
    self::$genres = Genres::init($api_data->genres); // array
    self::$homepage = $api_data->homepage; // string
    self::$id = $api_data->id; // int
    self::$imdb_id = $api_data->imdb_id; // string
    self::$origin_country = $api_data->origin_country; // array
    self::$original_language = $api_data->original_language; // string
    self::$original_title = $api_data->original_title; // string
    self::$overview = $api_data->overview; // string
    self::$popularity = $api_data->popularity; // float
    self::$poster_path = $api_data->poster_path; // string
    self::$production_companies = ProductionCompanies::init($api_data->production_companies); // array
    self::$production_countries = ProductionCountries::init($api_data->production_countries); // array
    self::$release_date = $api_data->release_date; // string
    self::$revenue = $api_data->revenue; // int
    self::$runtime = $api_data->runtime; // int
    self::$spoken_languages = SpokenLanguages::init($api_data->spoken_languages); // array
    self::$status = $api_data->status; // string
    self::$tagline = $api_data->tagline; // string
    self::$title = $api_data->title; // string
    self::$video = $api_data->video; // ??
    self::$vote_average = $api_data->vote_average; // float
    self::$vote_count = $api_data->vote_count; // int
  }

  public static function init($api_data) {
    return new self($api_data);
  }
}
