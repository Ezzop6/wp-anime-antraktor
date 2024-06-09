<?php

class AntraktorActivator {
	public static function activate() {
		$antraktor_db = new AntraktorDatabase();
		$antraktor_db->create_antrakt_movie_db();
		AntraktorPageCreator::create_all_pages();
		AntraktorVariableManager::set_default_variable_pairs(
			[
				'antraktor_api_token' => $_ENV['ANTRAKT_API_TOKEN'] ?? wp_generate_password(32, true, true),
				'kodi_user' => $_ENV['ANTRAKT_KODI_USER'],
				'kodi_pass' => $_ENV['ANTRAKT_KODI_PASS'],
				'kodi_port' => $_ENV['ANTRAKT_KODI_PORT'],
				'kodi_host' => $_ENV['ANTRAKT_KODI_HOST'],
				'tmdb_access_token' => $_ENV['ANTRAKT_TMDB_API_KEY'],
				'tmdb_total_requests' => 0,
				'spotify_client_id' => $_ENV['SPOTIFY_CLIENT_ID'],
				'spotify_client_secret' => $_ENV['SPOTIFY_CLIENT_SECRET'],
				'spotify_token' => null,
				'anilist_client_id' => $_ENV['ANILIST_CLIENT_ID'],
				'anilist_client_secret' => $_ENV['ANILIST_CLIENT_SECRET'],
			]
		);
	}
}
