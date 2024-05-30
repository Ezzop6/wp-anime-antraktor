<?php
class HelperScripts {
  public static function get_file_version($file) {
    if (file_exists($file)) {
      return filemtime($file);
    }
    throw new Exception('File not found' . $file . ' in get_file_version HelperScripts');
  }
  public static function admin_react_wrapper(string $file_path) {
    echo '<div id="' . ANTRAKTOR_ADMIN_REACT_DIV . '"></div>';
    require_once plugin_dir_path(dirname(__FILE__)) . 'admin/' . $file_path;
  }

  public static function public_react_wrapper(string $file_path) {
    echo '<div id="' . ANTRAKTOR_PUBLIC_REACT_DIV . '"></div>';
    require_once plugin_dir_path(dirname(__FILE__)) . 'public/' . $file_path;
  }
}
