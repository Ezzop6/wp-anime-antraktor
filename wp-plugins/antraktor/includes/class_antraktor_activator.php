<?php

class AntraktorActivator {
	public static function activate() {
		$antraktor_db = new AntraktorDatabase();
		$antraktor_db->create_antrakt_movie_db();
		AntraktorPageCreator::create_all_pages();
		AntraktorVariableManager::set_variable('kodi_user', $_ENV['KODI_USER']);
		AntraktorVariableManager::set_variable('kodi_pass', $_ENV['KODI_PASS']);
		AntraktorVariableManager::set_variable('kodi_port', $_ENV['KODI_PORT']);
		AntraktorVariableManager::set_variable('kodi_host', $_ENV['KODI_HOST']);
	}
}
