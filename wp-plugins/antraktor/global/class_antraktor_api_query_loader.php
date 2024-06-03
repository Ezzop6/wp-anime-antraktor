<?php

use GuzzleHttp\Psr7\Query;

class AntraktorApiQueryLoader {
  public static function get_query($class, string $api_query_name, $atts = null) {
    return match ($class) {
      QueryKodi::class => self::kodi_query($api_query_name),
      QueryTmdb::class => self::tmdb_query($api_query_name, $atts),
      QueryAnilist::class => self::anilist_query($api_query_name, $atts),
      default => throw new Exception('Invalid API target'),
    };
  }

  public static function kodi_query(string $api_query_name) {
    return match ($api_query_name) {
      QueryKodi::$player_get_item => QueryKodi::player_get_item(),
      QueryKodi::$player_get_active_players => QueryKodi::player_get_active_players(),
      QueryKodi::$player_get_properties => QueryKodi::player_get_properties(),
      QueryKodi::$JSONRPC_INTROSPECT => QueryKodi::get_api(),
      default => throw new Exception('Invalid Kodi query name: ' . $api_query_name ?? 'null'),
    };
  }
  public static function tmdb_query(string $api_query_name, $atts) {
    return match ($api_query_name) {
      QueryTmdb::$get_movie_by_name => QueryTmdb::get_movie_by_name($atts),
      QueryTmdb::$get_movie_details_by_id => QueryTmdb::get_movie_details_by_id($atts),
      QueryTmdb::$get_series_by_name => QueryTmdb::get_series_by_name($atts),
      QueryTmdb::$get_series_details_by_id => QueryTmdb::get_series_details_by_id($atts),
      default => throw new Exception('Invalid Tmdb query name: ' . $api_query_name . ' ' . $atts['movie_name']),
    };
  }
  public static function anilist_query(string $api_query_name, $atts) {
    return match ($api_query_name) {
      QueryAnilist::$test => QueryAnilist::test($atts),
      default => throw new Exception('Invalid Anilist query name: ' . $api_query_name),
    };
  }
}
