<?php
class GetMovie {
  public $page;
  public $movies = [];

  public function __construct($data) {
    $this->page = $data->page;
    foreach ($data->results as $movie) {
      $this->movies[] = new Movie($movie);
    }
  }
}

class Movie {
  public $adult;
  public $backdrop_path;
  public $genre_ids;
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
    $this->adult = $data->adult ? true : false;
    $this->backdrop_path = $data->backdrop_path;
    $this->genre_ids = $data->genre_ids;
    $this->id = $data->id;
    $this->original_language = $data->original_language;
    $this->original_title = $data->original_title;
    $this->overview = $data->overview;
    $this->popularity = $data->popularity;
    $this->poster_path = $data->poster_path;
    $this->release_date = $data->release_date;
    $this->title = $data->title;
    $this->video = $data->video;
    $this->vote_average = $data->vote_average;
    $this->vote_count = $data->vote_count;
  }
}
