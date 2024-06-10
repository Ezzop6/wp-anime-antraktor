<?php

class ApiDataParser {
  public static function parse($query_type, $api_data, $debug_print = false) {
    return match (get_class($query_type)) {
      QueryIss::class => self::parse_iss_data($api_data, $debug_print),
      QueryKodi::class => self::parse_kodi_data($query_type::$query_name, $api_data, $debug_print),
      QueryTmdb::class => self::parse_tmdb_data($query_type::$query_name, $api_data, $debug_print),
      default => throw new Exception('Query type not found : ' . $query_type . ' in ApiDataParser::parse() method'),
    };
  }
  public static function parse_iss_data($api_data,  $debug_print = false): IssCurrentLocation {
    require_once 'parser/class_parser_iss_tracking.php';
    return ParserIss::parse($api_data, $debug_print);
  }

  public static function parse_kodi_data($query_name, $api_data,  $debug_print = false) {
    require_once 'parser/class_parser_kodi.php';
    return ParserKodi::parse($query_name, $api_data, $debug_print);
  }

  public static function parse_tmdb_data($query_name, $api_data, $debug_print = false) {
    require_once 'parser/class_parser_tmdb.php';
    return ParserTmdb::parse($query_name,  $api_data, $debug_print);
  }
}
