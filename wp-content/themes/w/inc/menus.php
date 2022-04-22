<?php

/**
 * Menus functions
 * @author   WEBHD
 */

\defined( '\WPINC' ) || die;

if ( ! function_exists( '__register_menus' ) ) {
	function __register_menus() {
		/**
		 * Register Menus
		 *
		 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
		 */
		register_nav_menus(
			[
				'main-nav'   => __( 'Primary Menu', 'w' ),
				'second-nav' => __( 'Secondary Menu', 'w' ),
				'mobile-nav' => __( 'Handheld Menu', 'w' ),
				'social-nav' => __( 'Social menu', 'w' ),
				'policy-nav' => __( 'Terms menu', 'w' ),
			]
		);
	}

	add_action( 'after_setup_theme', '__register_menus', 10 );
}