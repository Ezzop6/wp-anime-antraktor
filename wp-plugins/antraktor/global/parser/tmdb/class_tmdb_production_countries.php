<?php

class ProductionCountries {
  public static $production_countries;

  public function __construct($data) {
    self::$production_countries = array();
    foreach ($data as $production_country) {
      array_push(self::$production_countries, ProductionCountry::init($production_country));
    }
  }

  public static function init($data) {
    return new self($data);
  }
}

class ProductionCountry {
  public static $iso_3166_1;
  public static $name;

  public function __construct($data) {
    self::$iso_3166_1 = $data->iso_3166_1;
    self::$name = $data->name;
  }

  public static function init($data) {
    return new self($data);
  }
}
