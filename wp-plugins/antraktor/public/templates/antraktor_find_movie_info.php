<h3>Find Movie | series</h3>

<div class="series-movies-search-form">
  <form method="post">
    <label for="movie_name">Movie Name:</label>
    <input type="text" id="movie_name" name="movie_name" required>
    <input type="submit" value="Submit">
  </form>
  <form method="post">
    <label for="series_name">Series Name:</label>
    <input type="text" id="series_name" name="series_name" required>
    <input type="submit" value="Submit">
  </form>
</div>

<?php

use GuzzleHttp\Psr7\Query;

if (isset($_POST['movie_name']) && !empty($_POST['movie_name'])) {
  $movie_name = htmlspecialchars($_POST['movie_name']);
  $get_movie = ApiCommunicator::send(QueryTmdb::class, QueryTmdb::$get_movie_by_name, array('get_movie_by_name' => $movie_name));
  $get_movie = ApiDataParser::parse(QueryTmdb::class, $get_movie, QueryTmdb::$get_movie_by_name);

  $overview = $get_movie::$overview ?? 'No overview available';
  $vote_average = $get_movie::$vote_average ?? 'No rating available';
  $vote_count = $get_movie::$vote_count ?? 'No rating available';

  $backdrop_image = ImageDownloader::get_url(ImageDownloader::$target_tmdb_thumbnail, $get_movie::$backdrop_path, 500);
  $poster_image = ImageDownloader::get_url(ImageDownloader::$target_tmdb_thumbnail, $get_movie::$poster_path, 500);

  $full_backdrop_image = ImageDownloader::get_url(ImageDownloader::$target_tmdb_original, $get_movie::$backdrop_path);
  $full_poster_image = ImageDownloader::get_url(ImageDownloader::$target_tmdb_original, $get_movie::$poster_path);

  echo <<<HTML
  <section class="antrakt-find-movie">
      <h3>Movie: $movie_name </h3>
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

if (isset($_POST['series_name']) && !empty($_POST['series_name'])) {
  $series_name = htmlspecialchars($_POST['series_name']);
  $get_series = ApiCommunicator::send(QueryTmdb::class, QueryTmdb::$get_series_by_name, array('get_series_by_name' => $series_name));
  $get_series = ApiDataParser::parse(QueryTmdb::class, $get_series, QueryTmdb::$get_series_by_name);
  // HelperScripts::print_all_object_attributes($get_series);

  $overview = $get_series::$overview ?? 'No overview available';
  $vote_average = $get_series::$vote_average ?? 'No rating available';
  $vote_count = $get_series::$vote_count ?? 'No rating available';

  $backdrop_image = ImageDownloader::get_url(ImageDownloader::$target_tmdb_thumbnail, $get_series::$backdrop_path, 500);
  $poster_image = ImageDownloader::get_url(ImageDownloader::$target_tmdb_thumbnail, $get_series::$poster_path, 500);

  $full_backdrop_image = ImageDownloader::get_url(ImageDownloader::$target_tmdb_original, $get_series::$backdrop_path);
  $full_poster_image = ImageDownloader::get_url(ImageDownloader::$target_tmdb_original, $get_series::$poster_path);
  // HelperScripts::print_all_object_attributes($details);

  echo <<<HTML
  <section class="antrakt-find-series">
      <h3>Series: $series_name </h3>
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
