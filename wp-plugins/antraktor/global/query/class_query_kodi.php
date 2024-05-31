<?php
// TODO: better name
class QueryKodi {
  public static $player_get_active_players = 'Player.GetActivePlayers';
  public static $player_get_item = 'Player.GetItem';
  public static $player_get_properties = 'Player.GetProperties';
  public static $JSONRPC_INTROSPECT = 'JSONRPC.Introspect';

  public static function get_active_players() {
    return json_encode(array(
      'id' => 1,
      'jsonrpc' => '2.0',
      'method' => 'Player.GetActivePlayers'
    ));
  }

  public static function player_get_item(int $player_id = 1) {
    return json_encode(array(
      'id' => 1,
      'jsonrpc' => '2.0',
      'method' => 'Player.GetItem',
      'params' => array(
        'playerid' => $player_id,
        'properties' => array('title',  'season', 'episode', 'duration', 'showtitle', 'file', 'fanart')
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
        'properties' => array('time', 'percentage', 'totaltime', 'subtitles', 'videostreams')
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
