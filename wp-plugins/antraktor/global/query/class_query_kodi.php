<?php
// TODO: better name
class QueryKodi {
  public static $player_get_active_players = 'Player.GetActivePlayers';
  public static $player_get_item = 'Player.GetItem';
  public static $player_get_properties = 'Player.GetProperties';
  public static $JSONRPC_INTROSPECT = 'JSONRPC.Introspect';

  public static function player_get_active_players() {
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
        'properties' => array(
          "title",
          "artist",
          "albumartist",
          "genre",
          "year",
          "rating",
          "album",
          "track",
          "duration",
          "comment",
          "lyrics",
          "musicbrainztrackid",
          "musicbrainzartistid",
          "musicbrainzalbumid",
          "musicbrainzalbumartistid",
          "playcount",
          "fanart",
          "director",
          "trailer",
          "tagline",
          "plot",
          "plotoutline",
          "originaltitle",
          "lastplayed",
          "writer",
          "studio",
          "mpaa",
          "cast",
          "country",
          "imdbnumber",
          "premiered",
          "productioncode",
          "runtime",
          "set",
          "showlink",
          "streamdetails",
          "top250",
          "votes",
          "firstaired",
          "season",
          "episode",
          "showtitle",
          "thumbnail",
          "file",
          "resume",
          "artistid",
          "albumid",
          "tvshowid",
          "setid",
          "watchedepisodes",
          "disc",
          "tag",
          "art",
          "genreid",
          "displayartist",
          "albumartistid",
          "description",
          "theme",
          "mood",
          "style",
          "albumlabel",
          "sorttitle",
          "episodeguide",
          "uniqueid",
          "dateadded",
          "channel",
          "channeltype",
          "hidden",
          "locked",
          "channelnumber",
          "subchannelnumber",
          "starttime",
          "endtime",
          "specialsortseason",
          "specialsortepisode",
          "compilation",
          "releasetype",
          "albumreleasetype",
          "contributors",
          "displaycomposer",
          "displayconductor",
          "displayorchestra",
          "displaylyricist",
          "userrating",
          "sortartist",
          "musicbrainzreleasegroupid",
          "mediapath",
          "dynpath",
          "isboxset",
          "totaldiscs",
          "disctitle",
          "releasedate",
          "originaldate",
          "bpm",
          "bitrate",
          "samplerate",
          "channels",
          "albumstatus",
          "datemodified",
          "datenew",
          "customproperties",
          "albumduration"
        )
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
