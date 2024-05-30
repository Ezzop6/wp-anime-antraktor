<?php

class AntraktorPublic {


	private $plugin_name;

	private $version;

	public function __construct($plugin_name, $version) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function enqueue_styles() {
		wp_enqueue_style($this->plugin_name . '-public-dist-css', plugin_dir_url(__FILE__) . 'dist/bundle.css', array(), $this->version, 'all');
		wp_enqueue_style($this->plugin_name . '-public-css', plugin_dir_url(__FILE__) . 'css/antraktor_public.css', array(), $this->version, 'all');
	}
	public function enqueue_scripts() {
		wp_enqueue_script($this->plugin_name . '-public-dist-js', plugin_dir_url(__FILE__) . 'dist/bundle.js', array(), $this->version, false);
		wp_enqueue_script($this->plugin_name . '-public-js', plugin_dir_url(__FILE__) . 'js/antraktor_public.js', array('jquery'), $this->version, false);
	}
}
