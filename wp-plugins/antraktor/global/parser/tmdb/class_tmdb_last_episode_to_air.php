<?php
class LastEpisodeToAir {
  public static $id;
  public static $overview;
  public static $name;
  public static $vote_average;
  public static $vote_count;
  public static $air_date;
  public static $episode_number;
  public static $episode_type;
  public static $production_code;
  public static $runtime;
  public static $season_number;
  public static $show_id;
  public static $still_path;

  public function __construct($data) {
    self::$id = $data->id;
    self::$overview = $data->overview;
    self::$name = $data->name;
    self::$vote_average = $data->vote_average;
    self::$vote_count = $data->vote_count;
    self::$air_date = $data->air_date;
    self::$episode_number = $data->episode_number;
    self::$episode_type = $data->episode_type;
    self::$production_code = $data->production_code;
    self::$runtime = $data->runtime;
    self::$season_number = $data->season_number;
    self::$show_id = $data->show_id;
    self::$still_path = $data->still_path;
  }
  public static function init($data) {
    return new self($data);
  }
}
