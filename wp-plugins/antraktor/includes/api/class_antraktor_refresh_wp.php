<?php
class AntraktorRefresh {
  public static function refresh() {

    $kodi_playing_now = AF::get_kodi_now_playing();
    if (!$kodi_playing_now) {
      return new WP_REST_Response('No show playing', 200);
    }

    $record_added = AntraktorKodiManager::add_record($kodi_playing_now);
    if ($record_added) {
      return new WP_REST_Response('New show added', 200);
    }
    if (!$record_added && $kodi_playing_now->type == 'episode') {
      return self::handle_episode_logic($kodi_playing_now);
    }
    if (!$record_added && $kodi_playing_now->type == 'movie') {
      return self::handle_movie_logic($kodi_playing_now);
    }
  }

  public static function handle_movie_logic($kodi_playing_now) {
    $name = $kodi_playing_now->movie_name;
    $record_key = AntraktorKodiManager::get_record_key_by_name($name);
    $show_data = AntraktorKodiManager::get_record($record_key);
    if ($show_data->watch_status == 'not_started') {
      return new WP_REST_Response('Movie is not in the watching list', 200);
    }
    if ($show_data->watch_status == 'watching') {
      $movie = AntraktorMovieManager::get_record($show_data->id_tmdb);
      if (!$movie) {
        $result = AntraktorMovieManager::add_record($show_data->id_tmdb);
        if ($result) {
          return new WP_REST_Response('Movie added to the database', 200);
        } else {
          return new WP_REST_Response('Movie not added to the database', 200);
        }
      } else {
        $kodi_playing_now = AF::player_get_properties();
        if ($kodi_playing_now->percentage < 85) {
          $result = AntraktorMovieManager::update_progress($show_data->id_tmdb, $kodi_playing_now->percentage);
          return new WP_REST_Response('Movie ' . $show_data->name . ' updated', 200);
        }
        if ($kodi_playing_now->percentage > 85 && $movie->watch_status == 'watching') {
          $result = AntraktorMovieManager::mark_as_complete($show_data->id_tmdb);
          return new WP_REST_Response('Movie ' . $show_data->name . ' marked as complete', 200);
        } else {
          return new WP_REST_Response('Movie ' . $show_data->name . ' already watched', 200);
        }
      }
    }
    return new WP_REST_Response('Movie logic', 200);
  }

  public static function handle_episode_logic($kodi_playing_now) {
    $series_season = $kodi_playing_now->season;
    $series_episode = $kodi_playing_now->episode;
    $name = $kodi_playing_now->movie_name;
    $record_key = AntraktorKodiManager::get_record_key_by_name($name);
    if (!$record_key) {
      AntraktorKodiManager::add_record($kodi_playing_now);
      return new WP_REST_Response('Show not found', 200);
    }
    $show_data = AntraktorKodiManager::get_record($record_key);
    if ($show_data->watch_status == 'not_started') {
      return new WP_REST_Response('Show is not in the watching list', 200);
    }
    $tvdb_show_id = $show_data->tvdb_show_id;

    if ($record_key && $series_season && $series_episode && $show_data->watch_status == 'watching') {
      $kodi_playing_now = AF::player_get_properties();
      $episode = AntraktorEpisodeManager::get_record($tvdb_show_id, $series_season, $series_episode);
      if (!$episode) {
        AntraktorEpisodeManager::add_record($tvdb_show_id, $series_season, $series_episode);
      }
      if ($episode && $episode->watch_status == 'watching' && $kodi_playing_now->percentage < 85) {
        AntraktorEpisodeManager::update_progress($tvdb_show_id, $series_season, $series_episode, $kodi_playing_now->percentage);
        return new WP_REST_Response('Show Updated: ' . $name . ' time : ' . $kodi_playing_now->percentage . '  ' . $record_key . ' ' . $series_season . ' ' . $series_episode . ' ' . $tvdb_show_id, 200);
      }
      if ($episode && $episode->watch_status == 'watching' && $kodi_playing_now->percentage > 85) {
        AntraktorEpisodeManager::mark_as_complete($tvdb_show_id, $series_season, $series_episode);
        return new WP_REST_Response('Show Marked as complete: ' . $name . ' time : ' . $kodi_playing_now->percentage . '  ' . $record_key . ' ' . $series_season . ' ' . $series_episode . ' ' . $tvdb_show_id, 200);
      }
      if ($episode && $episode->watch_status == 'watched') {
        return new WP_REST_Response('Show already watched: ' . $name . ' time : ' . $kodi_playing_now->percentage . '  ' . $record_key . ' ' . $series_season . ' ' . $series_episode . ' ' . $tvdb_show_id, 200);
      }
    }
    return new WP_REST_Response('Show not found', 200);
  }
}
