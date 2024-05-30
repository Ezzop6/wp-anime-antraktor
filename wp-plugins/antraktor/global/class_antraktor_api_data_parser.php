<?php

class ApiDataParser {
  public static function parse_iss_tracking_data($api_data,  $debug_print = false) {
    if (empty($api_data)) {
      throw new Exception('No data provided');
    }
    require_once 'parser/class_parser_iss_tracking.php';
    return ParserIssTracking::parse($api_data, $debug_print, $debug_print);
  }

  public static function parse_kodi_data($api_data, $query_name, $debug_print = false) {
    if (empty($api_data)) {
      throw new Exception('No data provided');
    }
    if (empty($query_name)) {
      throw new Exception('No query name provided');
    }
    require_once 'parser/class_parser_kodi.php';
    return ParserKodi::parse($api_data, $query_name, $debug_print);
  }

  public static function parse_tmdb_data($api_data, $query_name, $query, $debug_print = false) {
    if (empty($api_data)) {
      throw new Exception('No data provided');
    }
    if (empty($query_name)) {
      throw new Exception('No query name provided');
    }
    if (empty($query)) {
      throw new Exception('No query provided');
    }
    throw new Exception('Not implemented yet!');
  }
}
