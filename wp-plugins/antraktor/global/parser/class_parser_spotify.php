<?php
class ParserSpotify {
  public static function parse($api_data, $query_name, $debug_print) {
    if (empty($api_data)) {
      throw new Exception('No data provided');
    }
    if (empty($query_name)) {
      throw new Exception('No query name provided');
    }
    $api_data = json_decode($api_data);
    return match ($query_name) {
      QuerySpotify::$get_artist_by_name => self::get_artist_by_name($api_data, $debug_print),
      default => throw new Exception('Query name not found : ' . $query_name . ' in ParserSpotify::parse() method'),
    };
  }
  public static function get_artist_by_name($api_data, $debug_print): GetArtist {
    require_once 'spotify/get_artist.php';
    return new GetArtist($api_data);
  }
}
