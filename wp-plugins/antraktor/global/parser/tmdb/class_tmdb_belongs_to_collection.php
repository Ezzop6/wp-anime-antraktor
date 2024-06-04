<?php

class BelongsToCollection {
  public $id;
  public $name;
  public $poster_path;
  public $backdrop_path;

  public function __construct($api_data) {
    $this->id = $api_data->id ?? '';
    $this->name = $api_data->name ?? '';
    $this->poster_path = $api_data->poster_path ?? '';
    $this->backdrop_path = $api_data->backdrop_path ?? '';
  }

  public static function init($api_data) {
    return new self($api_data);
  }
}
