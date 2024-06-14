<?php if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['movie_id'])) {
  $movie_id = htmlspecialchars($_GET['movie_id']);
  $similar_movies = AF::get_similar_movies($movie_id);
  $movies = $similar_movies->results;
  $html = '<section class="similar-movies">';
  foreach ($movies as $movie) {
    $poster = '';
    if ($movie->poster_path && $movie->poster_path != 'null') {
      $poster = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $movie->poster_path, 'movie', $movie->title, 300);
    }
    $html .= <<<HTML
    <div class="similar-movie">
      <div class="left">
        $poster
      </div>
      <div class="right">
        <div class="movie-details">
          <div class="title">
            <h3>$movie->title</h3>
          </div>
          <p>Release date: $movie->release_date</p>
          <p>Overview: $movie->overview</p>
          <p>Popularity: $movie->popularity</p>
          <p>ID $movie->id</p>
          <a href="/antraktor/movie-info?movie_id=$movie->id">More info</a>
          <a href="/antraktor/similar-movies?movie_id=$movie->id">Similar movies</a>
        </div>
      </div>
    </div>
    HTML;
  }
  $html .= '</section>';

  echo $html;
}
