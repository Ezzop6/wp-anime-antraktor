<?php
class AntraktorShortcodeLoader {
  public $folder = 'includes/shortcodes/';
  public function register_shortcodes() {
    add_shortcode('antraktor_show_api_data', array($this, 'antraktor_show_api_data'));
    add_shortcode('get_progress_bar_html', array($this, 'get_progress_bar_html'));
  }

  public function antraktor_show_api_data($atts = array()) {
    require_once plugin_dir_path(dirname(__FILE__)) . $this->folder . 'antraktor_show_api_data.php';
    return antraktor_show_api_data($atts);
  }
  public function get_progress_bar_html($atts = array()) {
    require_once plugin_dir_path(dirname(__FILE__)) . $this->folder . 'get_progress_bar_html.php';
    return get_progress_bar_html($atts);
  }
}
