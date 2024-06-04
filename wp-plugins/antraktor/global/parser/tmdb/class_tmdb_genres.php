<?php
class Genres {
  public $genres = [];

  public function __construct($data) {
    foreach ($data as $genre) {
      $this->genres[] = new Genre($genre);
    }
  }

  public static function init($data) {
    return new self($data);
  }
}

class Genre {
  public $id;
  public $name;

  public function __construct($data) {
    $this->id = $data->id;
    $this->name = $data->name;
  }
}
