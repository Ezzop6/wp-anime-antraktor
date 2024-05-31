<?php
class IssCurrentLocation {
  public static $timestamp;
  public static $message;
  public static $latitude;
  public static $longitude;
  public static $status;

  public function __construct($data) {
    self::$timestamp = $data->timestamp;
    self::$message = $data->message;
    self::$latitude = $data->iss_position->latitude;
    self::$longitude = $data->iss_position->longitude;
    self::$status = self::current_status();
  }
  public static function init($data) {
    return new self($data);
  }

  public static function current_status() {
    return 'ISS Current Location: ' . self::$message . ' at ' . self::$timestamp . ' (latitude: ' . self::$latitude . ', longitude: ' . self::$longitude . ')' . PHP_EOL;
  }
}
