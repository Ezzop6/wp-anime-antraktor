<?php

class BelongsToCollection {
  public static $id;
  public static $name;
  public static $poster_path;
  public static $backdrop_path;

  public function __construct($api_data) {
    self::$id = $api_data->id;
    self::$name = $api_data->name;
    self::$poster_path = $api_data->poster_path;
    self::$backdrop_path = $api_data->backdrop_path;
  }

  public static function init($api_data) {
    return new self($api_data);
  }
}
