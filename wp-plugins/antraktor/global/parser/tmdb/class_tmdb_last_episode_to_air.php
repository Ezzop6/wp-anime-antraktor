<?php
class LastEpisodeToAir {
  public $id;
  public $overview;
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
    $this->id = $data->id ?? null;
    $this->overview = $data->overview ?? null;
    $this->name = $data->name ?? null;
    $this->vote_average = $data->vote_average ?? null;
    $this->vote_count = $data->vote_count ?? null;
    $this->air_date = $data->air_date ?? null;
    $this->episode_number = $data->episode_number ?? null;
    $this->episode_type = $data->episode_type ?? null;
    $this->production_code = $data->production_code ?? null;
    $this->runtime = $data->runtime ?? null;
    $this->season_number = $data->season_number ?? null;
    $this->show_id = $data->show_id ?? null;
    $this->still_path = $data->still_path ?? null;
  }
  public static function init($data) {
    return new self($data);
  }
}
