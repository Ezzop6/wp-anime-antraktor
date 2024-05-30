<?php

class AntraktorPublic {


	private $plugin_name;

	private $version;

	public function __construct($plugin_name, $version) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function enqueue_styles() {
		$file_dist = HelperScripts::get_file_version(plugin_dir_path(__FILE__) . 'dist/style.css');
		$file_css = HelperScripts::get_file_version(plugin_dir_path(__FILE__) . 'css/antraktor_public.css');
		wp_enqueue_style($this->plugin_name . '-public-dist-css', plugin_dir_url(__FILE__) . 'dist/style.css', array(), $file_dist, 'all');
		wp_enqueue_style($this->plugin_name . '-public-css', plugin_dir_url(__FILE__) . 'css/antraktor_public.css', array(), $file_css, 'all');
	}

	public function enqueue_scripts() {
		$file_dist = HelperScripts::get_file_version(plugin_dir_path(__FILE__) . 'dist/bundle.js');
		$file_js = HelperScripts::get_file_version(plugin_dir_path(__FILE__) . 'js/antraktor_public.js');
		wp_enqueue_script($this->plugin_name . '-public-dist-js', plugin_dir_url(__FILE__) . 'dist/bundle.js', array(), $file_dist, true);
		wp_enqueue_script($this->plugin_name . '-public-js', plugin_dir_url(__FILE__) . 'js/antraktor_public.js', array('jquery'), $file_js, true);
	}
}
