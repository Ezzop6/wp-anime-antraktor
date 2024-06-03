<?php
class SeasonsData {
  public static $seasons = [];

  public function __construct($data) {
    foreach ($data as $season) {
      $new_season = new Season($season);
      array_push(self::$seasons, $new_season);
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
    $this->air_date = $data->air_date;
    $this->episode_count = $data->episode_count;
    $this->id = $data->id;
    $this->name = $data->name;
    $this->overview = $data->overview;
    $this->poster_path = $data->poster_path;
    $this->season_number = $data->season_number;
    $this->vote_average = $data->vote_average;
  }
}
