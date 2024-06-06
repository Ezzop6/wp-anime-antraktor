<?php

// {
//   "movie_results": [],
//   "person_results": [],
//   "tv_results": [],
//   "tv_episode_results": [
//     {
//       "id": 4698551,
//       "overview": "When the party happens upon a town whose inhabitants are all mysteriously asleep, it's time for their newest traveling companion to prove his mettle.",
//       "media_type": "tv_episode",
//       "name": "Smells Like Trouble",
//       "vote_average": 8.786,
//       "vote_count": 14,
//       "air_date": "2023-12-15",
//       "episode_number": 15,
//       "episode_type": "standard",
//       "production_code": "",
//       "runtime": 25,
//       "season_number": 1,
//       "show_id": 209867,
//       "still_path": "/65KUShpBJQHaIUM0Bzaixn2cbn2.jpg"
//     }
//   ],
//   "tv_season_results": []
// }
class GetByUniqueId {
  public $movie_results = [];
  public $person_results = [];
  public $tv_results = [];
  public $tv_episode_results = [];
  public $tv_season_results = [];

  public function __construct($data) {
    $this->movie_results = ImplementMePlease::init($data->movie_results);
    $this->person_results = ImplementMePlease::init($data->person_results);
    $this->tv_results = ImplementMePlease::init($data->tv_results);
    $this->tv_episode_results = TvEpisode::init($data->tv_episode_results);
    $this->tv_season_results = ImplementMePlease::init($data->tv_season_results);
  }

  public static function init($data) {
    return new self($data);
  }
}

class TvEpisode {
  public $id;
  public $overview;
  public $media_type;
  public $name;
  public $vote_average;
  public $vote_count;
  public $air_date;
  public $episode_number;
  public $episode_type;
  public $production_code;
  public $runtime;
  public $season_number;
  public $show_id;
  public $still_path;

  public function __construct($data) {
    $this->id = $data->id;
    $this->overview = $data->overview;
    $this->media_type = $data->media_type;
    $this->name = $data->name;
    $this->vote_average = $data->vote_average;
    $this->vote_count = $data->vote_count;
    $this->air_date = $data->air_date;
    $this->episode_number = $data->episode_number;
    $this->episode_type = $data->episode_type;
    $this->production_code = $data->production_code;
    $this->runtime = $data->runtime;
    $this->season_number = $data->season_number;
    $this->show_id = $data->show_id;
    $this->still_path = $data->still_path;
  }
  public static function init($data) {
    $episodes = [];
    foreach ($data as $episode) {
      $episodes[] = new self($episode);
    }
    return $episodes;
  }
}

class ImplementMePlease {
  public function __construct($data) {
    if ($data) {
      throw new Exception('Implement me please');
    }
  }

  public static function init($data) {
    return new self($data);
  }
}
