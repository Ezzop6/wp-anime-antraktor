<?php
class ShortcodeLoader {
  public static $folder = 'includes/shortcodes/';
  public static function register_shortcode($tag, $callback) {
    if (shortcode_exists($tag)) {
      throw new Exception('Shortcode already exists: ' . $tag);
    }
    add_shortcode($tag, $callback);
  }

  public static function antraktor_show_api_data($atts = array()) {
    require_once plugin_dir_path(__DIR__) . self::$folder . 'antraktor_show_api_data.php';
    return antraktor_show_api_data($atts);
  }

  public static function get_progress_bar_html($atts = array()) {
    require_once plugin_dir_path(__DIR__) . self::$folder . 'get_progress_bar_html.php';
    return get_progress_bar_html($atts);
  }

  public static function get_currently_playing_html($atts = array()) {
    require_once plugin_dir_path(__DIR__) . self::$folder . 'get_currently_playing_html.php';
    return get_currently_playing_html($atts);
  }

  public static function debug_currently_played_info($atts = array()) {
    require_once plugin_dir_path(__DIR__) . self::$folder . 'debug_currently_played_info.php';
    return debug_currently_played_info($atts);
  }

  public static function draw_series_progress_container($atts = array()) {
    require_once plugin_dir_path(__DIR__) . self::$folder . 'draw_series_progress_container.php';
    return draw_series_progress_container($atts);
  }

  public static function draw_movies_progress_container($atts = array()) {
    require_once plugin_dir_path(__DIR__) . self::$folder . 'draw_movies_progress_container.php';
    return draw_movies_progress_container($atts);
  }
}
