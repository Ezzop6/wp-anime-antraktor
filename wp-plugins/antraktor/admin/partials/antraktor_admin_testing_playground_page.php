
<?php


$playing  = AF::get_kodi_now_playing(0, 0);

HelperScripts::print($playing);


// $show_name = AntraktorKodiManager::get_record_key_by_name('Overlord');
// // $show_name = AntraktorKodiManager::get_record_key_by_tmdb_id('64196');

// $show_data = AntraktorKodiManager::get_record($show_name);
// $decoded_data = base64_decode($show_data->tmdb_data);
// $encoded_data = json_decode($decoded_data);

// $parsed_data = ApiDataParser::parse(
//   QueryTmdb::class,
//   $encoded_data,
//   QueryTmdb::$get_series_details_by_id
// );

// $watch_status = $show_data->watch_status;
// if ($watch_status == 'watching') {
//   $season_count = $parsed_data->number_of_seasons;
//   $tmdb_season_id = $parsed_data->id;
//   $record_added = AntraktorSeriesManager::add_record($tmdb_season_id);
//   if ($record_added) {
//     for ($season_id = 1; $season_id <= $season_count; $season_id++) {
//       AntraktorSeasonManager::add_record($tmdb_season_id, $season_id, $season_count);
//       echo 'Record added' . '<br>';
//     }
//   } else {
//     echo 'Record already exists';
//   }
// }
