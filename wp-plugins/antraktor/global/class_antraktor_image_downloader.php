<?php

// TODO: Rename this class and move it to a better location
class ImageDownloader {
  public static $target_tmdb_original = 'https://image.tmdb.org/t/p/original';
  public static $target_tmdb_thumbnail = 'https://image.tmdb.org/t/p/w';
  public static $direct_link = null;

  public static function get_url($target, $path, $size = 500) {
    return match ($target) {
      self::$target_tmdb_original => self::$target_tmdb_original . $path,
      self::$target_tmdb_thumbnail => self::$target_tmdb_thumbnail . $size . $path,
      self::$direct_link => $path,
      default => throw new Exception('Invalid target'),
    };
  }

  public static function get_image_div($target, $path,  $class, $alt, $size = 500) {
    if (empty($path)) {
      return;
    }
    $url = self::get_url($target, $path, $size);
    $img = "<img src='$url' alt='$alt image'>";
    return <<<HTML
      <div class='$class'>
        <a href='$url'>
          $img
        </a>
      </div>
    HTML;
  }
}
