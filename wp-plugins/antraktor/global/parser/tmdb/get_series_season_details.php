<?php

require_once plugin_dir_path(dirname(__FILE__)) . 'tmdb/class_tmdb_episode_details_id.php';

class GetSeriesSeasonDetails {
  public $_id;
  public $air_date;
  public $name;
  public $overview;
  public $id;
  public $poster_path;
  public $season_number;
  public $vote_average;
  public $episodes = [];

  public function __construct($data) {
    $this->_id = $data->_id;
    $this->air_date = $data->air_date;
    $this->name = $data->name;
    $this->overview = $data->overview;
    $this->id = $data->id;
    $this->poster_path = $data->poster_path;
    $this->season_number = $data->season_number;
    $this->vote_average = $data->vote_average;

    foreach ($data->episodes as $episode) {
      $this->episodes[] = new EpisodeDetailsID($episode);
    }
  }

  public static function init($data) {
    return new self($data);
  }
}
