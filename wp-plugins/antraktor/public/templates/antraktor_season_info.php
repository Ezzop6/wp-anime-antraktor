<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['series_id']) && isset($_GET['season_number'])) {
  $series_id = htmlspecialchars($_GET['series_id']);
  $season_number = htmlspecialchars($_GET['season_number']);
  $series_data = AF::get_series_season_details_by_id($series_id, $season_number);

  $poster_img = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $series_data->poster_path, 'test', 'tmdb_poster', 500);
  $episode_html = '';
  foreach ($series_data->episodes as $episode) {
    $img = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $episode->still_path, 'test', 'tmdb_poster', 500);
    $episode_html .= <<<HTML
      <div class="episode">
        <h3>$episode->name</h3>
        <p>Overview $episode->overview</p>
        <p>Vote average $episode->vote_average</p>
        <p>Vote count $episode->vote_count</p>
        <p>Air date $episode->air_date</p>
        <p>Episode $episode->episode_number</p>
        <p>Runtime $episode->runtime</p>
        $img
        <a href="/antraktor/episode-info?series_id=$series_id&season_number=$season_number&episode_number=$episode->episode_number">More info</a>
      </div>
  HTML;
  }
  $html = <<<HTML
    <section class="episode-info">
      <h1>$series_data->name</h1>
      <a href="/antraktor/watched-series" style="color: blue;">Back to watched series</a>
      <p>Overview $series_data->overview</p>
      <p>Season: $season_number</p>
      <p>Rating: $series_data->vote_average</p>
      <p>First aired: $series_data->air_date</p>
      $poster_img
      $episode_html
    </section>
HTML;
  echo $html;
}
