<?php

require_once plugin_dir_path(dirname(__FILE__)) . 'tmdb/class_tmdb_crew.php';
require_once plugin_dir_path(dirname(__FILE__)) . 'tmdb/class_tmdb_guest_star.php';

class Season {
  public $air_date;
  public $episode_number;
  public $episode_type;
  public $id;
  public $name;
  public $overview;
  public $production_code;
  public $runtime;
  public $season_number;
  public $show_id;
  public $still_path;
  public $vote_average;
  public $vote_count;
  public $crew = [];
  public $guest_stars = [];

  public function __construct($data) {
    $this->air_date = $data->air_date;
    $this->episode_number = $data->episode_number;
    $this->episode_type = $data->episode_type;
    $this->id = $data->id;
    $this->name = $data->name;
    $this->overview = $data->overview;
    $this->production_code = $data->production_code;
    $this->runtime = $data->runtime;
    $this->season_number = $data->season_number;
    $this->show_id = $data->show_id;
    $this->still_path = $data->still_path;
    $this->vote_average = $data->vote_average;
    $this->vote_count = $data->vote_count;

    foreach ($data->crew as $crew) {
      $this->crew[] = new Crew($crew);
    }

    foreach ($data->guest_stars as $star) {
      $this->guest_stars[] = new GuestStar($star);
    }
  }

  public function init($data) {
    return new Season($data);
  }
}
