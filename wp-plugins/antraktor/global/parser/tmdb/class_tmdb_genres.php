<?php

class Genres {
  public static $genres;

  public function __construct($data) {
    self::$genres = array();
    foreach ($data as $genre) {
      array_push(self::$genres, Genre::init($genre));
    }
  }

  public static function init($data) {
    return new self($data);
  }
}

class Genre {
  public static $id;
  public static $name;

  public function __construct($data) {
    self::$id = $data->id;
    self::$name = $data->name;
  }

  public static function init($data) {
    return new self($data);
  }
}
