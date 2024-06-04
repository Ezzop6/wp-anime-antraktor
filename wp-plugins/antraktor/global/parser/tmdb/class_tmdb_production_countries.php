<?php

class ProductionCountries {
  public $production_countries = [];

  public function __construct($data) {
    foreach ($data as $production_country) {
      $this->production_countries[] = new ProductionCountry($production_country);
    }
  }

  public static function init($data) {
    return new self($data);
  }
}

class ProductionCountry {
  public $iso_3166_1;
  public $name;

  public function __construct($data) {
    $this->iso_3166_1 = $data->iso_3166_1;
    $this->name = $data->name;
  }

  public static function init($data) {
    return new self($data);
  }
}
