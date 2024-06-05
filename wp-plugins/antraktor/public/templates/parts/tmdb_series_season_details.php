<?php

// $data = AF::get_series_episode_details_by_id(127532, 1, 1, true, true);
// HelperScripts::print($data);
$data = AF::get_series_season_details_by_id(127532, 1, true, true);
HelperScripts::print($data);
