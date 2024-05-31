<?php

class ImageDownloader {
  public static $target_tmdb_original = 'https://image.tmdb.org/t/p/original';
  public static $target_tmdb_thumbnail = 'https://image.tmdb.org/t/p/w';

  public static function get_url($target, $path, $size = null) {
    return match ($target) {
      self::$target_tmdb_original => self::$target_tmdb_original . $path,
      self::$target_tmdb_thumbnail => self::$target_tmdb_thumbnail . $size . $path,
      default => throw new Exception('Invalid target'),
    };
  }
}
