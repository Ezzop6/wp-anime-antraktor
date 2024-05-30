<?php
class HelperScripts {
  public static function get_file_version($file) {
    if (file_exists($file)) {
      return filemtime($file);
    }
    throw new Exception('File not found' . $file . ' in get_file_version HelperScripts');
  }
}
