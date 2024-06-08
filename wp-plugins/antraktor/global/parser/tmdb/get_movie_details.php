<?php

require_once 'class_tmdb_belongs_to_collection.php';
require_once 'class_tmdb_genres.php';
require_once 'class_tmdb_production_companies.php';
require_once 'class_tmdb_production_countries.php';
require_once 'class_tmdb_spoken_languages.php';

class GetMovieDetails {
  public $adult;
  public $backdrop_path;
  public $belongs_to_collection = [];
  public $budget;
  public $genres = [];
  public $homepage;
  public $id;
  public $imdb_id;
  public $origin_country;
  public $original_language;
  public $original_title;
  public $overview;
  public $popularity;
  public $poster_path;
  public $production_companies = [];
  public $production_countries = [];
  public $release_date;
  public $revenue;
  public $runtime;
  public $spoken_languages = [];
  public $status;
  public $tagline;
  public $title;
  public $video;
  public $vote_average;
  public $vote_count;

  public function __construct($api_data) {
    $this->adult = $api_data->adult; // bool
    $this->backdrop_path = $api_data->backdrop_path; // string
    $this->belongs_to_collection = BelongsToCollection::init($api_data->belongs_to_collection); // object
    $this->budget = $api_data->budget; // int
    $this->genres = Genres::init($api_data->genres); // array
    $this->homepage = $api_data->homepage; // string
    $this->id = $api_data->id; // int
    $this->imdb_id = $api_data->imdb_id; // string
    $this->origin_country = $api_data->origin_country; // array
    $this->original_language = $api_data->original_language; // string
    $this->original_title = $api_data->original_title; // string
    $this->overview = $api_data->overview; // string
    $this->popularity = $api_data->popularity; // float
    $this->poster_path = $api_data->poster_path; // string
    $this->production_companies = ProductionCompanies::init($api_data->production_companies); // array
    $this->production_countries = ProductionCountries::init($api_data->production_countries); // array
    $this->release_date = $api_data->release_date; // string
    $this->revenue = $api_data->revenue; // int
    $this->runtime = $api_data->runtime; // int
    $this->spoken_languages = SpokenLanguages::init($api_data->spoken_languages); // array
    $this->status = $api_data->status; // string
    $this->tagline = $api_data->tagline; // string
    $this->title = $api_data->title; // string
    $this->video = $api_data->video; // ??
    $this->vote_average = $api_data->vote_average; // float
    $this->vote_count = $api_data->vote_count; // int$this-> public static function init($api_data) {
  }

  public static function init($api_data) {
    return new self($api_data);
  }
}
