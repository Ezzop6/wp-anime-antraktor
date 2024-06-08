<?php
class GuestStar {
  public $character;
  public $credit_id;
  public $order;
  public $adult;
  public $gender;
  public $id;
  public $known_for_department;
  public $name;
  public $original_name;
  public $popularity;
  public $profile_path;

  public function __construct($data) {
    $this->character = $data->character;
    $this->credit_id = $data->credit_id;
    $this->order = $data->order;
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
    return new GuestStar($data);
  }
}
