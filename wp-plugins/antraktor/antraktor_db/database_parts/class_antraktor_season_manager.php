<?php

class AntraktorEpisodeManager {
  public static $table_name;
  public static $DB;

  public static function init() {
    if (!isset(self::$table_name)) {
      global $wpdb;
      self::$table_name = ANTRAKTOR_DB_PREFIX . 'episodes';
      self::$DB = $wpdb;
    }
  }
  public static function add_record(Series $data) {
    $adult = $data->adult;
    $backdrop_path  = $data->backdrop_path;
    $genre_ids  = json_encode($data->genre_ids);
    $id  = $data->id;
    $origin_country  = json_encode($data->origin_country);
    $original_language  = $data->original_language;
    $overview  = $data->overview;
    $original_name  = $data->original_name;
    $popularity   = $data->popularity;
    $poster_path  = $data->poster_path;
    $first_air_date  = $data->first_air_date;
    $name  = $data->name;
    $vote_average  = $data->vote_average;
    $vote_count  = $data->vote_count;
  }
}

AntraktorEpisodeManager::init();
