<?php
class GetSimilarSeries {
  public $page;
  public $results = [];
  public $total_results;
  public $total_pages;

  public function __construct($api_data) {
    $this->page = isset($api_data->page) ? $api_data->page : null;
    $this->total_results = isset($api_data->total_results) ? $api_data->total_results : null;
    $this->total_pages = isset($api_data->total_pages) ? $api_data->total_pages : null;
    foreach ($api_data->results as $result) {
      $this->results[] = SimilarSeries::init($result);
    }
  }

  public static function init($api_data) {
    return new self($api_data);
  }
}

class SimilarSeries {
  public $adult;
  public $backdrop_path;
  public $genres_ids;
  public $id;
  public $origin_language;
  public $origin_name;
  public $overview;
  public $poster_path;
  public $popularity;
  public $first_air_date;
  public $name;
  public $vote_average;
  public $vote_count;

  public function __construct($data) {
    $this->adult = isset($data->adult) ? $data->adult : null;
    $this->backdrop_path = isset($data->backdrop_path) ? $data->backdrop_path : null;
    $this->genres_ids = isset($data->genres_ids) ? $data->genres_ids : null;
    $this->id = isset($data->id) ? $data->id : null;
    $this->origin_language = isset($data->origin_language) ? $data->origin_language : null;
    $this->origin_name = isset($data->origin_name) ? $data->origin_name : null;
    $this->overview = isset($data->overview) ? $data->overview : null;
    $this->poster_path = isset($data->poster_path) ? $data->poster_path : null;
    $this->popularity = isset($data->popularity) ? $data->popularity : null;
    $this->first_air_date = isset($data->first_air_date) ? $data->first_air_date : null;
    $this->name = isset($data->name) ? $data->name : null;
    $this->vote_average = isset($data->vote_average) ? $data->vote_average : null;
    $this->vote_count = isset($data->vote_count) ? $data->vote_count : null;
    $this->backdrop_path = isset($data->backdrop_path) ? $data->backdrop_path : null;
    $this->first_air_date = isset($data->first_air_date) ? $data->first_air_date : null;
  }
  public static function init($data) {
    return new self($data);
  }
}
