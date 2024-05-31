<?php

class ParserIss {
  public static function parse($iss_position, $debug_print): IssCurrentLocation {
    if (empty($iss_position)) {
      throw new Exception('No data provided in ParserIss::parse() method');
    }
    $iss_position = json_decode($iss_position);
    require_once 'iss/get_curent_location.php';
    return new IssCurrentLocation($iss_position);
  }
}
