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

  public function __construct($data) {
    self::$episode = $data->result->item->episode;
    self::$fanart = $data->result->item->fanart;
    self::$file = $data->result->item->file;
    self::$label = $data->result->item->label;
    self::$season = $data->result->item->season;
    self::$show_title = $data->result->item->showtitle;
    self::$title = $data->result->item->title;
    self::$type = $data->result->item->type;
  }

  public static function init($data) {
    return new self($data);
  }
}
