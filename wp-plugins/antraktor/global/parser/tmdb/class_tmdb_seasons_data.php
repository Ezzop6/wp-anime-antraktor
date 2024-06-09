<?php
class SeasonsData {
  public $seasons = [];

  public function __construct($data) {
    foreach ($data as $season) {
      $this->seasons[] = Season::init($season);
    }
  }

  public static function init($data) {
    return new self($data);
  }
}

class Season {
  public $air_date;
  public $episode_count;
  public $id;
  public $name;
  public $overview;
  public $poster_path;
  public $season_number;
  public $vote_average;

  public function __construct($data) {
    $this->air_date = isset($data->air_date) ? $data->air_date : '';
    $this->episode_count = isset($data->episode_count) ? (int)$data->episode_count : -1;
    $this->id = isset($data->id) ? (int)$data->id : -1;
    $this->name = isset($data->name) ? $data->name : '';
    $this->overview = isset($data->overview) ? $data->overview : '';
    $this->poster_path = isset($data->poster_path) ? $data->poster_path : '';
    $this->season_number = isset($data->season_number) ? (int)$data->season_number : -1;
    $this->vote_average = isset($data->vote_average) ? (float)$data->vote_average : -1;
  }

  public static function init($data) {
    return new self($data);
  }
}
