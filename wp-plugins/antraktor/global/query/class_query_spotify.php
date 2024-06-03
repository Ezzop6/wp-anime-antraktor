<?php

class QuerySpotify {
  public static $get_artist_by_name = 'get_artist_by_name';
  public static $get_recently_played = 'get_recently_played';

  public static function get_artist_by_name($atts) {
    $artist = $atts['get_artist_by_name'];
    if (!isset($artist)) {
      throw new Exception('Artist name not set');
    }
    return 'search?q=' . $artist . '&type=artist';
  }

  public static function get_recently_played($atts) {
    $limit = $atts['limit'] ?? 10;
    $after = $atts['after'] ?? null;
    $before = $atts['before'] ?? null;
    return 'me/player/recently-played?limit=' . $limit . '&after=' . $after . '&before=' . $before;
  }
}
