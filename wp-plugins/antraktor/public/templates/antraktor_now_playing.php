<?php

$kody_response = ApiCommunicator::send(ApiCommunicator::$target_kodi, QueryKodi::$player_get_active_players);
$kody_response = ApiDataParser::parse(QueryKodi::class, $kody_response, QueryKodi::$player_get_active_players);

if ($kody_response::is_playing()) {
  echo '<h2>Playing</h2>';
  $watched_show = ApiCommunicator::send(ApiCommunicator::$target_kodi, QueryKodi::$player_get_item);
  $watched_show = ApiDataParser::parse(QueryKodi::class, $watched_show, QueryKodi::$player_get_item);
  $show_properties = ApiCommunicator::send(ApiCommunicator::$target_kodi, QueryKodi::$player_get_properties);
  $show_properties = ApiDataParser::parse(QueryKodi::class, $show_properties, QueryKodi::$player_get_properties);

  $progress = $show_properties::$percentage;
  $width = 100 - $progress;
?>
  <style>
    .progress {
      height: 20px;
      background-color: #f5f5f5;
      border-radius: 20px;
    }

    .progress-bar {
      background-color: #007bff;
      width: <?php echo $progress; ?>%;
      height: 20px;
      border-radius: 20px;
    }
  </style>
  <div class="progress">
    <div class="progress-bar"></div>
  </div>
<?php
  HelperScripts::print_all_object_attributes($watched_show);
  if ($watched_show::$title || $watched_show::$show_title) {

    $movie_name = $watched_show::$title ?? $watched_show::$show_title;

    $get_movie = ApiCommunicator::send(ApiCommunicator::$target_tmdb, QueryTmdb::$get_movie_by_name, array('get_movie' => $movie_name));
    $get_movie = ApiDataParser::parse(QueryTmdb::class, $get_movie, QueryTmdb::$get_movie_by_name);
  } else {
    $movie_name = 'Unknown';
  }
  echo '<h2>Movie ' . $movie_name . ' </h2>';
  if ($get_movie) {
    $backdrop_image = ImageDownloader::get_url(ImageDownloader::$target_tmdb_thumbnail, $get_movie::$backdrop_path, 500);
    $poster_image = ImageDownloader::get_url(ImageDownloader::$target_tmdb_thumbnail, $get_movie::$poster_path, 500);

    echo '<img src="' . $backdrop_image . '" alt="backdrop">';
    echo '<img src="' . $poster_image . '" alt="poster">';
    echo '<h2>Movie details</h2>';

    $get_movie_details = ApiCommunicator::send(ApiCommunicator::$target_tmdb, QueryTmdb::$get_movie_details_by_id, array('get_movie_details' => $get_movie::$id));
    $get_movie_details = ApiDataParser::parse(QueryTmdb::class, $get_movie_details, QueryTmdb::$get_movie_details_by_id);

    HelperScripts::print_all_object_attributes($get_movie_details);
  } else {
    echo '<p>Movie not found</p>';
  }
} else {
  echo '<p>Nothing is playing right now</p>';
}
