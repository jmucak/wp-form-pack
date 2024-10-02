<?php

namespace jmucak\wpFormPack\providers;

class FormProvider {
	public function register(): void {
		add_action('rest_api_init', array($this, 'register_rest_routes'));
	}

	public function register_rest_routes() {
		foreach (RESTProvider::get_config() as $config) {
			register_rest_route( $config['namespace'], $config['route'], $config['args'] );
		}
	}
}