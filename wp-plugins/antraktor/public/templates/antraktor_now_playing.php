<?php

try {
  $querry = QueryTmdb::$get_movie_details;
  $data = do_shortcode('[antraktor_show_api_data api_target=tmdb api_query_name=' . $querry . ' ' . $querry . '=603]');

  $movie = ApiDataParser::parse(QueryTmdb::class, $data, $querry);
} catch (Exception $e) {
  echo '<p>' . $e->getMessage() . '</p>';
}
