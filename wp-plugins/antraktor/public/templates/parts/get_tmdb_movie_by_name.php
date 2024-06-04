<?php
echo '<h3>Movie</h3>';
echo '<h3>page count: ' . $movie_data->page . '</h3>';

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


  $tmdb_detail_data = <<<HTML
  <h3>Tmdb Data</h3>
  <p>Adult: $adult</p>
  <p>Id: $id</p>
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
  HTML;
  echo $tmdb_detail_data;
  echo ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $poster_path, 'poster', $title, 300);
  echo ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $backdrop_path, 'backdrop', $title, 300);
}
