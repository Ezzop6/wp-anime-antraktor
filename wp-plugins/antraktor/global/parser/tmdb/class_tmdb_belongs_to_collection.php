<?php

class BelongsToCollection {
  public $id;
  public $name;
  public $poster_path;
  public $backdrop_path;

  public function __construct($api_data) {
    $this->id = isset($api_data->id) ? $api_data->id : null;
    $this->name = isset($api_data->name) ? $api_data->name : null;
    $this->poster_path = isset($api_data->poster_path) ? $api_data->poster_path : null;
    $this->backdrop_path = isset($api_data->backdrop_path) ? $api_data->backdrop_path : null;
  }

  public static function init($api_data) {
    return new self($api_data);
  }
}
