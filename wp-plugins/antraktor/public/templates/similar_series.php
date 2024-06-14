<?php if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['series_id'])) {
  $series_id = htmlspecialchars($_GET['series_id']);
  $similar_series = AF::get_similar_series($series_id);
  $series = $similar_series->results;
  $html = '<section class="similar-series">';
  foreach ($series as $serie) {
    $poster = '';
    if ($serie->poster_path && $serie->poster_path != 'null') {
      $poster = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $serie->poster_path, 'series', $serie->name, 300);
    }
    $html .= <<<HTML
    <div class="similar-series">
      <div class="left">
        $poster
      </div>
      <div class="right">
        <div class="series-details">
          <div class="title">
            <h3>$serie->name</h3>
          </div>
          <p>First air date: $serie->first_air_date</p>
          <p>Overview: $serie->overview</p>
          <p>Popularity: $serie->popularity</p>
          <a href="/antraktor/series-info?series_id=$serie->id">More info</a>
          <a href="/antraktor/similar-series?series_id=$serie->id">Similar series</a>
        </div>
      </div>
    </div>
    HTML;
  }
  $html .= '</section>';
  echo $html;
}
