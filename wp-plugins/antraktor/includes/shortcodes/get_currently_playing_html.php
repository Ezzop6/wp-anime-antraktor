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
  HelperScripts::print($watched_show);
  $watched_show = ApiDataParser::parse(QueryKodi::class, $watched_show, QueryKodi::$player_get_item);
  HelperScripts::print($watched_show);
  $show_title = $watched_show::$movie_name;
  $title = $watched_show::$title | $watched_show::$label;

  $show_properties = ApiCommunicator::send(ApiCommunicator::$target_kodi, QueryKodi::$player_get_properties);
  $show_properties = ApiDataParser::parse(QueryKodi::class, $show_properties, QueryKodi::$player_get_properties);

  if ($watched_show::$type == 'episode') {
    $get_watched = ApiCommunicator::send(ApiCommunicator::$target_tmdb, QueryTmdb::$get_series_by_name, array('get_series_by_name' => $show_title));
    $get_watched = ApiDataParser::parse(QueryTmdb::class, $get_watched, QueryTmdb::$get_series_by_name);

    $details = ApiCommunicator::send(ApiCommunicator::$target_tmdb, QueryTmdb::$get_series_details_by_id, array('get_series_details_by_id' => $get_watched::$id));
    $details = ApiDataParser::parse(QueryTmdb::class, $details, QueryTmdb::$get_series_details_by_id);
  } else {
    $get_watched = ApiCommunicator::send(ApiCommunicator::$target_tmdb, QueryTmdb::$get_movie_by_name, array('get_movie' => $show_title));
    $get_watched = ApiDataParser::parse(QueryTmdb::class, $get_watched, QueryTmdb::$get_movie_by_name);

    $details = ApiCommunicator::send(ApiCommunicator::$target_tmdb, QueryTmdb::$get_movie_details_by_id, array('get_movie_details_by_id' => $get_watched::$id));
    $details = ApiDataParser::parse(QueryTmdb::class, $details, QueryTmdb::$get_movie_details_by_id);
  }


  $overview = $details::$overview ?? 'No overview available';
  $vote_average = $details::$vote_average ?? 'No rating available';
  $vote_count = $details::$vote_count ?? 'No rating available';

  $backdrop_image = ImageDownloader::get_url(ImageDownloader::$target_tmdb_thumbnail, $details::$backdrop_path, 500);
  $poster_image = ImageDownloader::get_url(ImageDownloader::$target_tmdb_thumbnail, $details::$poster_path, 500);

  $full_backdrop_image = ImageDownloader::get_url(ImageDownloader::$target_tmdb_original, $get_watched::$backdrop_path);
  $full_poster_image = ImageDownloader::get_url(ImageDownloader::$target_tmdb_original, $get_watched::$poster_path);

  $no_info = 'No info available';
  $homepage = $details::$homepage ?? '#';
  $number_of_episodes = $details::$number_of_episodes ?? $no_info;
  $number_of_seasons = $details::$number_of_seasons ?? $no_info;
  $in_production = $details::$in_production ?? $no_info;
  $next_episode_to_air = $details::$next_episode_to_air ?? $no_info;
  $seasons = $details::$seasons ?? $no_info;
  $status = $details::$status ?? $no_info;

  HelperScripts::print($next_episode_to_air);
  if (gettype($seasons) === 'object') {
    $seasons_html = '';
    foreach ($seasons::$seasons as $season) {
      $poster_path = ImageDownloader::get_url(ImageDownloader::$target_tmdb_thumbnail, $season->poster_path, 300);
      $air_date = $season->air_date ?? $no_info;
      $episode_count = $season->episode_count ?? $no_info;
      $name = $season->name ?? $no_info;
      $overview = $season->overview ?? $no_info;
      $season_number = $season->season_number ?? $no_info;
      $vote_average = $season->vote_average ?? $no_info;
      $seasons_html .= <<<HTML
      <div>
        <h4>Season $season_number</h4>
        <p>$name</p>
        <p>Air date: $air_date</p>
        <p>Number of episodes: $episode_count</p>
        <p>Rating: $vote_average</p>
        <p>$overview</p>
        <a href="$poster_path">
          <img src="$poster_path" alt="poster">
        </a>
      </div>

      HTML;
    }
  }
  return <<<HTML
  <section class="antrakt-currently-playing">
      <h3>Playing: $show_title </h3>
      <p>$title</p>
      <div>
        $progress_bar
      </div>
        <p>Number of episodes: $number_of_episodes</p>
        <p>Number of seasons: $number_of_seasons</p>
        <p>In production: $in_production</p>
        $seasons_html
        <p>Status: $status</p>
        <a href="$homepage">homepage</a>
        <p>$overview</p>
        <p>Rating: $vote_average ($vote_count votes)</p>
        <div>
        <a href="$full_backdrop_image">
          <img src="$backdrop_image" alt="backdrop">
        </a>
        <a href="$full_poster_image">
          <img src="$poster_image" alt="poster">
        </a>
      </div>
  </section>
  HTML;
}
