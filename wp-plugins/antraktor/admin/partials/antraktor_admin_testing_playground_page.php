
<?php


$show_data = AntraktorKodiManager::get_record('fc014330280023dd36d9562a8f05b8f8-8176');
$decoded_data = base64_decode($show_data->tmdb_data);
$encoded_data = json_decode($decoded_data);

$parsed_data = ApiDataParser::parse(
  QueryTmdb::class,
  $encoded_data,
  QueryTmdb::$get_series_details_by_id
);
$tmdb_season_id = $parsed_data->id;
$watch_status = $show_data->watch_status;
$season_count = $parsed_data->number_of_seasons;
echo '<pre>';
echo '<h1>Show: ' . $parsed_data->name . 'id: ' . $tmdb_season_id . '</h1>';
if ($watch_status == 'watching') {
  $record_added = AntraktorSeriesManager::add_record($tmdb_season_id);
  $record_added = true;
  if ($record_added) {
    for ($season_id = 1; $season_id <= $season_count; $season_id++) {
      AntraktorSeasonManager::add_record($tmdb_season_id, $season_id, $season_count);
    }
  } else {
    echo 'Record already exists';
  }
}

//   foreach ($parsed_data->seasons->seasons as $season) {
//     echo "<pre>";
//     echo $season->id;
//   }
// }

// HelperScripts::print($parsed_data);
