<?php

class GetSeriesDetails {
  public static $adult;
  public static $backdrop_path;
  public static $created_by;
  public static $episode_run_time;
  public static $first_air_date;
  public static $genres;
  public static $homepage;
  public static $id;
  public static $in_production;
  public static $languages;
  public static $last_air_date;
  public static $last_episode_to_air;
  public static $name;
  public static $next_episode_to_air;
  public static $networks;
  public static $number_of_episodes;
  public static $number_of_seasons;
  public static $origin_country;
  public static $original_language;
  public static $original_name;
  public static $overview;
  public static $popularity;
  public static $poster_path;
  public static $production_companies;
  public static $production_countries;
  public static $seasons;
  public static $spoken_languages;
  public static $status;
  public static $tagline;
  public static $type;
  public static $vote_average;
  public static $vote_count;

  public function __construct($data) {
    self::$adult = $data->adult ? 'true' : 'false';
    self::$backdrop_path = $data->backdrop_path;
    self::$created_by = $data->created_by;
    self::$episode_run_time = $data->episode_run_time;
    self::$first_air_date = $data->first_air_date;
    self::$genres = $data->genres;
    self::$homepage = $data->homepage;
    self::$id = $data->id;
    self::$in_production = $data->in_production ? 'true' : 'false';
    self::$languages = $data->languages;
    self::$last_air_date = $data->last_air_date;
    self::$last_episode_to_air = $data->last_episode_to_air;
    self::$name = $data->name;
    self::$next_episode_to_air = $data->next_episode_to_air;
    self::$networks = $data->networks;
    self::$number_of_episodes = $data->number_of_episodes;
    self::$number_of_seasons = $data->number_of_seasons;
    self::$origin_country = $data->origin_country;
    self::$original_language = $data->original_language;
    self::$original_name = $data->original_name;
    self::$overview = $data->overview;
    self::$popularity = $data->popularity;
    self::$poster_path = $data->poster_path;
    self::$production_companies = $data->production_companies;
    self::$production_countries = $data->production_countries;
    self::$seasons = $data->seasons;
    self::$spoken_languages = $data->spoken_languages;
    self::$status = $data->status;
    self::$tagline = $data->tagline;
    self::$type = $data->type;
    self::$vote_average = $data->vote_average;
    self::$vote_count = $data->vote_count;
  }

  public static function init($data) {
    return new self($data);
  }
}
