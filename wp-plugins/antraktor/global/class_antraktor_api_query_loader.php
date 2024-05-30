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
      QueryKodi::$currently_playing => QueryKodi::get_item_currently_playing(),
      QueryKodi::$active_players => QueryKodi::get_active_players(),
      QueryKodi::$properties => QueryKodi::player_get_properties(),
      QueryKodi::$api => QueryKodi::get_api(),
      default => throw new Exception('Invalid Kodi query name'),
    };
  }
  public static function tmdb_query(string $api_query_name, $atts) {
    return match ($api_query_name) {
      QueryTmdb::$movie => QueryTmdb::get_movie($atts),
      QueryTmdb::$movie_details => QueryTmdb::get_movie_details($atts),
      default => throw new Exception('Invalid Tmdb query name'),
    };
  }
}
