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
    $this->adult = isset($api_data->adult) ? $api_data->adult : null;
    $this->backdrop_path = isset($api_data->backdrop_path) ? $api_data->backdrop_path : null;
    $this->belongs_to_collection = isset($api_data->belongs_to_collection) ? BelongsToCollection::init($api_data->belongs_to_collection) : null;
    $this->budget = isset($api_data->budget) ? $api_data->budget : null;
    $this->genres = isset($api_data->genres) ? Genres::init($api_data->genres) : null;
    $this->homepage = isset($api_data->homepage) ? $api_data->homepage : null;
    $this->id = isset($api_data->id) ? $api_data->id : null;
    $this->imdb_id = isset($api_data->imdb_id) ? $api_data->imdb_id : null;
    $this->origin_country = isset($api_data->origin_country) ? $api_data->origin_country : null;
    $this->original_language = isset($api_data->original_language) ? $api_data->original_language : null;
    $this->original_title = isset($api_data->original_title) ? $api_data->original_title : null;
    $this->overview = isset($api_data->overview) ? $api_data->overview : null;
    $this->popularity = isset($api_data->popularity) ? $api_data->popularity : null;
    $this->poster_path = isset($api_data->poster_path) ? $api_data->poster_path : null;
    $this->production_companies = isset($api_data->production_companies) ? ProductionCompanies::init($api_data->production_companies) : null;
    $this->production_countries = isset($api_data->production_countries) ? ProductionCountries::init($api_data->production_countries) : null;
    $this->release_date = isset($api_data->release_date) ? $api_data->release_date : null;
    $this->revenue = isset($api_data->revenue) ? $api_data->revenue : null;
    $this->runtime = isset($api_data->runtime) ? $api_data->runtime : null;
    $this->spoken_languages = isset($api_data->spoken_languages) ? SpokenLanguages::init($api_data->spoken_languages) : null;
    $this->status = isset($api_data->status) ? $api_data->status : null;
    $this->tagline = isset($api_data->tagline) ? $api_data->tagline : null;
    $this->title = isset($api_data->title) ? $api_data->title : null;
    $this->video = isset($api_data->video) ? $api_data->video : null;
    $this->vote_average = isset($api_data->vote_average) ? $api_data->vote_average : null;
    $this->vote_count = isset($api_data->vote_count) ? $api_data->vote_count : null;
  }

  public static function init($api_data) {
    return new self($api_data);
  }
}
