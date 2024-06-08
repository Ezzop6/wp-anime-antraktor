<?php
class AntraktRefresh {
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
      $series_season = $kodi_playing_now->season;
      $series_episode = $kodi_playing_now->episode;
      $name = $kodi_playing_now->movie_name;
      $record_key = AntraktorKodiManager::get_record_key_by_name($name);
      $show_data = AntraktorKodiManager::get_record($record_key);

      if ($show_data->watch_status == 'not_started') {
        return new WP_REST_Response('Show is not in the watching list', 200);
      }

      $tvdb_show_id = $show_data->tvdb_show_id;
      $kodi_playing_now = AF::player_get_properties();
      if ($record_key && $series_season && $series_episode && $show_data->watch_status == 'watching') {
        $record_added = AntraktorEpisodeManager::add_record($tvdb_show_id, $series_season, $series_episode);
        if ($record_added) {
          return new WP_REST_Response('Show Added: ' . $name . ' time : ' . $kodi_playing_now->percentage . '  ' . $record_key . ' ' . $series_season . ' ' . $series_episode . ' ' . $tvdb_show_id, 200);
        }
      }
      if ($show_data->watch_status == 'watching' && $kodi_playing_now->percentage < 85) {
        $record_updated = AntraktorEpisodeManager::update_progress($tvdb_show_id, $series_season, $series_episode, $kodi_playing_now->percentage);
        return new WP_REST_Response('Show Updated: ' . $name . ' time : ' . $kodi_playing_now->percentage . '  ' . $record_key . ' ' . $series_season . ' ' . $series_episode . ' ' . $tvdb_show_id . ' ' . $record_updated, 200);
      }
      if ($record_key && $series_season && $series_episode && $show_data->watch_status == 'watching' && $kodi_playing_now->percentage > 85) {
        AntraktorEpisodeManager::mark_as_complete($tvdb_show_id, $series_season, $series_episode);
        return new WP_REST_Response('Show Marked as complete: ' . $name . ' time : ' . $kodi_playing_now->percentage . '  ' . $record_key . ' ' . $series_season . ' ' . $series_episode . ' ' . $tvdb_show_id, 200);
      }
    }
  }
}
