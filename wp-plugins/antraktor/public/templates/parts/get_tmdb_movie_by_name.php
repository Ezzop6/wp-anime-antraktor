<?php
echo "<section class='tmdb-movies-section'>";
for ($i = 0; $i < count($movie_data->movies); $i++) {
  $movie = $movie_data->movies[$i];
  $adult = $movie->adult;
  $backdrop_path = $movie->backdrop_path;
  $id = $movie->id;
  $original_language = $movie->original_language;
  $original_title = $movie->original_title;
  $overview = $movie->overview;
  $popularity = $movie->popularity;
  $poster_path = $movie->poster_path;
  $release_date = $movie->release_date;
  $title = $movie->title;
  $video = $movie->video;
  $vote_average = $movie->vote_average;
  $vote_count = $movie->vote_count;
  $genre_ids = '';
  foreach ($movie->genre_ids as $genre_id) {
    $genre_ids .= $genre_id . ' ';
  };
  $img_poster = '';
  $img_backdrop = '';
  if ($poster_path !== null && $title) {
    $img_poster = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $poster_path, 'poster', $title, 200);
  }
  if ($backdrop_path !== null && $title) {
    $img_backdrop = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $backdrop_path, 'backdrop', $title, 200);
  }

  $overview = substr($overview, 0, 100) . '<a href="/antraktor/movie/?movie_id=' . $id . '"> ...</a>';
  $tmdb_detail_data = <<<HTML
  <section class="tmdb-movie">
    <div class="tmdb-images">
      $img_poster
      $img_backdrop
    </div>
    <div class="tmdb-details">
      <div class="movie-details-link">
        <a href="/antraktor/movie/?movie_id=$id">$title</a>
      </div>
      <p>Adult: $adult</p>
      <p>ID: $id</p>
      <p>Genre ids: $genre_ids</p>
      <p>Original language: $original_language</p>
      <p>Original title: $original_title</p>
      <p>Overview: $overview</p>
      <p>Popularity: $popularity</p>
      <p>Release date: $release_date</p>
      <p>Title: $title</p>
      <p>Video: $video</p>
      <p>Vote average: $vote_average</p>
      <p>Vote count: $vote_count</p>
    </div>
  </section>
  HTML;
  echo $tmdb_detail_data;
}
echo "</section>";
