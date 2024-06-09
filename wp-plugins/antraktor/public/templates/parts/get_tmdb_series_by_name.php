<h1>Series by name </h1>

<?php
$html = '';
foreach ($series_data->seasons as $serie) {
  $adult = $serie->adult;
  $backdrop_path = $serie->backdrop_path;
  $genre_ids = $serie->genre_ids; // this is array
  $id = $serie->id;
  $origin_country = $serie->origin_country; // this is array
  $original_language = $serie->original_language;
  $overview = $serie->overview;
  $original_name = $serie->original_name;
  $popularity = $serie->popularity;
  $poster_path = $serie->poster_path;
  $first_air_date = $serie->first_air_date;
  $first_air_date = $serie->first_air_date;
  $vote_average = $serie->vote_average;
  $vote_count = $serie->vote_count;

  $poster = '';
  $backdrop = '';
  if ($poster_path !== null && $original_name) {
    $poster = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $poster_path, 'poster', $original_name, 200);
  }
  if ($backdrop_path !== null && $original_name) {
    $backdrop = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $backdrop_path, 'backdrop', $original_name, 200);
  }
  $html .= <<<HTML
  <div class="tmdb-series">
    <div class="tmdb-images">
      $poster
      $backdrop
    </div>
    <div class="tmdb-details">
      <div class="movie-details-link">
        <a href="/antraktor/series/?series_id=$id">$original_name</a>
      </div>
      <p>Adult: $adult</p>
      <p>Id: $id</p>
      <p>Original language: $original_language</p>
      <p>Original name: $original_name</p>
      <p>Overview: $overview</p>
      <p>Popularity: $popularity</p>
      <p>First air date: $first_air_date</p>
      <p>Name: $original_name</p>
      <p>Vote average: $vote_average</p>
      <p>Vote count: $vote_count</p>
    </div>
  </div>
  HTML;
}
?>
<section class="find_series">
  <?php echo $html; ?>
</section>
