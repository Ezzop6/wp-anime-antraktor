<?php

function debug_currently_played_info() {
  echo do_shortcode('[get_currently_playing_html]');

  $kody_response = ApiCommunicator::send(ApiCommunicator::$target_kodi, QueryKodi::$player_get_active_players);
  $kody_response = ApiDataParser::parse(QueryKodi::class, $kody_response, QueryKodi::$player_get_active_players);

  $watched_show = ApiCommunicator::send(ApiCommunicator::$target_kodi, QueryKodi::$player_get_item);
  HelperScripts::print_json($watched_show);

  $watched_show = ApiDataParser::parse(QueryKodi::class, $watched_show, QueryKodi::$player_get_item);
  HelperScripts::print($watched_show);

  $type = $watched_show::$type;

  if ($type == 'episode') {
    $get_series = ApiCommunicator::send(ApiCommunicator::$target_tmdb, QueryTmdb::$get_series_by_name, array('get_series_by_name' => $watched_show::$movie_name));
    HelperScripts::print_json($get_series);

    $get_series = ApiDataParser::parse(QueryTmdb::class, $get_series, QueryTmdb::$get_series_by_name);
    HelperScripts::print($get_series);

    $details = ApiCommunicator::send(ApiCommunicator::$target_tmdb, QueryTmdb::$get_series_details_by_id, array('get_series_details_by_id' => $get_series::$id));
    HelperScripts::print_json($details);

    $details = ApiDataParser::parse(QueryTmdb::class, $details, QueryTmdb::$get_series_details_by_id);
    HelperScripts::print($details);
  } else {
    $get_movie = ApiCommunicator::send(ApiCommunicator::$target_tmdb, QueryTmdb::$get_movie_by_name, array('get_movie' => $watched_show::$movie_name));
    HelperScripts::print_json($get_movie);

    $get_movie = ApiDataParser::parse(QueryTmdb::class, $get_movie, QueryTmdb::$get_movie_by_name);
    HelperScripts::print($get_movie);

    $details = ApiCommunicator::send(ApiCommunicator::$target_tmdb, QueryTmdb::$get_movie_details_by_id, array('get_movie_details_by_id' => $get_movie::$id));
    HelperScripts::print_json($details);

    $details = ApiDataParser::parse(QueryTmdb::class, $details, QueryTmdb::$get_movie_details_by_id);
    HelperScripts::print($details);
  }
}
