<?php

class ParserIssTracking {
  public static function parse($iss_position, $debug_print) {
    $iss_position = json_decode($iss_position, true);
    $result = array();
    $result['iss_position'] = array(
      'latitude' => $iss_position['iss_position']['latitude'],
      'longitude' => $iss_position['iss_position']['longitude'],
    );
    $result['timestamp'] = $iss_position['timestamp'];
    $result['message'] = $iss_position['message'];
    if ($debug_print) {
      echo '<pre>';
      print_r($result);
      echo '</pre>';
    }
    return $result;
  }
}
