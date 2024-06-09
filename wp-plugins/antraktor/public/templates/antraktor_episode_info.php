<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['series_id']) && isset($_GET['season_number']) && isset($_GET['episode_number'])) {
  $series_id = htmlspecialchars($_GET['series_id']);
  $season_number = htmlspecialchars($_GET['season_number']);
  $episode_number = htmlspecialchars($_GET['episode_number']);

  $data = AF::get_series_episode_details_by_id($series_id, $season_number, $episode_number);
  $till_img = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $data->still_path, 'test', 'tmdb_poster', 500);
  $html = <<<HTML
    <section class="episode-info">
      <h1>$data->name</h1>
        <a href="/antraktor/watched-series" style="color: blue;">Back to watched series</a>
        <a href="/antraktor/season-info?series_id=$series_id&season_number=$season_number" style="color: blue;">Back to season</a>
        <p>$data->overview</p>
        <p>Season: $season_number</p>
        <p>Episode: $episode_number</p>
        <p>Rating: $data->vote_average</p>
        <p>Vote count: $data->vote_count</p>
        <p>First aired: $data->air_date</p>
      <div>
        $till_img
      </div>
      </section>
    HTML;
  echo $html;
}
