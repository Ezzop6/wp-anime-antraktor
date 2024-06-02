<?php

class AntraktorActivator {
	public static function activate() {
		$antraktor_db = new AntraktorDatabase();
		$antraktor_db->create_antrakt_movie_db();
		AntraktorPageCreator::create_all_pages();
		AntraktorVariableManager::set_variable('kodi_user', $_ENV['ANTRAKT_KODI_USER']);
		AntraktorVariableManager::set_variable('kodi_pass', $_ENV['ANTRAKT_KODI_PASS']);
		AntraktorVariableManager::set_variable('kodi_port', $_ENV['ANTRAKT_KODI_PORT']);
		AntraktorVariableManager::set_variable('kodi_host', $_ENV['ANTRAKT_KODI_HOST']);
		AntraktorVariableManager::set_variable('tmdb_access_token', $_ENV['ANTRAKT_TMBD_API_KEY']);
	}
}
