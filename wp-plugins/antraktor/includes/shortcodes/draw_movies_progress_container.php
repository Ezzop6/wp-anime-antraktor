<?php
function draw_movies_progress_container($atts = array()) {
  $id_tmdb = $atts['movie_id'];
  $movie_data = AntraktorMovieManager::get_record($id_tmdb);
  $watch_progress = $movie_data->watch_progress;
  $watch_status = $movie_data->watch_status;
  $color = match ($movie_data->watch_status ?? 'default') {
    'watching' => 'blue',
    'watched' => 'green',
    default => 'gray',
  };
  return <<<HTML
    <div class="movie_progress_container">
        <div class="progress" style=" height: $watch_progress%; opacity: $watch_progress%; background-color: $color;"></div>
        <p class="status">$watch_status</p>
    </div>
  HTML;
}
