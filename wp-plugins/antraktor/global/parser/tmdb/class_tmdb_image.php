<?php

class TmdbImage {
  public $aspect_ratio;
  public $file_path;
  public $height;
  public $iso_639_1;
  public $vote_average;
  public $vote_count;
  public $width;

  public function __construct($data) {
    $this->aspect_ratio = $data->aspect_ratio;
    $this->file_path = $data->file_path;
    $this->height = $data->height;
    $this->iso_639_1 = $data->iso_639_1;
    $this->vote_average = $data->vote_average;
    $this->vote_count = $data->vote_count;
    $this->width = $data->width;
  }
}
