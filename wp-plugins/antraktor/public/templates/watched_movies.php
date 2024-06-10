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

  $poster = '';
  if ($movie_data->poster_path && $movie_data->poster_path != 'null') {
    $poster = ImageDownloader::get_image_div(ImageDownloader::$target_tmdb_thumbnail, $movie_data->poster_path, 'movie', $movie_data->title, 300);
  }
  $progress_bar = do_shortcode("[draw_movies_progress_container movie_id='$movie_data->id']");

  $html .= <<<HTML
  <div class="watched_movie">

    <div class="left">
        $poster
    </div>

    <div class="right">
    
      <div class="movie_details">
        <div class="title">
          <h3>$movie_data->title</h3>
          $progress_bar
        </div>
        <p>Release date: $movie_data->release_date</p>
        <p>Overview: $movie_data->overview</p>
        <p>Popularity: $movie_data->popularity</p>
        <p>Homepage: <a href="$movie_data->homepage">Homepage</a></p>
      </div>
      
      <div class="similar_movies">
        
      </div>
      
    </div>
  </div>
HTML;
}
?>
<section class="watched_movies">
  <?php echo $html; ?>
</section>
