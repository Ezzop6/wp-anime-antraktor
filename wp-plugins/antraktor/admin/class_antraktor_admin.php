<?php

class AntraktorAdmin {
	private $plugin_name;
	private $version;
	public function __construct($plugin_name, $version) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function enqueue_styles() {

		$version_dist = HelperScripts::get_file_version(plugin_dir_path(__FILE__) . 'dist/style.css');
		$version_css = HelperScripts::get_file_version(plugin_dir_path(__FILE__) . 'css/antraktor_admin.css');
		wp_enqueue_style($this->plugin_name . '-admin-css', plugin_dir_url(__FILE__) . 'css/antraktor_admin.css', array(), $version_css, 'all');
		wp_enqueue_style($this->plugin_name . '-admin-dist-css', plugin_dir_url(__FILE__) . 'dist/style.css', array(), $version_dist, 'all');
	}


	public function enqueue_scripts() {
		$version_dist = HelperScripts::get_file_version(plugin_dir_path(__FILE__) . 'dist/bundle.js');
		$version_js = HelperScripts::get_file_version(plugin_dir_path(__FILE__) . 'js/antraktor_admin.js');
		wp_enqueue_script($this->plugin_name . '-admin-dist-js', plugin_dir_url(__FILE__) . 'dist/bundle.js', array(), $version_dist, true);
		wp_enqueue_script($this->plugin_name . '-admin-js', plugin_dir_url(__FILE__) . 'js/antraktor_admin.js', array('jquery'), $version_js, true);
	}


	public function add_admin_menu() {
		add_menu_page('Antraktor', 'Antraktor', 'manage_options', 'antraktor', array($this, 'antraktor_admin_display_page'), 'dashicons-video-alt3', 6);
		add_submenu_page('antraktor', 'Antraktor Settings', 'Settings', 'manage_options', 'antraktor', array($this, 'antraktor_admin_display_page'));
		add_submenu_page('antraktor', 'Antraktor Variables', 'Variables', 'manage_options', 'antraktor-variables-page', array($this, 'antraktor_variables_page'));
		add_submenu_page('antraktor', 'Antraktor DB Setings', 'DB Setings', 'manage_options', 'antraktor-db-page', array($this, 'antraktor_db_page'));
		add_submenu_page('antraktor', 'Antraktor Managing Shows', 'Managing Shows', 'manage_options', 'antraktor-managing-shows', array($this, 'antraktor_admin_managing_show_page'));
		if (ANTRAKTOR_DEBUG) {
			add_submenu_page('antraktor', 'Antraktor Testing playground', 'Testing playground', 'manage_options', 'antraktor-testing-playground', array($this, 'antraktor_testing_playground_page'));
		}
	}

	public function antraktor_admin_managing_show_page() {
		HelperScripts::admin_react_wrapper('partials/antraktor_admin_managing_shows.php');
	}

	public function antraktor_admin_display_page() {
		HelperScripts::admin_react_wrapper('partials/antraktor_admin_react_div.php');
	}


	public function antraktor_variables_page() {
		HelperScripts::admin_react_wrapper('partials/antraktor_admin_variables_page.php');
	}

	public function antraktor_db_page() {
		HelperScripts::admin_react_wrapper('partials/antraktor_admin_db_page.php');
	}

	public function antraktor_testing_playground_page() {
		HelperScripts::admin_react_wrapper('partials/antraktor_admin_testing_playground_page.php');
	}

	public function delete_antrakt_movie_db() {
		$database = new AntraktorDatabase();
		$database->delete_antrakt_movie_db();
	}

	public function create_antrakt_movie_db() {
		$database = new AntraktorDatabase();
		$database->create_antrakt_movie_db();
	}
}
