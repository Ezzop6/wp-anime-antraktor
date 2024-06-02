<?php

$currently_played_kodi_data = ApiCommunicator::send(
  ApiCommunicator::$target_kodi,
  QueryKodi::$player_get_item
);

$hash = md5(json_encode($currently_played_kodi_data)) . '-' . strlen(json_encode($currently_played_kodi_data));
$created_record = AntraktorKodiManager::add_record($currently_played_kodi_data);


$currently_played_parsed_data = ApiDataParser::parse(
  QueryKodi::class,
  $currently_played_kodi_data,
  QueryKodi::$player_get_item
);

$type = $currently_played_parsed_data::$type;
$name = $currently_played_parsed_data::$movie_name;


echo $created_record ? 'Record added' : 'Record already exists';
echo '<br>';
echo $type;
echo '<br>';
echo 'Name: ' . $name;
echo '<br>';
echo 'Hash: ' . $hash;

$tmdb_details_data = AF::get_tmdb_series_details_by_id('67198', false);

helperScripts::print($tmdb_details_data);
