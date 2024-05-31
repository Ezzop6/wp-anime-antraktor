<?php
class ParserKodi {
  public static function parse($Kodi_data, $query_name, $debug_print) {
    if (empty($api_data)) {
      throw new Exception('No data provided');
    }
    if (empty($query_name)) {
      throw new Exception('No query name provided');
    }
    $Kodi_data = json_decode($Kodi_data);
    self::validate_input($Kodi_data, $query_name);
    return match ($query_name) {
      QueryKodi::$player_get_item => self::player_get_item($Kodi_data, $debug_print),
      QueryKodi::$player_get_properties => self::player_get_properties($Kodi_data, $debug_print),
      QueryKodi::$player_get_active_players => self::player_get_active_players($Kodi_data, $debug_print),
      default => throw new Exception('Query name not found : ' . $query_name . ' in ParserKodi::parse() method'),
    };
  }

  public static function player_get_item($Kodi_data, $debug_print): PlayerGetItem {
    require_once 'kodi/player_get_item.php';
    return new PlayerGetItem($Kodi_data);
  }

  public static function player_get_properties($Kodi_data, $debug_print): PlayerGetProperties {
    require_once 'kodi/player_get_properties.php';
    return new PlayerGetProperties($Kodi_data);
  }

  public static function player_get_active_players($Kodi_data, $debug_print): PlayerGetActivePlayers {
    require_once 'kodi/player_get_active_players.php';
    return new PlayerGetActivePlayers($Kodi_data);
  }

  public static function validate_input($Kodi_data, $query_name): void {
    if (empty($Kodi_data)) {
      throw new Exception('Empty data in ParserKodi::validate_input() method');
    }
    if (empty($query_name)) {
      throw new Exception('Empty query name in ParserKodi::validate_input() method');
    }
  }

  public static function debug_print($result) {
    echo '<pre>';
    print_r($result);
    echo '</pre>';
  }
}
