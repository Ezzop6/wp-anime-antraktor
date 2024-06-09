<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['series_id']) && isset($_GET['season_number'])) {
  $series_id = htmlspecialchars($_GET['series_id']);
  $season_number = htmlspecialchars($_GET['season_number']);
  $series_data = AF::get_series_season_details_by_id($series_id, $season_number);

  $poster_img = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $series_data->poster_path, 'test', 'tmdb_poster', 500);

  $season_html = <<<HTML
  <div class="season_info_section">
    <div class="left">
      $poster_img
    </div>
    <div class="right">
      <h3>$series_data->name</h3>
      <a href="/antraktor/watched-series">Back to series</a>
      <p>Overview $series_data->overview</p>
      <p>Rating $series_data->vote_average</p>
      <p>First aired $series_data->air_date</p>
      <p>Season $series_data->season_number</p>
    </div>
  </div>
HTML;

  $episode_html = '';
  foreach ($series_data->episodes as $episode) {
    $img = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $episode->still_path, 'test', 'tmdb_poster', 500);
    $episode_html .= <<<HTML
      <div class="episode_info_section">
        <div class="right">
          $img
        </div>
        <div class="left">
          <h3>$episode->name</h3>
          <p>Overview $episode->overview</p>
          <p>Vote average $episode->vote_average</p>
          <p>Vote count $episode->vote_count</p>
          <p>Air date $episode->air_date</p>
          <p>Episode $episode->episode_number</p>
          <p>Runtime $episode->runtime</p>
          <a href="/antraktor/episode-info?series_id=$series_id&season_number=$season_number&episode_number=$episode->episode_number">More info</a>
        </div>
      </div>
  HTML;
  }
  $html = <<<HTML
    <section class="episode_info_wrapper">
      $season_html
      $episode_html
    </section>
HTML;
  echo $html;
}
