<?php

class ProductionCompanies {
  public static $production_companies;

  public function __construct($data) {
    self::$production_companies = array();
    foreach ($data as $production_company) {
      array_push(self::$production_companies, ProductionCompany::init($production_company));
    }
  }

  public static function init($data) {
    return new self($data);
  }
}

class ProductionCompany {
  public static $id;
  public static $logo_path;
  public static $name;
  public static $origin_country;

  public function __construct($data) {
    self::$id = $data->id;
    self::$logo_path = $data->logo_path;
    self::$name = $data->name;
    self::$origin_country = $data->origin_country;
  }

  public static function init($data) {
    return new self($data);
  }
}
