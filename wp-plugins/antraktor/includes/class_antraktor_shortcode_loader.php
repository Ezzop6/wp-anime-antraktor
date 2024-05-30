<?php
class AntraktorShortcodeLoader {
  public $folder = 'includes/shortcodes/';
  public function register_shortcodes() {
    add_shortcode('antraktor_show_api_data', array($this, 'antraktor_show_api_data'));
  }

  public function antraktor_show_api_data($atts = array()) {
    require_once plugin_dir_path(dirname(__FILE__)) . $this->folder . 'antraktor_show_api_data.php';
    return antraktor_show_api_data($atts);
  }
}
