<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['series_id'])) {
  $series_data = AF::get_tmdb_series_details_by_id(sanitize_text_field($_GET['series_id']));
  require_once plugin_dir_path(__FILE__) . 'parts/get_tmdb_series_details_by_id.php';
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['series_name'])) {
  $series_data = AF::get_tmdb_series_by_name(sanitize_text_field($_GET['series_name']));
  require_once plugin_dir_path(__FILE__) . 'parts/get_tmdb_series_by_name.php';
}
