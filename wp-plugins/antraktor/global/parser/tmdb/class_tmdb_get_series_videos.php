<?php

require_once plugin_dir_path(__FILE__) . 'class_tmdb_video.php';

class GetSeriesVideos {
  public $id;
  public $results;

  public function __construct($data) {
    $this->id = $data->id;
    $this->results = array();
    foreach ($data->results as $video) {
      $this->results[] = Video::init($video);
    }
  }

  public static function init($data) {
    return new self($data);
  }
}
