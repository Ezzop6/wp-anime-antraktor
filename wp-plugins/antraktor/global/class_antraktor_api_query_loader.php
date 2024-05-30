<?php
class AntraktorApiQueryLoader {
  public static function get_query(string $api_target, string $api_query_name) {
    return match ($api_target) {
      'kodi' => self::kodi_query($api_query_name),
      default => throw new Exception('Invalid API target'),
    };
  }

  public static function kodi_query(string $api_query_name) {
    return match ($api_query_name) {
      'Player.GetActivePlayers' => self::kodi_player_get_active_players(),
      'Player.GetItemCurrentlyPlaying' => self::kodi_player_get_item_currently_playing(),
      'Player.GetProperties' => self::kodi_player_get_properties(),
      default => throw new Exception('Invalid Kodi query name'),
    };
  }

  public static function kodi_player_get_active_players() {
    return json_encode(array(
      'id' => 1,
      'jsonrpc' => '2.0',
      'method' => 'Player.GetActivePlayers'
    ));
  }

  public static function kodi_player_get_item_currently_playing(int $player_id = 1) {
    return json_encode(array(
      'id' => 1,
      'jsonrpc' => '2.0',
      'method' => 'Player.GetItem',
      'params' => array(
        'playerid' => $player_id,
        'properties' => array('title', 'album', 'artist', 'season', 'episode', 'duration', 'showtitle', 'tvshowid', 'thumbnail', 'file', 'fanart', 'streamdetails')
      )
    ));
  }

  public static function kodi_player_get_properties(int $player_id = 1) {
    return json_encode(array(
      'id' => 1,
      'jsonrpc' => '2.0',
      'method' => 'Player.GetProperties',
      'params' => array(
        'playerid' => $player_id,
        'properties' => array('time', 'percentage')
      )
    ));
  }
}
