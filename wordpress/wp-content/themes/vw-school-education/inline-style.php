<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_school_education_first_color = get_theme_mod('vw_school_education_first_color');

	$custom_css = '';

	if($vw_school_education_first_color != false){
		$custom_css .='.search-box i, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .hvr-sweep-to-right:before, .footer input[type="submit"], .footer-2, .scrollup i, #header .nav ul li:hover > ul li, .sidebar input[type="submit"], input[type="submit"], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce span.onsale, .date-monthwrap, .pagination span, .pagination a,.sidebar .tagcloud a:hover{';
			$custom_css .='background-color: '.esc_html($vw_school_education_first_color).';';
		$custom_css .='}';
	}
	if($vw_school_education_first_color != false){
		$custom_css .='a, #header .nav ul li a:hover, .page-template-custom-home-page .socialbox i:hover, .socialbox i:hover, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .footer li a:hover{';
			$custom_css .='color: '.esc_html($vw_school_education_first_color).';';
		$custom_css .='}';
	}
	if($vw_school_education_first_color != false){
		$custom_css .='.page-template-custom-home-page .socialbox i:hover, .socialbox i:hover,.sidebar th,.sidebar td,.sidebar td#prev a,.sidebar caption, .footer li a:hover{';
			$custom_css .='color: '.esc_html($vw_school_education_first_color).'!important;';
		$custom_css .='}';
	}
	if($vw_school_education_first_color != false){
		$custom_css .='.more-btn a:hover, .wel-btn a:hover, .hvr-sweep-to-right:hover, .hvr-sweep-to-right:focus, .hvr-sweep-to-right:active, .post-main-box:hover, .footer .tagcloud a:hover{';
			$custom_css .='border-color: '.esc_html($vw_school_education_first_color).';';
		$custom_css .='}';
	}

	/*---------------------------Second highlight color-------------------*/

	$vw_school_education_second_color = get_theme_mod('vw_school_education_second_color');

	if($vw_school_education_second_color != false){
		$custom_css .='.footer, nav.woocommerce-MyAccount-navigation ul li, .yearwrap,.home-page-header{';
			$custom_css .='background-color: '.esc_html($vw_school_education_second_color).';';
		$custom_css .='}';
	}
	if($vw_school_education_second_color != false){
		$custom_css .='.sidebar ul li::before{';
			$custom_css .='background-color: '.esc_html($vw_school_education_second_color).'!important;';
		$custom_css .='}';
	}
	if($vw_school_education_second_color != false){
		$custom_css .='.page-template-custom-home-page #header .nav ul li a, .page-template-custom-home-page .socialbox i, #welcome-sec h3, .wel-btn a, h1, h2, h3, h4, h5, h6, .sidebar h3, span.woocommerce-Price-amount.amount, .post-main-box h3 a, .blogbutton-small{';
			$custom_css .='color: '.esc_html($vw_school_education_second_color).';';
		$custom_css .='}';
	}
	if($vw_school_education_second_color != false){
		$custom_css .='.page-template-custom-home-page .socialbox i{';
			$custom_css .='color: '.esc_html($vw_school_education_second_color).'!important;';
		$custom_css .='}';
	}
	if($vw_school_education_second_color != false){
		$custom_css .='.wel-btn a, .blogbutton-small{';
			$custom_css .='border-color: '.esc_html($vw_school_education_second_color).';';
		$custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_school_education_width_option','Full Width');
    if($theme_lay == 'Boxed'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
		$custom_css .='#header{';
			$custom_css .='width: 98%;';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Width'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Full Width'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'vw_school_education_slider_opacity_color','0.5');
	if($theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_school_education_slider_content_option','Center');
    if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
	}