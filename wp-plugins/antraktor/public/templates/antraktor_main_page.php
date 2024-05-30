<?php
echo '<div class="wrap"><h1>Currently Playing</h1>';
get_header();
try {
  $api_data_kodi = do_shortcode('[antraktor_show_api_data api_target=kodi api_query_name=' . QueryKodi::$currently_playing . ']');
  $data = ApiDataParser::parse_kodi_data($api_data_kodi, QueryKodi::$currently_playing);
  $movie_name = explode('.', $data->result->item->label)[0];
  $html = '<h1>' . $movie_name . '</h1>';
  echo $html;
  // echo $movie_name;
  // $api_tmbd_data = do_shortcode('[antraktor_show_api_data api_target=tmdb api_query_name=' . QueryTmdb::$movie . ' movie_name=' . $movie_name . ']');
  // $data = ApiDataParser::parse_tmdb_data($api_tmbd_data, QueryTmdb::$movie, $movie_name);
  // var_dump(json_decode($data));
  echo '</div>';
} catch (Exception $e) {
  echo '<p>' . $e->getMessage() . '</p>';
}

get_footer();
