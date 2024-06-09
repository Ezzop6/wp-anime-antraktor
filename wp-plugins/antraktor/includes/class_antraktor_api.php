<?php

class AntraktorApi {
  public static $route_name_space = 'antraktor/v1';

  public static function register_readable_endpoint($path, $callback) {
    add_action('rest_api_init', function () use ($path, $callback) {
      register_rest_route(self::$route_name_space, $path, [
        'methods' => WP_REST_Server::READABLE,
        'callback' => $callback,
        'permission_callback' => '__return_true'
      ]);
    });
  }

  public static function register_secure_readable_endpoint($path, $callback) {
    add_action('rest_api_init', function () use ($path, $callback) {
      register_rest_route(self::$route_name_space, $path, [
        'methods' => WP_REST_Server::READABLE,
        'callback' => $callback,
        'permission_callback' => [self::class, 'verify_token']
      ]);
    });
  }

  public static function verify_token(WP_REST_Request $request) {
    $token = htmlspecialchars($request->get_header('Authorization'));
    if (empty($token)) {
      return new WP_Error('empty_token', 'No token provided', ['status' => 401]);
    }
    if ($token !== AntraktorVariableManager::get_key_value('antraktor_api_token')) {
      return new WP_Error('invalid_token', 'Invalid token provided', ['status' => 403]);
    }
    return true;
  }

  public static function get_now_playing(WP_REST_Request $request) {
    $result = ApiCommunicator::send(QueryKodi::class, QueryKodi::$player_get_properties);
    $result = self::validate($result);
    if ($result instanceof WP_Error) {
      throw new Exception($result->get_error_message());
    }
    return new WP_REST_Response($result, 200);
  }
  public static function validate($data) {
    if (empty($data)) {
      return new WP_Error('empty_data', 'No data provided', ['status' => 404]);
    }
    return $data;
  }

  public static function refresh(WP_REST_Request $request) {
    require_once 'api/class_antraktor_refresh_wp.php';
    try {
      $result = AntraktorRefresh::refresh();
    } catch (Exception $e) {
      return new WP_Error('error', $e->getMessage(), ['status' => 500]);
    }
    return $result;
  }
}
