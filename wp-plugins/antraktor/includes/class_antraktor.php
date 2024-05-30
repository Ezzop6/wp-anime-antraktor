<?php

class Antraktor {
	protected $version;
	protected $plugin_name;
	protected $loader;
	public function __construct() {
		if (defined('ANTRAKTOR_VERSION')) {
			$this->version = ANTRAKTOR_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'antraktor';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->define_shortcode_hooks();
	}
	public static function admin_react_wrapper(string $file_path) {
		echo '<div id="' . ANTRAKTOR_ADMIN_REACT_DIV . '"></div>';
		include_once plugin_dir_path(dirname(__FILE__)) . 'admin/' . $file_path;
	}

	public static function public_react_wrapper(string $file_path) {
		echo '<div id="' . ANTRAKTOR_PUBLIC_REACT_DIV . '"></div>';
		include_once plugin_dir_path(dirname(__FILE__)) . 'public/' . $file_path;
	}

	private function define_shortcode_hooks() {
		$shortcode_loader = new AntraktorShortcodeLoader();
		$this->loader->add_action('init', $shortcode_loader, 'register_shortcodes');
	}

	private function load_dependencies() {
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class_antraktor_loader.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class_antraktor_i18n.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class_antraktor_admin.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/class_antraktor_public.php';

		// DB class
		require_once plugin_dir_path(dirname(__FILE__)) . 'antraktor_db/class_antraktor_database.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'antraktor_db/database_parts/class_antraktor_variable_manager.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'antraktor_db/database_parts/class_antraktor_page_manager.php';

		// Page creator
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class_antraktor_page_creator.php';

		// API communicator
		require_once plugin_dir_path(dirname(__FILE__)) . 'global/class_antraktor_api_communicator.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'global/class_antraktor_api_query_loader.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'global/class_antraktor_api_data_parser.php';

		// API variables classes
		require_once plugin_dir_path(dirname(__FILE__)) . 'global/api_variables/class_api_kodi_variables.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'global/api_variables/class_api_tmdb_variables.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'global/query/class_query_kodi.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'global/query/class_query_tmdb.php';

		// Short code loader
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class_antraktor_shortcode_loader.php';

		$this->loader = new AntraktorLoader();
	}

	private function set_locale() {
		$plugin_i18n = new AntraktorI18n();
		$this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
	}

	private function define_admin_hooks() {
		$plugin_admin = new AntraktorAdmin($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');

		$this->loader->add_action('admin_menu', $plugin_admin, 'add_admin_menu');
		$this->loader->add_action('wp_ajax_create_antrakt_movie_db', $plugin_admin, 'create_antrakt_movie_db');
		$this->loader->add_action('wp_ajax_delete_antrakt_movie_db', $plugin_admin, 'delete_antrakt_movie_db');
	}

	private function define_public_hooks() {

		$plugin_public = new AntraktorPublic($this->get_plugin_name(), $this->get_version());
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
	}

	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}
}
