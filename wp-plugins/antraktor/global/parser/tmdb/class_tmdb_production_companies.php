<?php

class ProductionCompanies {

  public $production_companies = [];
  public function __construct($data) {
    foreach ($data as $production_company) {
      $this->production_companies[] = new ProductionCompany($production_company);
    }
  }

  public static function init($data) {
    return new self($data);
  }
}

class ProductionCompany {
  public $id;
  public $logo_path;
  public $name;
  public $origin_country;

  public function __construct($data) {
    $this->id = $data->id;
    $this->logo_path = $data->logo_path;
    $this->name = $data->name;
    $this->origin_country = $data->origin_country;
  }

  public static function init($data) {
    return new self($data);
  }
}
