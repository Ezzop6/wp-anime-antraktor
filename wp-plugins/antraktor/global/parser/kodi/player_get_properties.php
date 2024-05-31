<?php
class PlayerGetProperties {
  public static $percentage;
  public static $time;
  public static $totaltime;
  public function __construct($data) {
    self::$percentage = floatval($data->result->percentage);
    self::$time = self::format_time($data->result->time);
    self::$totaltime = self::format_time($data->result->totaltime);
  }
  public static function init($data) {
    return new self($data);
  }
  private static function format_time($atts) {
    return sprintf('%02d:%02d:%02d', $atts->hours, $atts->minutes, $atts->seconds);
  }
}
