<?php
/**
 * VW School Education Theme Customizer
 *
 * @package VW School Education
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_school_education_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_school_education_custom_controls' );

function vw_school_education_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_school_education_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-school-education' ),
	    'description' => __( 'Description of what this panel does.', 'vw-school-education' ),
	) );

	$wp_customize->add_section( 'vw_school_education_left_right', array(
    	'title'      => __( 'General Settings', 'vw-school-education' ),
		'priority'   => 30,
		'panel' => 'vw_school_education_panel_id'
	) );

	$wp_customize->add_setting('vw_school_education_width_option',array(
        'default' => __('Full Width','vw-school-education'),
        'sanitize_callback' => 'vw_school_education_sanitize_choices'
	));
	$wp_customize->add_control(new VW_School_Education_Image_Radio_Control($wp_customize, 'vw_school_education_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-school-education'),
        'description' => __('Here you can change the width layout of Website.','vw-school-education'),
        'section' => 'vw_school_education_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_school_education_theme_options',array(
        'default' => __('Right Sidebar','vw-school-education'),
        'sanitize_callback' => 'vw_school_education_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_school_education_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-school-education'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-school-education'),
        'section' => 'vw_school_education_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-school-education'),
            'Right Sidebar' => __('Right Sidebar','vw-school-education'),
            'One Column' => __('One Column','vw-school-education'),
            'Three Columns' => __('Three Columns','vw-school-education'),
            'Four Columns' => __('Four Columns','vw-school-education'),
            'Grid Layout' => __('Grid Layout','vw-school-education')
        ),
	));

	$wp_customize->add_setting('vw_school_education_page_layout',array(
        'default' => __('One Column','vw-school-education'),
        'sanitize_callback' => 'vw_school_education_sanitize_choices'
	));
	$wp_customize->add_control('vw_school_education_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-school-education'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-school-education'),
        'section' => 'vw_school_education_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-school-education'),
            'Right Sidebar' => __('Right Sidebar','vw-school-education'),
            'One Column' => __('One Column','vw-school-education')
        ),
	) );
    
	//Topbar section
	$wp_customize->add_section('vw_school_education_topbar',array(
		'title'	=> __('Topbar Section','vw-school-education'),
		'description'	=> __('Add TopBar Content here','vw-school-education'),
		'priority'	=> null,
		'panel' => 'vw_school_education_panel_id',
	));
	
	$wp_customize->add_setting('vw_school_education_location_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_school_education_location_text',array(
		'label'	=> __('Add Location Text','vw-school-education'),
		'section'	=> 'vw_school_education_topbar',
		'setting'	=> 'vw_school_education_location_text',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_school_education_address',array(
		'label'	=> __('Add Location','vw-school-education'),
		'section'	=> 'vw_school_education_topbar',
		'setting'	=> 'vw_school_education_address',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_school_education_contact',array(
		'label'	=> __('Add Contact Details','vw-school-education'),
		'section'	=> 'vw_school_education_topbar',
		'setting'	=> 'vw_school_education_contact',
		'type'		=> 'text'
	));	

	$wp_customize->add_setting('vw_school_education_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_school_education_email',array(
		'label'	=> __('Add Email Address','vw-school-education'),
		'section'	=> 'vw_school_education_topbar',
		'setting'	=> 'vw_school_education_email',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_day',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_school_education_day',array(
		'label'	=> __('Add Day','vw-school-education'),
		'section'	=> 'vw_school_education_topbar',
		'setting'	=> 'vw_school_education_day',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_school_education_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_school_education_time',array(
		'label'	=> __('Add Time','vw-school-education'),
		'section'	=> 'vw_school_education_topbar',
		'setting'	=> 'vw_school_education_time',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'vw_school_education_search_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_search_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Search','vw-school-education' ),
          'section' => 'vw_school_education_topbar'
    )));

	//Slider
	$wp_customize->add_section( 'vw_school_education_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-school-education' ),
		'priority'   => null,
		'panel' => 'vw_school_education_panel_id'
	) );

	$wp_customize->add_setting( 'vw_school_education_slider_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_slider_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Slider','vw-school-education' ),
          'section' => 'vw_school_education_slidersettings'
    )));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_school_education_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );
		$wp_customize->add_control( 'vw_school_education_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-school-education' ),
			'description' => __('Slider image size (1500 x 765)','vw-school-education'),
			'section'  => 'vw_school_education_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('vw_school_education_slider_content_option',array(
        'default' => __('Center','vw-school-education'),
        'sanitize_callback' => 'vw_school_education_sanitize_choices'
	));
	$wp_customize->add_control(new VW_School_Education_Image_Radio_Control($wp_customize, 'vw_school_education_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-school-education'),
        'section' => 'vw_school_education_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_school_education_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_school_education_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-school-education' ),
		'section'     => 'vw_school_education_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_school_education_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_school_education_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_school_education_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_school_education_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-school-education' ),
	'section'     => 'vw_school_education_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_school_education_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-school-education'),
      '0.1' =>  esc_attr('0.1','vw-school-education'),
      '0.2' =>  esc_attr('0.2','vw-school-education'),
      '0.3' =>  esc_attr('0.3','vw-school-education'),
      '0.4' =>  esc_attr('0.4','vw-school-education'),
      '0.5' =>  esc_attr('0.5','vw-school-education'),
      '0.6' =>  esc_attr('0.6','vw-school-education'),
      '0.7' =>  esc_attr('0.7','vw-school-education'),
      '0.8' =>  esc_attr('0.8','vw-school-education'),
      '0.9' =>  esc_attr('0.9','vw-school-education')
	),
	));

	//Welcome Section
	$wp_customize->add_section('vw_school_education_welcome_section',array(
		'title'	=> __('Welcome Section','vw-school-education'),
		'description'	=> __('Add Welcome sections below.','vw-school-education'),
		'panel' => 'vw_school_education_panel_id',
	));

	$post_list = get_posts();
	$i = 0;
	$posts[]='Select';	
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('vw_school_education_welcome_post',array(
		'sanitize_callback' => 'vw_school_education_sanitize_choices',
	));
	$wp_customize->add_control('vw_school_education_welcome_post',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','vw-school-education'),
		'section' => 'vw_school_education_welcome_section',
	));

	//Welcome excerpt
	$wp_customize->add_setting( 'vw_school_education_welcome_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_school_education_welcome_excerpt_number', array(
		'label'       => esc_html__( 'Welcome Excerpt length','vw-school-education' ),
		'section'     => 'vw_school_education_welcome_section',
		'type'        => 'range',
		'settings'    => 'vw_school_education_welcome_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_section('vw_school_education_blog_post',array(
		'title'	=> __('Blog Post Settings','vw-school-education'),
		'panel' => 'vw_school_education_panel_id',
	));	

	$wp_customize->add_setting( 'vw_school_education_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-school-education' ),
        'section' => 'vw_school_education_blog_post'
    )));

    $wp_customize->add_setting( 'vw_school_education_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_toggle_author',array(
		'label' => esc_html__( 'Author','vw-school-education' ),
		'section' => 'vw_school_education_blog_post'
    )));

    $wp_customize->add_setting( 'vw_school_education_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-school-education' ),
		'section' => 'vw_school_education_blog_post'
    )));

    $wp_customize->add_setting( 'vw_school_education_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_school_education_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-school-education' ),
		'section'     => 'vw_school_education_blog_post',
		'type'        => 'range',
		'settings'    => 'vw_school_education_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Content Creation
	$wp_customize->add_section( 'vw_school_education_content_section' , array(
    	'title' => __( 'Customize Home Page Settings', 'vw-school-education' ),
		'priority' => null,
		'panel' => 'vw_school_education_panel_id'
	) );

	$wp_customize->add_setting('vw_school_education_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_School_Education_Content_Creation( $wp_customize, 'vw_school_education_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-school-education' ),
		),
		'section' => 'vw_school_education_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-school-education' ),
	)));


	//Footer Text
	$wp_customize->add_section('vw_school_education_footer',array(
		'title'	=> __('Footer','vw-school-education'),
		'description'=> __('This section will appear in the footer','vw-school-education'),
		'panel' => 'vw_school_education_panel_id',
	));	
	
	$wp_customize->add_setting('vw_school_education_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_school_education_footer_text',array(
		'label'	=> __('Copyright Text','vw-school-education'),
		'section'=> 'vw_school_education_footer',
		'setting'=> 'vw_school_education_footer_text',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_school_education_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_school_education_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_School_Education_Toggle_Switch_Custom_Control( $wp_customize, 'vw_school_education_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-school-education' ),
      	'section' => 'vw_school_education_footer'
    )));

	$wp_customize->add_setting('vw_school_education_scroll_top_alignment',array(
        'default' => __('Right','vw-school-education'),
        'sanitize_callback' => 'vw_school_education_sanitize_choices'
	));
	$wp_customize->add_control(new VW_School_Education_Image_Radio_Control($wp_customize, 'vw_school_education_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-school-education'),
        'section' => 'vw_school_education_footer',
        'settings' => 'vw_school_education_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/layout1.png',
            'Center' => get_template_directory_uri().'/images/layout2.png',
            'Right' => get_template_directory_uri().'/images/layout3.png'
    ))));	
}

add_action( 'customize_register', 'vw_school_education_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_School_Education_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_School_Education_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_School_Education_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW School Pro', 'vw-school-education' ),
			'pro_text' => esc_html__( 'Upgrade Pro', 'vw-school-education' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/premium-school-wordpress-theme/'),
		)));
		// Register sections.
		$manager->add_section(new VW_School_Education_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Documentation', 'vw-school-education' ),
			'pro_text' => esc_html__( 'Docs', 'vw-school-education' ),
			'pro_url'  => admin_url('themes.php?page=vw_school_education_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-school-education-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-school-education-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_School_Education_Customize::get_instance();