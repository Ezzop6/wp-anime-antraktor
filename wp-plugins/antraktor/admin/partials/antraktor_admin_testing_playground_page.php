<?php


$data = AF::get_kodi_now_playing();
HelperScripts::print($data);
$result = AntraktorKodiManager::add_record($data);
