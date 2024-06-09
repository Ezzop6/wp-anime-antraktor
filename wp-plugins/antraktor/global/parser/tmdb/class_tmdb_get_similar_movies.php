<?php
class GetSimilarMovies {
  public $page;
  public $results = [];
  public $total_results;
  public $total_pages;

  public function __construct($api_data) {
    $this->page = isset($api_data->page) ? $api_data->page : null;
    $this->total_results = isset($api_data->total_results) ? $api_data->total_results : null;
    $this->total_pages = isset($api_data->total_pages) ? $api_data->total_pages : null;
    foreach ($api_data->results as $result) {
      $this->results[] = SimilarMovie::init($result);
    }
  }

  public static function init($api_data) {
    return new self($api_data);
  }
}

class SimilarMovie {
  public $adult;
  public $backdrop_path;
  public $id;
  public $original_language;
  public $original_title;
  public $overview;
  public $popularity;
  public $poster_path;
  public $release_date;
  public $title;
  public $video;
  public $vote_average;
  public $vote_count;

  public function __construct($data) {
    $this->adult = isset($data->adult) ? $data->adult : null;
    $this->backdrop_path = isset($data->backdrop_path) ? $data->backdrop_path : null;
    $this->id = isset($data->id) ? $data->id : null;
    $this->original_language = isset($data->original_language) ? $data->original_language : null;
    $this->original_title = isset($data->original_title) ? $data->original_title : null;
    $this->overview = isset($data->overview) ? $data->overview : null;
    $this->popularity = isset($data->popularity) ? $data->popularity : null;
    $this->poster_path = isset($data->poster_path) ? $data->poster_path : null;
    $this->release_date = isset($data->release_date) ? $data->release_date : null;
    $this->title = isset($data->title) ? $data->title : null;
    $this->video = isset($data->video) ? $data->video : null;
    $this->vote_average = isset($data->vote_average) ? $data->vote_average : null;
    $this->vote_count = isset($data->vote_count) ? $data->vote_count : null;
  }
  public static function init($data) {
    return new self($data);
  }
}
