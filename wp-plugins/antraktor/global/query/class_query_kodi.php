<?php
// TODO: better name
class QueryKodi {
  public static $active_players = 'get_active_players';
  public static $currently_playing = 'get_currently_playing';
  public static $properties = 'get_properties';
  public static $api = 'get_api';

  public static function get_active_players() {
    return json_encode(array(
      'id' => 1,
      'jsonrpc' => '2.0',
      'method' => 'Player.GetActivePlayers'
    ));
  }

  public static function get_item_currently_playing(int $player_id = 1) {
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

  public static function player_get_properties(int $player_id = 1) {
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
  public static function get_api() {
    return json_encode(array(
      'id' => 1,
      'jsonrpc' => '2.0',
      'method' => 'JSONRPC.Introspect',
    ));
  }
}
