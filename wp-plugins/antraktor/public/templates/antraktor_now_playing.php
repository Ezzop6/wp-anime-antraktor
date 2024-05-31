<?php



$kody_response = ApiCommunicator::send(ApiCommunicator::$target_kodi, QueryKodi::$player_get_active_players);
$kody_response = ApiDataParser::parse(QueryKodi::class, $kody_response, QueryKodi::$player_get_active_players);

if ($kody_response::is_playing()) {
  $watched_show = ApiCommunicator::send(ApiCommunicator::$target_kodi, QueryKodi::$player_get_item);
  $watched_show = ApiDataParser::parse(QueryKodi::class, $watched_show, QueryKodi::$player_get_item);
  HelperScripts::print_all_object_attributes($watched_show);
} else {
  echo '<p>Nothing is playing right now</p>';
}
