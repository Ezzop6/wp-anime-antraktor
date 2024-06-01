<?php


function get_currently_playing_html() {
  $kody_response = ApiCommunicator::send(ApiCommunicator::$target_kodi, QueryKodi::$player_get_active_players);
  $kody_response = ApiDataParser::parse(QueryKodi::class, $kody_response, QueryKodi::$player_get_active_players);
  $playing = $kody_response::is_playing();
  if (!$playing) {
    $nothing_playing_html = <<<HTML
    <h3>Nothing is playing right now</h3>
    HTML;
    return  $nothing_playing_html;
  }
  $progress_bar = do_shortcode('[get_progress_bar_html timeout=1000]');
  $watched_show = ApiCommunicator::send(ApiCommunicator::$target_kodi, QueryKodi::$player_get_item);
  $watched_show = ApiDataParser::parse(QueryKodi::class, $watched_show, QueryKodi::$player_get_item);
  // HelperScripts::print_all_object_attributes($watched_show);

  $show_title = $watched_show::$movie_name;
  $title = $watched_show::$title | $watched_show::$label;

  $show_properties = ApiCommunicator::send(ApiCommunicator::$target_kodi, QueryKodi::$player_get_properties);
  $show_properties = ApiDataParser::parse(QueryKodi::class, $show_properties, QueryKodi::$player_get_properties);
  // HelperScripts::print_all_object_attributes($watched_show);

  if ($watched_show::$type == 'episode') {
    $get_series = ApiCommunicator::send(ApiCommunicator::$target_tmdb, QueryTmdb::$get_series_by_name, array('get_series_by_name' => $show_title));
    $get_series = ApiDataParser::parse(QueryTmdb::class, $get_series, QueryTmdb::$get_series_by_name);
    // HelperScripts::print_all_object_attributes($get_series);

    $details = ApiCommunicator::send(ApiCommunicator::$target_tmdb, QueryTmdb::$get_series_details_by_id, array('get_series_details_by_id' => $get_series::$id));
    $details = ApiDataParser::parse(QueryTmdb::class, $details, QueryTmdb::$get_series_details_by_id);
    // HelperScripts::print_all_object_attributes($details);

  } else {
    $get_movie = ApiCommunicator::send(ApiCommunicator::$target_tmdb, QueryTmdb::$get_movie_by_name, array('get_movie' => $show_title));
    $get_movie = ApiDataParser::parse(QueryTmdb::class, $get_movie, QueryTmdb::$get_movie_by_name);
    // HelperScripts::print_all_object_attributes($get_movie);

    $details = ApiCommunicator::send(ApiCommunicator::$target_tmdb, QueryTmdb::$get_movie_details_by_id, array('get_movie_details_by_id' => $get_movie::$id));
    $details = ApiDataParser::parse(QueryTmdb::class, $details, QueryTmdb::$get_movie_details_by_id);
    // HelperScripts::print_all_object_attributes($details);
  }


  $overview = $details::$overview ?? 'No overview available';
  $vote_average = $details::$vote_average ?? 'No rating available';
  $vote_count = $details::$vote_count ?? 'No rating available';

  $backdrop_image = ImageDownloader::get_url(ImageDownloader::$target_tmdb_thumbnail, $details::$backdrop_path, 500);
  $poster_image = ImageDownloader::get_url(ImageDownloader::$target_tmdb_thumbnail, $details::$poster_path, 500);

  return <<<HTML
  <section class="antrakt-currently-playing">
      <h3>Playing: $show_title </h3>
      <p>$title</p>
      <div>
        $progress_bar
      </div>
        <p>$overview</p>
        <p>Rating: $vote_average ($vote_count votes)</p>
      <div>
        <img src="$backdrop_image" alt="backdrop">
        <img src="$poster_image" alt="poster">
      </div>
  </section>
  HTML;
}
