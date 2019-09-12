<?php
/**
 * @package VW School Education
 * Setup the WordPress core custom header feature.
 *
 * @uses vw_school_education_header_style()
*/
function vw_school_education_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'vw_school_education_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'vw_school_education_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'vw_school_education_custom_header_setup' );

if ( ! function_exists( 'vw_school_education_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see vw_school_education_header_style().
 */
add_action( 'wp_enqueue_scripts', 'vw_school_education_header_style' );
function vw_school_education_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .home-page-header,
        .page-template-custom-home-page .home-page-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'vw-school-education-basic-style', $custom_css );
	endif;
}
endif; // vw_school_education_header_style