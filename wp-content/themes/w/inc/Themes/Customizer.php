<?php

namespace Webhd\Themes;

use WP_Customize_Color_Control;
use WP_Customize_Image_Control;
use WP_Customize_Manager;

/**
 * Customize Class
 * @author   WEBHD
 */

\defined( '\WPINC' ) || die;

if ( ! class_exists( 'Customizer' ) ) {
	class Customizer {
		public function __construct() {

			// Setup the Theme Customizer settings and controls.
			add_action( 'customize_register', [ &$this, 'register' ], 30 );
		}

		/**
		 * Register customizer options.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function register( $wp_customize ) {

			// light logo
//			$wp_customize->add_setting( 'light_logo' );
//			$wp_customize->add_control(
//				new WP_Customize_Image_Control(
//					$wp_customize,
//					'light_logo',
//					[
//						'label'    => __( 'Light logo', 'w' ),
//						'section'  => 'title_tagline',
//						'settings' => 'light_logo',
//						'priority' => 8,
//					]
//				)
//			);

			// logo mobile
			$wp_customize->add_setting( 'mobile_logo' );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'mobile_logo',
					[
						'label'    => __( 'Mobile Logo', 'w' ),
						'section'  => 'title_tagline',
						'settings' => 'mobile_logo',
						'priority' => 8,
					]
				)
			);

			// -------------------------------------------------------------
			// -------------------------------------------------------------

			// Create custom panels
			$wp_customize->add_panel(
				'addon_menu_panel',
				[
					'priority'       => 140,
					'theme_supports' => '',
					'title'          => __( 'W', 'w' ),
					'description'    => __( 'Controls the add-on menu', 'w' ),
				]
			);

			// -------------------------------------------------------------
			// -------------------------------------------------------------

			// Create offcanvas section
			$wp_customize->add_section(
				'offcanvas_menu_section',
				[
					'title'    => __( 'offCanvas Menu', 'w' ),
					'panel'    => 'addon_menu_panel',
					'priority' => 1000,
				]
			);

			// add offcanvas control
			$wp_customize->add_setting(
				'offcanvas_menu_setting',
				[
					'default'           => 'default',
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				]
			);
			$wp_customize->add_control(
				'offcanvas_menu_control',
				[
					'label'    => __( 'offCanvas position', 'w' ),
					'type'     => 'radio',
					'section'  => 'offcanvas_menu_section',
					'settings' => 'offcanvas_menu_setting',
					'choices'  => [
						'left'    => __( 'Left', 'w' ),
						'right'   => __( 'Right', 'w' ),
						'top'     => __( 'Top', 'w' ),
						'bottom'  => __( 'Bottom', 'w' ),
						'default' => __( 'Default (Right)', 'w' ),
					],
				]
			);

			// -------------------------------------------------------------

			// Create news section
			$wp_customize->add_section(
				'news_menu_section',
				[
					'title'    => __( 'News images', 'w' ),
					'panel'    => 'addon_menu_panel',
					'priority' => 1001,
				]
			);

			// add news control
			$wp_customize->add_setting(
				'news_menu_setting',
				[
					'default'           => 'default',
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				]
			);
			$wp_customize->add_control(
				'news_menu_control',
				[
					'label'    => __( 'Image ratio', 'w' ),
					'type'     => 'radio',
					'section'  => 'news_menu_section',
					'settings' => 'news_menu_setting',
					'choices'  => [
						'1v1'     => __( '1:1', 'w' ),
						'3v2'     => __( '3:2', 'w' ),
						'4v3'     => __( '4:3', 'w' ),
						'16v9'    => __( '16:9', 'w' ),
						'default' => __( 'Ratio default (16:9)', 'w' ),
					],
				]
			);

            // -------------------------------------------------------------

            // Create product section
            $wp_customize->add_section(
                'product_menu_section',
                [
                    'title'    => __( 'Products image', 'w' ),
                    'panel'    => 'addon_menu_panel',
                    'priority' => 1002,
                ]
            );

            // add product control
            $wp_customize->add_setting(
                'product_menu_setting',
                [
                    'default'           => 'default',
                    'sanitize_callback' => 'sanitize_text_field',
                    'transport'         => 'refresh',
                ]
            );
            $wp_customize->add_control(
                'product_menu_control',
                [
                    'label'    => __( 'Image ratio', 'w' ),
                    'type'     => 'radio',
                    'section'  => 'product_menu_section',
                    'settings' => 'product_menu_setting',
                    'choices'  => [
                        '1v1'     => __( '1:1', 'w' ),
                        '3v2'     => __( '3:2', 'w' ),
                        '4v3'     => __( '4:3', 'w' ),
                        '16v9'    => __( '16:9', 'w' ),
                        'default' => __( 'Ratio default (16:9)', 'w' ),
                    ],
                ]
            );

			// -------------------------------------------------------------

			// Create custom field for social settings layout
			$wp_customize->add_section(
				'socials_menu_section',
				[
					'title'    => __( 'Social', 'w' ),
					'panel'    => 'addon_menu_panel',
					'priority' => 1005,
				]
			);

			// Add options for facebook appid
			$wp_customize->add_setting( 'fb_menu_setting', [ 'sanitize_callback' => 'sanitize_text_field', ] );
			$wp_customize->add_control(
				'fb_menu_control',
				[
					'label'       => __( 'Facebook AppID', 'w' ),
					'section'     => 'socials_menu_section',
					'settings'    => 'fb_menu_setting',
					'type'        => 'text',
					'description' => __( "You can do this at <a href='https://developers.facebook.com/apps/'>developers.facebook.com/apps</a>", 'w' ),
				]
			);

			// Add options for facebook page_id
			$wp_customize->add_setting( 'fbpage_menu_setting', [ 'sanitize_callback' => 'sanitize_text_field', ] );
			$wp_customize->add_control(
				'fbpage_menu_control',
				[
					'label'       => __( 'Facebook PageID', 'w' ),
					'section'     => 'socials_menu_section',
					'settings'    => 'fbpage_menu_setting',
					'type'        => 'text',
					'description' => __( "How do I find my Facebook Page ID? <a href='https://www.facebook.com/help/1503421039731588'>facebook.com/help/1503421039731588</a>", 'w' ),
				]
			);

			// add control
			$wp_customize->add_setting(
				'fb_chat_setting',
				[
					'default'           => false,
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_checkbox',
					'transport'         => 'refresh',
				]
			);
			$wp_customize->add_control(
				'fb_chat_control',
				[
					'type'     => 'checkbox',
					'settings' => 'fb_chat_setting',
					'section'  => 'socials_menu_section',
					'label'    => __( 'Facebook Live Chat', 'w' ),
					//'description' => __( 'Thêm facebook messenger live chat', 'w' ),
				]
			);

			// Zalo Appid
			$wp_customize->add_setting( 'zalo_menu_setting', [ 'sanitize_callback' => 'sanitize_text_field', ] );
			$wp_customize->add_control(
				'zalo_menu_control',
				[
					'label'       => __( 'Zalo AppID', 'w' ),
					'section'     => 'socials_menu_section',
					'settings'    => 'zalo_menu_setting',
					'type'        => 'text',
					'description' => __( "You can do this at <a href='https://developers.zalo.me/docs/'>developers.zalo.me/docs/</a>", 'w' ),
				]
			);

			// Zalo oaid
			$wp_customize->add_setting( 'zalo_oa_menu_setting', [ 'sanitize_callback' => 'sanitize_text_field', ] );
			$wp_customize->add_control(
				'zalo_oa_menu_control',
				[
					'label'       => __( 'Zalo OAID', 'w' ),
					'section'     => 'socials_menu_section',
					'settings'    => 'zalo_oa_menu_setting',
					'type'        => 'text',
					'description' => __( "You can do this at <a href='https://oa.zalo.me/manage/oa?option=create'>oa.zalo.me/manage/oa?option=create</a>", 'w' ),
				]
			);

			// add control
			$wp_customize->add_setting(
				'zalo_chat_setting',
				[
					'default'           => false,
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_checkbox',
					'transport'         => 'refresh',
				]
			);
			$wp_customize->add_control(
				'zalo_chat_control',
				[
					'type'     => 'checkbox',
					'settings' => 'zalo_chat_setting',
					'section'  => 'socials_menu_section',
					'label'    => __( 'Zalo Live Chat', 'w' ),
					//'description' => __( 'Thêm zalo live chat', 'w' ),
				]
			);

			// -------------------------------------------------------------

			// Create hotline section
			$wp_customize->add_section(
				'hotline_menu_section',
				[
					'title'    => __( 'Hotline', 'w' ),
					'panel'    => 'addon_menu_panel',
					'priority' => 1006,
				]
			);

			// add control
			$wp_customize->add_setting( 'hotline_setting', [
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'refresh'
			] );
			$wp_customize->add_control(
				'hotline_control',
				[
					'label'       => __( 'Hotline', 'w' ),
					'section'     => 'hotline_menu_section',
					'settings'    => 'hotline_setting',
					'description' => __( 'Hotline number, support easier interaction on the phone', 'w' ),
					'type'        => 'text',
				]
			);

			// add control
			$wp_customize->add_setting( 'hotline_zalo_setting', [ 'sanitize_callback' => 'sanitize_text_field', ] );
			$wp_customize->add_control(
				'hotline_zalo_control',
				[
					'label'       => __( 'Zalo Hotline', 'w' ),
					'section'     => 'hotline_menu_section',
					'settings'    => 'hotline_zalo_setting',
					'type'        => 'text',
					'description' => __( 'Zalo Hotline number, support easier interaction on the zalo', 'w' ),
				]
			);

			// -------------------------------------------------------------

			// Create breadcrumbs background section
			$wp_customize->add_section(
				'breadcrumb_bg_section',
				[
					'title'    => __( 'Breadcrumb background', 'w' ),
					'panel'    => 'addon_menu_panel',
					'priority' => 1007,
				]
			);

			// add control
			$wp_customize->add_setting( 'breadcrumb_bg_setting', [ 'transport' => 'refresh' ] );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'breadcrumb_bg_control',
					[
						'label'    => __( 'Breadcrumb background', 'w' ),
						'section'  => 'breadcrumb_bg_section',
						'settings' => 'breadcrumb_bg_setting',
						'priority' => 9,
					]
				)
			);

			// -------------------------------------------------------------

			// Create footer background section
			$wp_customize->add_section(
				'footer_bg_section',
				[
					'title'    => __( 'Footer background', 'w' ),
					'panel'    => 'addon_menu_panel',
					'priority' => 1008,
				]
			);

			// add control
			$wp_customize->add_setting( 'footer_bg_setting', [ 'transport' => 'refresh' ] );
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'footer_bg_control',
					[
						'label'    => __( 'Footer background', 'w' ),
						'section'  => 'footer_bg_section',
						'settings' => 'footer_bg_setting',
						'priority' => 9,
					]
				)
			);

			// -------------------------------------------------------------

			// Create footer layout section
			$wp_customize->add_section(
				'footer_layout_section',
				[
					'title'    => __( 'Footer layouts', 'w' ),
					'panel'    => 'addon_menu_panel',
					'priority' => 1009,
				]
			);

			// add control
			$wp_customize->add_setting( 'footer_row_setting', [ 'sanitize_callback' => 'sanitize_text_field', ] );
			$wp_customize->add_control(
				'footer_row_control',
				[
					'label'       => __( 'Footer row number', 'w' ),
					'section'     => 'footer_layout_section',
					'settings'    => 'footer_row_setting',
					'type'        => 'number',
					'description' => __( 'Footer rows number', 'w' ),
				]
			);

			// add control
			$wp_customize->add_setting( 'footer_col_setting', [ 'sanitize_callback' => 'sanitize_text_field', ] );
			$wp_customize->add_control(
				'footer_col_control',
				[
					'label'       => __( 'Footer columns number', 'w' ),
					'section'     => 'footer_layout_section',
					'settings'    => 'footer_col_setting',
					'type'        => 'number',
					'description' => __( 'Footer columns number', 'w' ),
				]
			);

			// -------------------------------------------------------------

			// Block Editor + Gutenberg + Widget
			$wp_customize->add_section(
				'block_editor_section',
				[
					'title'    => __( 'Block Editor', 'w' ),
					'panel'    => 'addon_menu_panel',
					'priority' => 1010,
				]
			);

			// add control
			$wp_customize->add_setting(
				'use_widgets_block_editor_setting',
				[
					'default'           => false,
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_checkbox',
					'transport'         => 'refresh',
				]
			);
			$wp_customize->add_control(
				'use_widgets_block_editor_control',
				[
					'type'        => 'checkbox',
					'settings'    => 'use_widgets_block_editor_setting',
					'section'     => 'block_editor_section',
					'label'       => __( 'Widgets kiểu cũ', 'w' ),
					'description' => __( 'Disables the block editor from managing widgets', 'w' ),
				]
			);

			// add control
			$wp_customize->add_setting(
				'gutenberg_use_widgets_block_editor_setting',
				[
					'default'           => false,
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_checkbox',
					'transport'         => 'refresh',
				]
			);
			$wp_customize->add_control(
				'gutenberg_use_widgets_block_editor_control',
				[
					'type'        => 'checkbox',
					'settings'    => 'gutenberg_use_widgets_block_editor_setting',
					'section'     => 'block_editor_section',
					'label'       => __( 'Tắt Gutenberg Widgets', 'w' ),
					'description' => __( 'Disables the block editor from managing widgets in the Gutenberg plugin', 'w' ),
				]
			);

			// add control
			$wp_customize->add_setting(
				'use_block_editor_for_post_type_setting',
				[
					'default'           => false,
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_checkbox',
					'transport'         => 'refresh',
				]
			);
			$wp_customize->add_control(
				'use_block_editor_for_post_type_control',
				[
					'type'        => 'checkbox',
					'settings'    => 'use_block_editor_for_post_type_setting',
					'section'     => 'block_editor_section',
					'label'       => __( 'Trình soạn thảo cũ', 'w' ),
					'description' => __( 'Use Classic Editor - Disable Gutenberg Editor', 'w' ),
				]
			);

			// -------------------------------------------------------------

			// Other
			$wp_customize->add_section(
				'other_section',
				[
					'title'    => __( 'Other', 'w' ),
					'panel'    => 'addon_menu_panel',
					'priority' => 1011,
				]
			);

			// add control
			// GPKD
			$wp_customize->add_setting(
				'GPKD_setting',
				[
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh'
				]
			);
			$wp_customize->add_control(
				'GPKD_control',
				[
					'label'       => __( 'GPKD', 'w' ),
					'section'     => 'other_section',
					'settings'    => 'GPKD_setting',
					'description' => __( 'Thông tin Giấy phép kinh doanh (nếu có)', 'w' ),
					'type'        => 'text',
				]
			);

			// add control
			// meta theme-color
			$wp_customize->add_setting(
				'theme_color_setting',
				[
					'default'           => '',
					'sanitize_callback' => 'sanitize_hex_color',
					'capability'        => 'edit_theme_options',
				]
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control( $wp_customize,
					'theme_color_control',
					[
						'label'    => __( 'Theme Color', 'w' ),
						'section'  => 'other_section',
						'settings' => 'theme_color_setting',
					]
				)
			);
		}
	}
}