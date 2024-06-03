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
		AntraktorVariableManager::set_variable('spotify_client_id', $_ENV['SPOTIFY_CLIENT_ID']);
		AntraktorVariableManager::set_variable('spotify_client_secret', $_ENV['SPOTIFY_CLIENT_SECRET']);
		AntraktorVariableManager::set_variable('spotify_token', null);
		AntraktorVariableManager::set_variable('anilist_client_id', $_ENV['ANILIST_CLIENT_ID']);
		AntraktorVariableManager::set_variable('anilist_client_secret', $_ENV['ANILIST_CLIENT_SECRET']);
	}
}
