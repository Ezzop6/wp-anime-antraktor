<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['movie_id'])) {
  $movie_data = AF::get_tmdb_movie_details_by_id(sanitize_text_field($_GET['movie_id']));
  require_once plugin_dir_path(__FILE__) . 'parts/get_tmdb_movie_details_by_id.php';
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['movie_name'])) {
  $movie_data = AF::get_tmdb_movie_by_name(sanitize_text_field($_GET['movie_name']));
  require_once plugin_dir_path(__FILE__) . 'parts/get_tmdb_movie_by_name.php';
}
