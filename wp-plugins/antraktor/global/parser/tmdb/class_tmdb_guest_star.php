<?php
class GuestStar {
  public function __construct($data) {
    if ($data) {
      throw new Exception('GuestStar data is not empty please implement me');
    }
  }
}
