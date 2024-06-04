<?php
echo '<h3>Movie</h3>';
echo '<h3>Movie count: ' . $movie_data->page . '</h3>';

for ($i = 0; $i < count($movie_data->movies); $i++) {
  $movie = $movie_data->movies[$i];
  $adult = $movie->adult;
  $backdrop_path = $movie->backdrop_path;
  $genre_ids = $movie->genre_ids; // this is array
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
  $similar_movies = $movie->similar_movies; // this is array
  // <p>Similar movies: $similar_movies</p>

  $tmdb_detail_data = <<<HTML
  <h3>Tmdb Data</h3>
  <p>Adult: $adult</p>
  <p>Id: $id</p>
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
  echo ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_original, $backdrop_path, 'backdrop', $title);
  echo ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_original, $poster_path, 'poster', $title);
}
