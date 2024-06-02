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

  public static function print(object | string $data) {
    echo '<div style="background-color: #f1f1f1; padding: 10px; margin: 10px;">';
    echo '<h3>Debug print type : ' . gettype($data) . '</h3>';
    match (gettype($data)) {
      'object' => self::print_all_object_attributes($data),
      'string' => self::print_json($data),
      default => print_r($data),
    };
    echo '</div>';
  }

  public static function print_json($json) {
    echo '<br>';
    echo '<pre>';
    print_r(json_decode($json));
    echo '</pre>';
  }

  public static function print_all_object_attributes($object, $die = false) {
    $reflectionClass = new ReflectionClass(get_class($object));
    $properties = $reflectionClass->getProperties();

    echo "Attributes of " . get_class($object) . ":<br>";
    foreach ($properties as $property) {
      $property->setAccessible(true);

      $value = $property->getValue($property->isStatic() ? null : $object);
      if (is_array($value) || is_object($value)) {
        $value = json_encode($value);
      }
      echo $property->getName() . ": " . htmlspecialchars($value) . "<br>";
    }
    echo "<br><br>";
    if ($die) {
      die();
    }
  }
}
