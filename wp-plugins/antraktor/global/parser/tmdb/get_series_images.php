<?php

require_once plugin_dir_path(dirname(__FILE__)) . 'tmdb/class_tmdb_image.php';

class GestSeriesImages {
  public $id;
  public $backdrops = [];
  public $posters = [];
  public $logos = [];

  public function __construct($data) {
    $this->id = $data->id;
    foreach ($data->backdrops as $backdrop) {
      $this->backdrops[] = new TmdbImage($backdrop);
    }
    foreach ($data->posters as $poster) {
      $this->posters[] = new TmdbImage($poster);
    }
    foreach ($data->logos as $logo) {
      $this->logos[] = new TmdbImage($logo);
    }
  }
}
