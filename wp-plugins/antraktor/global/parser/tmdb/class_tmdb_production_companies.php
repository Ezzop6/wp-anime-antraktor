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
    $this->id = isset($data->id) ? (int)$data->id : -1;
    $this->logo_path = isset($data->logo_path) ? $data->logo_path : '';
    $this->name = isset($data->name) ? $data->name : '';
    $this->origin_country = isset($data->origin_country) ? $data->origin_country : '';
  }

  public static function init($data) {
    return new self($data);
  }
}
