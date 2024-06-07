<?php

// TODO: Rename this class and move it to a better location
class ImageDownloader {
  public static $target_tmdb_original = 'https://image.tmdb.org/t/p/original';
  public static $target_tmdb_thumbnail = 'https://image.tmdb.org/t/p/w';
  public static $direct_link = null;

  public static function get_url(string $target, string $path, int $size = 200) {
    return match ($target) {
      self::$target_tmdb_original => self::$target_tmdb_original . $path,
      self::$target_tmdb_thumbnail => self::$target_tmdb_thumbnail . $size . $path,
      self::$direct_link => $path,
      default => throw new Exception('Invalid target'),
    };
  }

  public static function get_image_div(string $target, null | string $path, string  $class, string $alt, int $size = 500) {
    if (!$path) {
      return;
    }
    if ($target === self::$target_tmdb_thumbnail) {
      $class .= ' thumbnail';
      $url = self::get_url(self::$target_tmdb_original, $path, $size);
    } else {
      $url = self::get_url($target, $path);
    }
    $img = "<img src=" . self::get_url($target, $path, $size) . " alt='$alt'>";
    return <<<HTML
      <div class='$class' style="line-height: 0;">
        <a href='$url'>
          $img
        </a>
      </div>
    HTML;
  }
}
