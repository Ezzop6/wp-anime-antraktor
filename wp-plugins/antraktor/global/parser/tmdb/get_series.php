<?php
class GetSeries {
  public $pages;
  public $seasons = [];

  public function __construct($data) {
    $this->pages = $data->total_pages;
    foreach ($data->results as $season) {
      $this->seasons[] = new Serie($season);
    }
  }

  public static function init($data) {
    return new self($data);
  }
}

class Serie {
  public $adult;
  public $backdrop_path;
  public $genre_ids;
  public $id;
  public $origin_country;
  public $original_language;
  public $overview;
  public $original_name;
  public $popularity;
  public $poster_path;
  public $first_air_date;
  public $name;
  public $vote_average;
  public $vote_count;
  public function __construct($data) {
    $this->adult = $data->adult;
    $this->backdrop_path = $data->backdrop_path;
    $this->genre_ids = $data->genre_ids;
    $this->id = $data->id;
    $this->origin_country = $data->origin_country;
    $this->original_language = $data->original_language;
    $this->overview = $data->overview;
    $this->original_name = $data->original_name;
    $this->popularity = $data->popularity;
    $this->poster_path = $data->poster_path;
    $this->first_air_date = $data->first_air_date;
    $this->name = $data->name;
    $this->vote_average = $data->vote_average;
    $this->vote_count = $data->vote_count;
  }
}
