<?php
class AntraktorApiQueryLoader {
  public static function get_query(string $api_target, string $api_query_name, $atts = null) {
    return match ($api_target) {
      'kodi' => self::kodi_query($api_query_name),
      'tmdb' => self::tmdb_query($api_query_name, $atts),
      default => throw new Exception('Invalid API target'),
    };
  }

  public static function kodi_query(string $api_query_name) {
    return match ($api_query_name) {
      QueryKodi::$player_get_item => QueryKodi::player_get_item(),
      QueryKodi::$player_get_active_players => QueryKodi::get_active_players(),
      QueryKodi::$player_get_properties => QueryKodi::player_get_properties(),
      QueryKodi::$JSONRPC_INTROSPECT => QueryKodi::get_api(),
      default => throw new Exception('Invalid Kodi query name: ' . $api_query_name ?? 'null'),
    };
  }
  public static function tmdb_query(string $api_query_name, $atts) {
    return match ($api_query_name) {
      QueryTmdb::$get_movie => QueryTmdb::get_movie($atts),
      QueryTmdb::$get_movie_details => QueryTmdb::get_movie_details($atts),
      default => throw new Exception('Invalid Tmdb query name: ' . $api_query_name . ' ' . $atts['movie_name']),
    };
  }
}
