<?php

class Video {
  public $iso_639_1;
  public $iso_3166_1;
  public $name;
  public $key;
  public $site;
  public $size;
  public $type;
  public $official;
  public $published_at;
  public $id;

  public function __construct($data) {
    $this->iso_639_1 = $data->iso_639_1;
    $this->iso_3166_1 = $data->iso_3166_1;
    $this->name = $data->name;
    $this->key = $data->key;
    $this->site = $data->site;
    $this->size = $data->size;
    $this->type = $data->type;
    $this->official = $data->official;
    $this->published_at = $data->published_at;
    $this->id = $data->id;
  }

  public static function init($data) {
    return new self($data);
  }
}
