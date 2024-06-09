<?php
$watched_movies = AntraktorKodiManager::get_all_valid_with_status('movie');
$html = '';
foreach ($watched_movies as $object) {
  if (!$object->tmdb_data) {
    continue;
  }
  // var_dump($object->record_key);
  $movie_data = AntraktorKodiManager::get_movie_details($object->record_key);
  $belongs_to_collection = $movie_data->belongs_to_collection;  // array
  $original_title = $movie_data->original_title;
  $budget = $movie_data->budget;
  $release_date = $movie_data->release_date;
  $title = $movie_data->title;
  $homepage = $movie_data->homepage;
  $poster = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $movie_data->poster_path, 'movie', $movie_data->title, 300);

  $similar_movies = AF::get_similar_movies($movie_data->id);
  $similar_movies_html = '';
  foreach ($similar_movies->results as $similar_movie) {
    $title = $similar_movie->title;
    // $poster_path = $similar_movie->poster_path;
    // if ($poster_path) {
    //   $poster = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $poster_path, 'movie', $title, 200);
    // }
    $similar_movies_html .= <<<HTML
      <div class="similar_movie">
        <h6>$title</h6>
      </div>
    HTML;
  }
  $html .= <<<HTML
  <div class="watched_movie">

    <div class="left">
        $poster
    </div>

    <div class="right">
    
      <div class="movie_details">
        <h3>$movie_data->title</h3>
        <p>Release date: $movie_data->release_date</p>
        <p>Overview: $movie_data->overview</p>
        <p>Popularity: $movie_data->popularity</p>
        <p>Homepage: <a href="$movie_data->homepage">Homepage</a></p>
      </div>
      
      <div class="similar_movies">
        $similar_movies_html
      </div>
      
    </div>
  </div>
HTML;
}
?>
<section class="watched_movies">
  <?php echo $html; ?>
</section>
