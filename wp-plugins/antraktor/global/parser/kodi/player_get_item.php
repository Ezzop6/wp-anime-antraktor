<?php
class PlayerGetItem {
  public static $episode;
  public static $fanart;
  public static $file;
  public static $label;
  public static $season;
  public static $show_title;
  public static $title;
  public static $type;
  public static $movie_name;

  public function __construct($data) {
    self::$episode = $data->result->item->episode;
    self::$fanart = $data->result->item->fanart;
    self::$file = $data->result->item->file;
    self::$label = $data->result->item->label;
    self::$season = $data->result->item->season;
    self::$show_title = $data->result->item->showtitle;
    self::$title = $data->result->item->title;
    self::$type = $data->result->item->type;
    self::$movie_name = self::get_movie_name();
  }

  public static function init($data) {
    return new self($data);
  }
  public static function get_movie_name() {
    if (self::$show_title != null) {
      return self::$show_title;
    }
    if (self::$title != null) {
      return self::$title;
    }
    if (self::$label != null) {
      return self::$label;
    }
    return 'Unknown';
  }
}
