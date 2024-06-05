<?php
class Crew {
  public $job;
  public $department;
  public $credit_id;
  public $adult;
  public $gender;
  public $id;
  public $known_for_department;
  public $name;
  public $original_name;
  public $popularity;
  public $profile_path;

  public function __construct($data) {
    $this->job = $data->job;
    $this->department = $data->department;
    $this->credit_id = $data->credit_id;
    $this->adult = $data->adult;
    $this->gender = $data->gender;
    $this->id = $data->id;
    $this->known_for_department = $data->known_for_department;
    $this->name = $data->name;
    $this->original_name = $data->original_name;
    $this->popularity = $data->popularity;
    $this->profile_path = $data->profile_path;
  }
  public function init($data) {
    return new Crew($data);
  }
}
