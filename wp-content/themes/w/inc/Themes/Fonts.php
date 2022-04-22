<?php

namespace Webhd\Themes;

/**
 * Fonts Class
 * @author   WEBHD
 */

\defined( '\WPINC' ) || die;

if ( ! class_exists( 'Fonts' ) ) {
	class Fonts {
		public function __construct() {
			add_action( 'wp_enqueue_scripts', [ &$this, 'enqueue_scripts' ], 99 );
		}

		/** ---------------------------------------- */

		public function enqueue_scripts() {

			wp_enqueue_style("fonts-style", get_template_directory_uri() . '/assets/css/fonts.css', [], W_THEME_VERSION);

			//wp_register_script("fontawesome-kit", "https://kit.fontawesome.com/870d5b0bdf.js", [], false, true);
			//wp_script_add_data("fontawesome-kit", "defer", true);
			//wp_enqueue_script('fontawesome-kit');
		}
	}
}