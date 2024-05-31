<?php

class ApiDataParser {
  public static function parse($query_type, $api_data, $query_name, $debug_print = false) {
    return match ($query_type) {
      QueryIss::class => self::parse_iss_data($api_data, $debug_print),
      QueryKodi::class => self::parse_kodi_data($api_data, $query_name, $debug_print),
      QueryTmdb::class => self::parse_tmdb_data($api_data, $query_name, $debug_print),
      default => throw new Exception('Query type not found : ' . $query_type . ' in ApiDataParser::parse() method'),
    };
  }
  public static function parse_iss_data($api_data,  $debug_print = false): IssCurrentLocation {
    require_once 'parser/class_parser_iss_tracking.php';
    return ParserIss::parse($api_data, $debug_print);
  }

  public static function parse_kodi_data($api_data, $query_name, $debug_print = false) {
    require_once 'parser/class_parser_kodi.php';
    return ParserKodi::parse($api_data, $query_name, $debug_print);
  }

  public static function parse_tmdb_data($api_data, $query_name, $debug_print = false) {
    require_once 'parser/class_parser_tmdb.php';
    return ParserTmdb::parse($api_data, $query_name,  $debug_print);
  }
}
