<?php if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['movie_id'])) {
  $movie_id = htmlspecialchars($_GET['movie_id']);
  $movie = AF::get_tmdb_movie_details_by_id($movie_id);
  $html = '';
  $videos_html = '';
  $poster = '';
  $videos = AF::get_movie_videos_by_id($movie_id);
  if ($movie->poster_path && $movie->poster_path != 'null') {
    $poster = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $movie->poster_path, 'movie', $movie->title, 300);
  }

  foreach ($videos->results as $video) {
    $videos_html .= <<<HTML
      <div class="video">
        <p>Video name: $video->name</p>   
        <iframe width="560" height="315" src="https://www.youtube.com/embed/$video->key" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    HTML;
  }

  $html .= <<<HTML
  <section class="movie-info">
    <h1>$movie->title</h1>
    <a href="/antraktor/watched-movies" style="color: blue;">Back to watched movies</a>
    <p>Release date: $movie->release_date</p>
    <p>Overview: $movie->overview</p>
    <p>Popularity: $movie->popularity</p>
    <p>Homepage: <a href="$movie->homepage">Homepage</a></p>
    <p>ID $movie->id</p>
    <div>
      $poster
    </div>
    <div class="videos">
      $videos_html
    </div> 
  </section>
HTML;
  echo $html;
}
