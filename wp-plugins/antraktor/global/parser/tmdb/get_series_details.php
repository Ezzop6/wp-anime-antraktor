<?php


require_once 'class_tmdb_last_episode_to_air.php';
require_once 'class_tmdb_next_episode_to_air.php';
require_once 'class_tmdb_seasons_data.php';
require_once 'class_tmdb_genres.php';
require_once 'class_tmdb_production_companies.php';
require_once 'class_tmdb_production_countries.php';

class GetSeriesDetails {
  public $adult;
  public $backdrop_path;
  public $created_by;
  public $episode_run_time;
  public $first_air_date;
  public $genres;
  public $homepage;
  public $id;
  public $in_production;
  public $languages;
  public $last_air_date;
  public $last_episode_to_air;
  public $name;
  public $next_episode_to_air;
  public $networks;
  public $number_of_episodes;
  public $number_of_seasons;
  public $origin_country;
  public $original_language;
  public $original_name;
  public $overview;
  public $popularity;
  public $poster_path;
  public $production_companies;
  public $production_countries;
  public $seasons;
  public $spoken_languages;
  public $status;
  public $tagline;
  public $type;
  public $vote_average;
  public $vote_count;
  public $seasons_ids = [];

  public function __construct($data) {
    $this->adult = $data->adult;
    $this->backdrop_path = $data->backdrop_path;
    $this->created_by = CreatedBy::init($data->created_by);
    $this->episode_run_time = $data->episode_run_time;
    $this->first_air_date = $data->first_air_date;
    $this->genres = Genres::init($data->genres);
    $this->homepage = $data->homepage;
    $this->id = $data->id;
    $this->in_production = $data->in_production;
    $this->languages = $data->languages;
    $this->last_air_date = $data->last_air_date;
    $this->last_episode_to_air = LastEpisodeToAir::init($data->last_episode_to_air);
    $this->name = $data->name;
    $this->next_episode_to_air = NextEpisodeToAir::init($data->next_episode_to_air);
    $this->networks = $data->networks;
    $this->number_of_episodes = $data->number_of_episodes;
    $this->number_of_seasons = $data->number_of_seasons;
    $this->origin_country = $data->origin_country;
    $this->original_language = $data->original_language;
    $this->original_name = $data->original_name;
    $this->overview = $data->overview;
    $this->popularity = $data->popularity;
    $this->poster_path = $data->poster_path;
    $this->production_companies = ProductionCompanies::init($data->production_companies);
    $this->production_countries = ProductionCountries::init($data->production_countries);
    $this->seasons = SeasonsData::init($data->seasons);
    $this->spoken_languages = $data->spoken_languages;
    $this->status = $data->status;
    $this->tagline = $data->tagline;
    $this->type = $data->type;
    $this->vote_average = $data->vote_average;
    $this->vote_count = $data->vote_count;
    $this->seasons_ids = $this->get_series_ids();
  }

  public static function init($data) {
    return new self($data);
  }

  public  function get_series_ids() {
    $seasons_ids = [];
    foreach ($this->seasons->seasons as $season) {
      $seasons_ids[] = $season->id;
    }
    return $seasons_ids;
  }
}

class CreatedBy {
  public $authors = [];

  public function __construct($data) {
    foreach ($data as $item) {
      $this->authors[] = Author::init($item);
    }
  }

  public static function init($data) {
    return new self($data);
  }
}

class Author {
  public $id;
  public $credit_id;
  public $name;
  public $original_name;
  public $gender;
  public $profile_path;

  public function __construct($data) {
    $this->id = isset($data->id) ? $data->id : -1;
    $this->credit_id = isset($data->credit_id) ? $data->credit_id : '';
    $this->name = isset($data->name) ? $data->name : '';
    $this->original_name = isset($data->original_name) ? $data->original_name : '';
    $this->profile_path = isset($data->profile_path) ? $data->profile_path : '';
  }
  public static function init($data) {
    return new self($data);
  }
}
