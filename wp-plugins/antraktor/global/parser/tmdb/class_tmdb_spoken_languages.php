<?php

class SpokenLanguages {
  public $spoken_languages = [];

  public function __construct($data) {
    foreach ($data as $spoken_language) {
      $this->spoken_languages[] = new SpokenLanguage($spoken_language);
    }
  }

  public static function init($data) {
    return new self($data);
  }
}

class SpokenLanguage {
  public $iso_639_1;
  public $name;
  public $english_name;

  public function __construct($data) {
    $this->iso_639_1 = isset($data->iso_639_1) ? $data->iso_639_1 : null;
    $this->name = isset($data->name) ? $data->name : null;
    $this->english_name = isset($data->english_name) ? $data->english_name : null;
  }

  public static function init($data) {
    return new self($data);
  }
}
