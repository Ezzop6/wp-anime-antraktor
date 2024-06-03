<?php
class NextEpisodeToAir {
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

  public  function __construct($data) {
    self::$id = $data->id ?? null;
    self::$overview = $data->overview ?? null;
    self::$name = $data->name ?? null;
    self::$vote_average = $data->vote_average ?? null;
    self::$vote_count = $data->vote_count ?? null;
    self::$air_date = $data->air_date ?? null;
    self::$episode_number = $data->episode_number ?? null;
    self::$episode_type = $data->episode_type ?? null;
    self::$production_code = $data->production_code ?? null;
    self::$runtime = $data->runtime ?? null;
    self::$season_number = $data->season_number ?? null;
    self::$show_id = $data->show_id ?? null;
    self::$still_path = $data->still_path ?? null;
  }
  public static function init($data) {
    return new self($data);
  }
}
