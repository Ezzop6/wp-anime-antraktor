<?php
class HelperScripts {
  public static $log_file = 'antraktor_log.txt';
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

  public static function print(object | string | array | null $data) {
    echo '<div style="background-color: #f1f1f1; padding: 10px; margin: 10px;">';
    echo '<h3>Debug print type : ' . gettype($data) . '</h3>';
    match (gettype($data)) {
      'array' => self::print_array($data),
      'object' => self::print_object_attributes($data),
      'string' => self::print_json($data),
      'NULL' => '<h3>NULL</h3>',
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
  public static function print_array($array) {
    for ($i = 0; $i < count($array); $i++) {
      echo '<div style="background-color: #e1e9e9; padding: 10px; margin: 10px;">';
      echo '<h3> Element ' . $i . '</h3>';
      echo '<pre>';
      match (gettype($array[$i])) {
        'array' => self::print_array($array[$i]),
        'object' => self::print_object_attributes($array[$i]),
        'string' => self::print_json($array[$i]),
        'NULL' => '<h3>NULL</h3>',
        default => print_r($array[$i]),
      };
      echo '</pre>';
      echo '</div>';
    }
  }

  public static function print_object_attributes($object) {
    $reflectionClass = new ReflectionClass(get_class($object));
    $properties = $reflectionClass->getProperties();
    $class = get_class($object);
    echo "Attributes of " . $class . ":<br>";
    match ($class) {
      'stdClass' => self::print_stdClass($object, $properties),
      default => self::print_custom_object($object, $properties),
    };
  }

  public static function print_stdClass($object, $properties) {
    echo '<pre>';
    print_r($object);
    echo '</pre>';
  }

  public static function print_custom_object($object, $properties) {
    foreach ($properties as $property) {
      $property->setAccessible(true);

      $value = $property->getValue($property->isStatic() ? null : $object);
      if (is_array($value) || is_object($value)) {
        $value = json_encode($value);
      }
      echo $property->getName() . ": " . htmlspecialchars($value) . "<br>";
    }
    echo "<br><br>";
  }
  public static function log($data) {
    $log_file = fopen(self::$log_file, 'a');
    fwrite($log_file, $data);
    fclose($log_file);
  }
}
