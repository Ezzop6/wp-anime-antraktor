<?php

class SpokenLanguages {
  public static $spoken_languages;

  public function __construct($data) {
    self::$spoken_languages = array();
    foreach ($data as $spoken_language) {
      array_push(self::$spoken_languages, SpokenLanguage::init($spoken_language));
    }
  }

  public static function init($data) {
    return new self($data);
  }
}


class SpokenLanguage {
  public static $iso_639_1;
  public static $name;

  public function __construct($data) {
    self::$iso_639_1 = $data->iso_639_1;
    self::$name = $data->name;
  }

  public static function init($data) {
    return new self($data);
  }
}
