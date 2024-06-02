<?php


function get_currently_playing_html() {

  $playing = Af::get_kodi_status();
  if (!$playing) {
    $nothing_playing_html = <<<HTML
    <h3>Kodi is stopped</h3>
    HTML;
    return  $nothing_playing_html;
  }

  $now_playing = Af::get_kodi_now_playing();
  if (!$now_playing) {
    $nothing_playing_html = <<<HTML
    <h3>Nothing is playing right now</h3>
    HTML;
    return  $nothing_playing_html;
  }

  echo do_shortcode('[get_progress_bar_html timeout=1000]');
  // kodi data
  $show_type = $now_playing::$type;
  $season = $now_playing::$season;
  $episode = $now_playing::$episode;
  $plot = $now_playing::$plot;
  $show_title = $now_playing::$originaltitle ??  $now_playing::$sorttitle;
  $rating = $now_playing::$rating;
  $show_name = $now_playing::$movie_name;
  echo '<h3>Kodi Data</h3>';
  echo '<h3>Currently playing</h3>';
  echo '<h3>Show type : ' . $show_type . '</h3>';
  echo '<h3>Playing: ' . $show_name . '</h3>';
  echo '<p>' . $show_name . '</p>';
  echo '<p>' . $show_title . '</p>';
  echo '<p>' . $plot . '</p>';
  echo '<p>' . $rating . '</p>';
  echo '<p>S' . $season  . 'E' . $episode . '</p>';

  // Images
  $art_banner = $now_playing::$art_banner;
  $art_clearlogo  = $now_playing::$art_clearlogo;
  $art_fanart  = $now_playing::$art_fanart;
  $art_poster  = $now_playing::$art_poster;
  $art_thumb = $now_playing::$art_thumb;

  $img_show = false;
  if ($img_show) {

    echo '<h3>Images</h3>';
    echo ImageDownloader::get_image_div(ImageDownloader::$direct_link, $art_banner, 'banner', $show_name);
    echo ImageDownloader::get_image_div(ImageDownloader::$direct_link, $art_clearlogo, 'clearlogo', $show_name);
    echo ImageDownloader::get_image_div(ImageDownloader::$direct_link, $art_fanart, 'fanart', $show_name);
    echo ImageDownloader::get_image_div(ImageDownloader::$direct_link, $art_poster, 'poster', $show_name);
    echo ImageDownloader::get_image_div(ImageDownloader::$direct_link, $art_thumb, 'thumb', $show_name);
  }

  $tmdb_data = match ($show_type) {
    'movie' => Af::get_tmdb_movie_by_name($show_name),
    'episode' => Af::get_tmdb_series_by_name($show_name),
    default => null,
  };

  $pages = $tmdb_data::$pages;
  $adult = $tmdb_data::$adult;
  $backdrop_path = $tmdb_data::$backdrop_path;
  $genre_ids = $tmdb_data::$genre_ids;
  $id = $tmdb_data::$id;
  $origin_country = $tmdb_data::$origin_country;
  $original_language = $tmdb_data::$original_language;
  $overview = $tmdb_data::$overview;
  $popularity = $tmdb_data::$popularity;
  $original_name = $tmdb_data::$original_name;
  $poster_path = $tmdb_data::$poster_path;
  $first_air_date = $tmdb_data::$first_air_date;
  $vote_average = $tmdb_data::$vote_average;
  $vote_count = $tmdb_data::$vote_count;

  $img_show = false;
  if ($img_show) {
    echo '<h3>Images</h3>';
    echo ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_original, $backdrop_path, 'backdrop', $show_name);
    echo ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_original, $poster_path, 'poster', $show_name);
  }

  $html = <<<HTML
  <h3>Tmdb Data</h3>
  <h3>Currently playing</h3>
  <p>Pages: $pages</p>
  <p>Playing: $show_name</p>
  <p>Season: $season</p>
  <p>Episode: $episode</p>
  <p>Plot: $plot</p>
  <p>Rating: $rating</p>
  <p>Adult: $adult</p>
  <p>Genre ids: $genre_ids</p>
  <p>Id: $id</p>
  <p>Origin country: $origin_country</p>
  <p>Original language: $original_language</p>
  <p>Overview: $overview</p>
  <p>Popularity: $popularity</p>
  <p>Original name: $original_name</p>
  <p>First air date: $first_air_date</p>
  <p>Vote average: $vote_average</p>
  <p>Vote count: $vote_count</p>
  HTML;
  echo $html;
  $tmdb_details_data = match ($show_type) {
    'movie' => Af::get_tmdb_movie_details_by_id($id),
    'episode' => Af::get_tmdb_series_details_by_id($id),
    default => null,
  };

  $html = <<<HTML
  <h3>Tmdb Details Data</h3>
  <h3>Currently playing</h3>
  <p>Playing: $show_name</p>
  HTML;
  echo $html;
  // HelperScripts::print($tmdb_details_data, false);
  // wp_die();
  $adult = $tmdb_details_data::$adult;
  $backdrop_path =  $tmdb_details_data::$backdrop_path;
  $created_by = $tmdb_details_data::$created_by;
  $episode_run_time = $tmdb_details_data::$episode_run_time;
  $first_air_date = $tmdb_details_data::$first_air_date;
  $genres = $tmdb_details_data::$genres;
  $homepage = $tmdb_details_data::$homepage;
  $id = $tmdb_details_data::$id;
  $in_production = $tmdb_details_data::$in_production;
  $languages = $tmdb_details_data::$languages;
  $last_air_date = $tmdb_details_data::$last_air_date;
  $last_episode_to_air = $tmdb_details_data::$last_episode_to_air;
  $name = $tmdb_details_data::$name;
  $next_episode_to_air = $tmdb_details_data::$next_episode_to_air;
  $networks = $tmdb_details_data::$networks;
  $number_of_episodes = $tmdb_details_data::$number_of_episodes;
  $number_of_seasons = $tmdb_details_data::$number_of_seasons;
  $origin_country = $tmdb_details_data::$origin_country;
  $original_language = $tmdb_details_data::$original_language;
  $original_name = $tmdb_details_data::$original_name;
  $overview = $tmdb_details_data::$overview;
  $popularity = $tmdb_details_data::$popularity;
  $poster_path = $tmdb_details_data::$poster_path;
  $production_companies = $tmdb_details_data::$production_companies;
  $production_countries = $tmdb_details_data::$production_countries;
  $seasons = $tmdb_details_data::$seasons;
  $spoken_languages = $tmdb_details_data::$spoken_languages;
  $status = $tmdb_details_data::$status;
  $tagline = $tmdb_details_data::$tagline;
  $type = $tmdb_details_data::$type;
  $vote_average = $tmdb_details_data::$vote_average;
  $vote_count = $tmdb_details_data::$vote_count;

  $img_show = false;
  if ($img_show) {
    echo '<h3>Images</h3>';
    echo ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_original, $backdrop_path, 'backdrop', $show_name);
    echo ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_original, $poster_path, 'poster', $show_name);
  }

  // <p>Last episode to air: $last_episode_to_air</p> this is object
  // <p>Next episode to air: $next_episode_to_air</p> this is object
  //  <p>Seasons: $seasons</p> this is object
  $html = <<<HTML
  <h3>Tmdb Details Data</h3>
  <h3>Currently playing</h3>
  <p>Adult: $adult</p>
  <p>Backdrop path: $backdrop_path</p>
  <p>Created by: $created_by</p>
  <p>Episode run time: $episode_run_time</p>
  <p>First air date: $first_air_date</p>
  <p>Genres: $genres</p>
  <p>Homepage: $homepage</p>
  <p>Id: $id</p>
  <p>In production: $in_production</p>
  <p>Languages: $languages</p>
  <p>Last air date: $last_air_date</p>
  <p>Name: $name</p>
  <p>Networks: $networks</p>
  <p>Number of episodes: $number_of_episodes</p>
  <p>Number of seasons: $number_of_seasons</p>
  <p>Origin country: $origin_country</p>
  <p>Original language: $original_language</p>
  <p>Original name: $original_name</p>
  <p>Overview: $overview</p>
  <p>Popularity: $popularity</p>
  <p>Poster path: $poster_path</p>
  <p>Production companies: $production_companies</p>
  <p>Production countries: $production_countries</p>
  <p>Spoken languages: $spoken_languages</p>
  <p>Status: $status</p>
  <p>Tagline: $tagline</p>
  <p>Type: $type</p>
  <p>Vote average: $vote_average</p>
  <p>Vote count: $vote_count</p>
  HTML;
  echo $html;
}
