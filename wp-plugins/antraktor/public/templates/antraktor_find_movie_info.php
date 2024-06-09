<h3>Find Movie | series</h3>

<section class="find_movie_info">
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
</section>

<?php
if (isset($_POST['movie_name']) && !empty($_POST['movie_name'])) {
  $movie_name = sanitize_text_field($_POST['movie_name']);

  if (is_numeric($movie_name)) {
    $movie_data = AF::get_tmdb_movie_details_by_id($movie_name);
    require_once 'parts/get_tmdb_movie_details_by_id.php';
  } else {
    $movie_data = AF::get_tmdb_movie_by_name($movie_name);
    require_once 'parts/get_tmdb_movie_by_name.php';
  }
} else if (isset($_POST['series_name']) && !empty($_POST['series_name'])) {
  $series_name = sanitize_text_field($_POST['series_name']);

  if (is_numeric($series_name)) {
    $series_data = AF::get_tmdb_series_details_by_id($series_name);
    require_once 'parts/get_tmdb_series_details_by_id.php';
  } else {
    $series_data = AF::get_tmdb_series_by_name($series_name);
    require_once 'parts/get_tmdb_series_by_name.php';
  }
}
