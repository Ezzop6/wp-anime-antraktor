<?php
class AntraktorDeactivator {
	public static function deactivate() {
		AntraktorPageCreator::delete_all_pages();
		$antraktor_db = new AntraktorDatabase();
		$antraktor_db->delete_antrakt_movie_db();
	}
}
