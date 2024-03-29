<?php
/**
 * Theme Customizer
 *
 * @package Shutter_Up
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shutter_up_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport              = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport       = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport      = 'postMessage';
	$wp_customize->get_setting( 'header_video' )->transport          = 'refresh';
	$wp_customize->get_setting( 'external_header_video' )->transport = 'refresh';
	$wp_customize->get_setting( 'header_image' )->transport 		 = 'refresh';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title a',
			'container_inclusive' => false,
			'render_callback' => 'shutter_up_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'container_inclusive' => false,
			'render_callback' => 'shutter_up_customize_partial_blogdescription',
		) );
	}

	// Important Links.
	$wp_customize->add_section( 'shutter_up_important_links', array(
		'priority'      => 999,
		'title'         => esc_html__( 'Important Links', 'shutter-up' ),
	) );

	// Has dummy Sanitizaition function as it contains no value to be sanitized.
	shutter_up_register_option( $wp_customize, array(
			'name'              => 'shutter_up_important_links',
			'sanitize_callback' => 'sanitize_text_field',
			'custom_control'    => 'Shutter_Up_Important_Links_Control',
			'label'             => esc_html__( 'Important Links', 'shutter-up' ),
			'section'           => 'shutter_up_important_links',
			'type'              => 'shutter_up_important_links',
		)
	);
	// Important Links End.
}
add_action( 'customize_register', 'shutter_up_customize_register', 11 );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function shutter_up_customize_preview_js() {
	wp_enqueue_script( 'shutter-up-customize-preview', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'assets/js/customize-preview.min.js', array( 'customize-preview' ), '20180103', true );
}
add_action( 'customize_preview_init', 'shutter_up_customize_preview_js' );

/**
 * Binds the JS listener to make Customizer color_scheme control.
 *
 * Passes color scheme data as colorScheme global.
 *
 * @since Shutter Up Pro Pro 1.0
 */
function shutter_up_customize_control_js() {
	wp_enqueue_style( 'shutter-up-custom-controls-css', trailingslashit( esc_url( get_template_directory_uri() ) ) . 'assets/css/customizer.css' );

}
add_action( 'customize_controls_enqueue_scripts', 'shutter_up_customize_control_js' );

/**
 * Include Custom Controls
 */
require get_parent_theme_file_path( 'inc/customizer/custom-controls.php' );

/**
 * Include Header Media Options
 */
require get_parent_theme_file_path( 'inc/customizer/header-media.php' );

/**
 * Include Theme Options
 */
require get_parent_theme_file_path( 'inc/customizer/theme-options.php' );

/**
 * Include Hero Content
 */
require get_parent_theme_file_path( 'inc/customizer/hero-content.php' );

/**
 * Include Featured Slider
 */
require get_parent_theme_file_path( 'inc/customizer/featured-slider.php' );

/**
 * Include Featured Content
 */
require get_parent_theme_file_path( 'inc/customizer/featured-content.php' );

/**
 * Include Testimonial
 */
require get_parent_theme_file_path( 'inc/customizer/testimonial.php' );

/**
 * Include Portfolio
 */
require get_parent_theme_file_path( 'inc/customizer/portfolio.php' );

/**
 * Include Customizer Helper Functions
 */
require get_parent_theme_file_path( 'inc/customizer/helpers.php' );

/**
 * Include Sanitization functions
 */
require get_parent_theme_file_path( 'inc/customizer/sanitize-functions.php' );

/**
 * Include Service
 */
require get_parent_theme_file_path( 'inc/customizer/service.php' );

/**
 * Include Reset Button
 */
require get_parent_theme_file_path( 'inc/customizer/reset.php' );

/**
 * Include Upgrade Button
 */
require get_parent_theme_file_path( 'inc/customizer/upgrade-button/class-customize.php' );
