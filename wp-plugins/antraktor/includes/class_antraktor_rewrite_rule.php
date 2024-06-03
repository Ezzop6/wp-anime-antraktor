<?php
class AntraktorRewriteRule {
  public static $registered_paths = [];
  public static $registered_paths_react_div = [];

  public static function add_rewrite_rules() {
    add_action('init', function () {
      add_rewrite_rule('antraktor/([a-z0-9-]+)[/]?$', 'index.php?antraktor=$matches[1]', 'top');
    });

    add_filter('query_vars', function ($query_vars) {
      $query_vars[] = 'antraktor';
      return $query_vars;
    });

    add_action('template_redirect', function ($template) {
      if (get_query_var('antraktor') == false || get_query_var('antraktor') == '') {
        return $template;
      }
      $path = get_query_var('antraktor');
      if (isset(self::$registered_paths[$path])) {
        status_header(200);
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/templates/antraktor_header.php';
        match (self::$registered_paths_react_div[$path]) {
          true => HelperScripts::public_react_wrapper(self::$registered_paths[$path]),
          false => require_once plugin_dir_path(dirname(__FILE__)) . 'public/' . self::$registered_paths[$path],
        };
        require_once plugin_dir_path(dirname(__FILE__)) . 'public/templates/antraktor_footer.php';
        exit;
      }
    });
  }

  public static function add_new_redirection($url_path, $template, $react_wrapper = false) {
    self::$registered_paths[$url_path] = $template;
    self::$registered_paths_react_div[$url_path] = $react_wrapper;
  }
}
