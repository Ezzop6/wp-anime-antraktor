<?php

class AntraktorActivator {
	public static function activate() {
		$antraktor_db = new AntraktorDatabase();
		$antraktor_db->create_antrakt_movie_db();
		AntraktorPageCreator::create_all_pages();
	}
}
