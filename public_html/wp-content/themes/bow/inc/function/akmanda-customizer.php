<?php 

	/*
	*
	*	Theme Customizer Options
	*	------------------------------------------------
	*	Themes Awesome Framework
	* 	Copyright Themes Awesome 2013 - http://www.themesawesome.com
	*
	*	bow_customize_register()
	*	bow_customize_preview()
	*
	*/
	
	if ( ! function_exists( 'bow_customize_register' ) ) {
		function bow_customize_register( $wp_customize ) {
		
			$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

			/* HEADER STYLING
			================================================== */
			$wp_customize->add_section( 'header_styling', array(
				'title'		=>	__( 'Header', 'bow' ),
				'priority'	=>	200,
			) );
			
			//SECTION

			$wp_customize->add_setting( 'menu_list', array(
				'default'		=> '#000000',
				'type'			=> 'option',
				'transport'		=> 'postMessage',
				'capability'	=> 'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'menu_list_hov', array(
				'default'		=> '#888888',
				'type'			=> 'option',
				'capability'	=>'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'nav_social', array(
				'default'		=> 	'#a2a2a2',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'nav_social_hov', array(
				'default'		=> 	'#000000',
				'type'			=> 	'option',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'menu_copyright', array(
				'default'		=> 	'#a2a2a2',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'menu_copyright_link', array(
				'default'		=> 	'#000000',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'menu_copyright_link_hov', array(
				'default'		=> 	'#888888',
				'type'			=> 	'option',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'homepage_title', array(
				'default'		=> 	'#000000',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'homepage_subtitle', array(
				'default'		=> 	'#000000',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'homepage_discover', array(
				'default'		=> 	'#000000',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );
			
			//CONTROL
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_list', array(
				'label'		=>	__( 'Menu List Color', 'bow' ),
				'section'	=>	'header_styling',
				'settings'	=>	'menu_list',
				'priority'	=>	1,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_list_hov', array(
				'label'		=>	__( 'Menu List Hover', 'bow' ),
				'section'	=>	'header_styling',
				'settings'	=>	'menu_list_hov',
				'priority'	=>	2,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_social', array(
				'label'		=>	__( 'Navigation Social Color', 'bow' ),
				'section'	=>	'header_styling',
				'settings'	=>	'nav_social',
				'priority'	=>	3,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_social_hov', array(
				'label'		=>	__( 'Navigation Social Hover', 'bow' ),
				'section'	=>	'header_styling',
				'settings'	=>	'nav_social_hov',
				'priority'	=>	4,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_copyright', array(
				'label'		=>	__( 'Menu Copyright', 'bow' ),
				'section'	=>	'header_styling',
				'settings'	=>	'menu_copyright',
				'priority'	=>	5,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_copyright_link', array(
				'label'		=>	__( 'Menu Copyright Link', 'bow' ),
				'section'	=>	'header_styling',
				'settings'	=>	'menu_copyright_link',
				'priority'	=>	6,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_copyright_link_hov', array(
				'label'		=>	__( 'Menu Copyright Link Hover', 'bow' ),
				'section'	=>	'header_styling',
				'settings'	=>	'menu_copyright_link_hov',
				'priority'	=>	7,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'homepage_title', array(
				'label'		=>	__( 'Home Page Title', 'bow' ),
				'section'	=>	'header_styling',
				'settings'	=>	'homepage_title',
				'priority'	=>	8,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'homepage_subtitle', array(
				'label'		=>	__( 'Home Page Subtitle', 'bow' ),
				'section'	=>	'header_styling',
				'settings'	=>	'homepage_subtitle',
				'priority'	=>	9,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'homepage_discover', array(
				'label'		=>	__( 'Home Page Discover', 'bow' ),
				'section'	=>	'header_styling',
				'settings'	=>	'homepage_discover',
				'priority'	=>	10,
			) ) );

			/* WORK STYLING
			================================================== */
			
			$wp_customize->add_section( 'work_styling', array(
				'title'		=>	__( 'Work', 'bow' ),
				'priority'	=>	201,
			) );
			
			//SECTION

			$wp_customize->add_setting( 'filt', array(
				'default'		=> 	'#cccccc',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'filt_hov', array(
				'default'		=> 	'#000000',
				'type'			=> 	'option',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'work_title', array(
				'default'		=> 	'#000000',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'work_meta', array(
				'default'		=> 	'#999999',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'work_nav', array(
				'default'		=> 	'#000000',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'work_pic_bg', array(
				'default'		=> 	'#eeeeee',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			//CONTROL
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'filt', array(
				'label'		=>	__( 'Filtrable Color', 'bow' ),
				'section'	=>	'work_styling',
				'settings'	=>	'filt',
				'priority'	=>	1,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'filt_hov', array(
				'label'		=>	__( 'Filtrable Current', 'bow' ),
				'section'	=>	'work_styling',
				'settings'	=>	'filt_hov',
				'priority'	=>	2,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'work_title', array(
				'label'		=>	__( 'Gallery Title', 'bow' ),
				'section'	=>	'work_styling',
				'settings'	=>	'work_title',
				'priority'	=>	3,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'work_meta', array(
				'label'		=>	__( 'Gallery Meta', 'bow' ),
				'section'	=>	'work_styling',
				'settings'	=>	'work_meta',
				'priority'	=>	4,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'work_nav', array(
				'label'		=>	__( 'Gallery Navigation Text', 'bow' ),
				'section'	=>	'work_styling',
				'settings'	=>	'work_nav',
				'priority'	=>	5,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'work_pic_bg', array(
				'label'		=>	__( 'Gallery Picture Background', 'bow' ),
				'section'	=>	'work_styling',
				'settings'	=>	'work_pic_bg',
				'priority'	=>	6,
			) ) );

			/* POST STYLING
			================================================== */
			
			$wp_customize->add_section( 'post_styling', array(
				'title'		=>	__( 'Post', 'bow' ),
				'priority'	=>	202,
			) );
			
			//SECTION

			$wp_customize->add_setting( 'post_loop_bg', array(
				'default'		=> 	'#f6f6f6',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'loop_pagina_cur', array(
				'default'		=> 	'#000000',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'loop_pagina', array(
				'default'		=> 	'#a3a3a3',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'loop_meta', array(
				'default'		=> 	'#a3a3a3',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'post_title', array(
				'default'		=> 	'#000000',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'entry_meta', array(
				'default'		=> 	'#b8b8b8',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'post_text', array(
				'default'		=> 	'#a3a3a3',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'post_category', array(
				'default'		=> 	'#a3a3a3',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'post_category_hov', array(
				'default'		=> 	'#888888',
				'type'			=> 	'option',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'post_social', array(
				'default'		=> 	'#a3a3a3',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'post_author', array(
				'default'		=> 	'#000000',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'post_nav', array(
				'default'		=> 	'#000000',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'post_nav_hov', array(
				'default'		=> 	'#888888',
				'type'			=> 	'option',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'comment_title', array(
				'default'		=> 	'#000000',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'comment_title_bord', array(
				'default'		=> 	'#a3a3a3',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'comment_author', array(
				'default'		=> 	'#000000',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'comment_content', array(
				'default'		=> 	'#a3a3a3',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'blockquote', array(
				'default'		=> 	'#5c5c5c',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );


			//CONTROL
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_loop_bg', array(
				'label'		=>	__( 'Post Loop Background', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'post_loop_bg',
				'priority'	=>	1,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'loop_pagina_cur', array(
				'label'		=>	__( 'Loop Pagination Current', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'loop_pagina_cur',
				'priority'	=>	2,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'loop_pagina', array(
				'label'		=>	__( 'Loop Pagination', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'loop_pagina',
				'priority'	=>	3,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'loop_meta', array(
				'label'		=>	__( 'Loop Meta Post', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'loop_meta',
				'priority'	=>	4,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_title', array(
				'label'		=>	__( 'Post Title', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'post_title',
				'priority'	=>	5,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'entry_meta', array(
				'label'		=>	__( 'Single Post Meta', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'entry_meta',
				'priority'	=>	6,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_text', array(
				'label'		=>	__( 'Post Text', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'post_text',
				'priority'	=>	7,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_category', array(
				'label'		=>	__( 'Post Category', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'post_category',
				'priority'	=>	8,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_category_hov', array(
				'label'		=>	__( 'Post Category Hover', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'post_category_hov',
				'priority'	=>	9,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_social', array(
				'label'		=>	__( 'Post Social Text', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'post_social',
				'priority'	=>	10,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_author', array(
				'label'		=>	__( 'Post Author', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'post_author',
				'priority'	=>	11,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_nav', array(
				'label'		=>	__( 'Post Navigation', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'post_nav',
				'priority'	=>	12,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_nav_hov', array(
				'label'		=>	__( 'Post Navigation Hover', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'post_nav_hov',
				'priority'	=>	13,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'comment_title', array(
				'label'		=>	__( 'Comment Title', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'comment_title',
				'priority'	=>	14,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'comment_title_bord', array(
				'label'		=>	__( 'Comment Title Border', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'comment_title_bord',
				'priority'	=>	15,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'comment_author', array(
				'label'		=>	__( 'Comment Author', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'comment_author',
				'priority'	=>	16,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'comment_content', array(
				'label'		=>	__( 'Comment Content', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'comment_content',
				'priority'	=>	17,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blockquote', array(
				'label'		=>	__( 'Blockquote', 'bow' ),
				'section'	=>	'post_styling',
				'settings'	=>	'blockquote',
				'priority'	=>	18,
			) ) );

			/* CONTENT STYLING
			================================================== */
			
			$wp_customize->add_section( 'content_styling', array(
				'title'		=>	__( 'Content', 'bow' ),
				'priority'	=>	203,
			) );
			
			//SECTION

			$wp_customize->add_setting( 'form_bord', array(
				'default'		=> 	'#cccccc',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'form_bord_foc', array(
				'default'		=> 	'#000000',
				'type'			=> 	'option',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			$wp_customize->add_setting( 'btn_text', array(
				'default'		=> 	'#666666',
				'type'			=> 	'option',
				'transport'		=> 	'postMessage',
				'capability'	=>	'edit_theme_options',
				'sanitize_callback' => 'sanitize_hex_color'
			) );

			//CONTROL
			
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'form_bord', array(
				'label'		=>	__( 'Form Border', 'bow' ),
				'section'	=>	'content_styling',
				'settings'	=>	'form_bord',
				'priority'	=>	1,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'form_bord_foc', array(
				'label'		=>	__( 'Form Border Focus', 'bow' ),
				'section'	=>	'content_styling',
				'settings'	=>	'form_bord_foc',
				'priority'	=>	3,
			) ) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_text', array(
				'label'		=>	__( 'Button Text', 'bow' ),
				'section'	=>	'content_styling',
				'settings'	=>	'btn_text',
				'priority'	=>	2,
			) ) );

			
			

		}
		add_action( 'customize_register', 'bow_customize_register' );

	}
	
	
	function bow_customizer_live_preview() {
		wp_enqueue_script( 'akmanda-customizer',	get_template_directory_uri().'/js/akmanda-customizer.js', array( 'jquery','customize-preview' ), NULL, true);
	}
	add_action( 'customize_preview_init', 'bow_customizer_live_preview' );
	


	function bow_customizer_header_output() {	

	//header styling
	$menu_list					=	get_option('menu_list', '#000000');
	$menu_list_hov				=	get_option('menu_list_hov', '#888888');
	$nav_social					=	get_option('nav_social', '#a2a2a2');
	$nav_social_hov				=	get_option('nav_social_hov', '#000000');
	$menu_copyright				=	get_option('menu_copyright', '#a2a2a2');
	$menu_copyright_link		=	get_option('menu_copyright_link', '#000000');
	$menu_copyright_link_hov	=	get_option('menu_copyright_link_hov', '#888888');
	$homepage_title				=	get_option('homepage_title', '#000000');
	$homepage_subtitle			=	get_option('homepage_subtitle', '#000000');
	$homepage_discover			=	get_option('homepage_discover', '#000000');

	//work styling
	$filt						=	get_option('filt', '#cccccc');
	$filt_hov					=	get_option('filt_hov', '#000000');
	$work_title					=	get_option('work_title', '#000000');
	$work_meta					=	get_option('work_meta', '#999999');
	$work_nav					=	get_option('work_nav', '#000000');
	$work_pic_bg				=	get_option('work_pic_bg', '#eeeeee');

	//post styling
	$post_loop_bg				=	get_option('post_loop_bg', '#f6f6f6');
	$loop_pagina_cur			=	get_option('loop_pagina_cur', '#000000');
	$loop_pagina				=	get_option('loop_pagina', '#a3a3a3');
	$loop_meta					=	get_option('loop_meta', '#a3a3a3');
	$post_title					=	get_option('post_title', '#000000');
	$entry_meta					=	get_option('entry_meta', '#b8b8b8');
	$post_text					=	get_option('post_text', '#a3a3a3');
	$post_category				=	get_option('post_category', '#a3a3a3');
	$post_category_hov			=	get_option('post_category_hov', '#888888');
	$post_social				=	get_option('post_social', '#a3a3a3');
	$post_author				=	get_option('post_author', '#000000');
	$post_nav					=	get_option('post_nav', '#000000');
	$post_nav_hov				=	get_option('post_nav_hov', '#888888');
	$comment_title				=	get_option('comment_title', '#000000');
	$comment_title_bord			=	get_option('comment_title_bord', '#a3a3a3');
	$comment_author				=	get_option('comment_author', '#000000');
	$comment_content			=	get_option('comment_content', '#a3a3a3');
	$blockquote					=	get_option('blockquote', '#5c5c5c');

	//content styling
	$form_bord				=	get_option('form_bord', '#cccccc');
	$form_bord_foc			=	get_option('form_bord_foc', '#000000');
	$btn_text				=	get_option('btn_text', '#666666');


	

	echo '<style type="text/css">';

	//=========HEADER STYLING======//

	//menu list
	echo '.navigation .menu li, .navigation .menu li a, .navigation .menu li a:visited{color:'.$menu_list.'}' ;
	echo '.navigation .menu li a:focus, .navigation .menu li a:hover{color:'.$menu_list_hov.'}' ;

	//social
	echo '.navigation .socials li{color:'.$nav_social.'}' ;
	echo '.navigation .socials li:hover{color:'.$nav_social_hov.'}' ;

	//copyright
	echo '.navigation .copyright{color:'.$menu_copyright.'}' ;
	echo '.navigation .copyright a, .navigation .copyright a:visited{color:'.$menu_copyright_link.'}' ;
	echo '.navigation .copyright a:hover{color:'.$menu_copyright_link_hov.'}' ;

	//homepage
	echo '.homepage .title{color:'.$homepage_title.'}' ;
	echo '.homepage .slogan{color:'.$homepage_subtitle.'}' ;
	echo '.homepage .discover{color:'.$homepage_discover.'}' ;

	//=========WORK STYLING======//

	//filtrable
	echo '.work .navigate li, .footer .link{color:'.$filt.'}' ;
	echo '.work .navigate li:hover, .work .navigate li.active, .footer .link:hover{color:'.$filt_hov.'}' ;

	//gallery
	echo '.work-preview .meta .picture-title{color:'.$work_title.'}' ;
	echo '.work-preview .meta .album-title, .work-preview .meta span{color:'.$work_meta.'}' ;
	echo '.work-preview .nav .prev, .work-preview .nav .next{color:'.$work_nav.'}' ;
	echo '.work-preview .frame{background-color:'.$work_pic_bg.'}' ;


	//=========POST STYLING======//

	//post loop
	echo '.post-loop .post-info{background-color:'.$post_loop_bg.'}' ;
	echo '.pagination .current{color:'.$loop_pagina_cur.'}' ;
	echo '.pagination a.inactive{color:'.$loop_pagina.'}' ;
	echo '.post-loop .date, body .sticky .post-info:before{color:'.$loop_meta.'}' ;
	
	//post entry
	echo '.post-loop .title h2, article .entry-title{color:'.$post_title.'}' ;
	echo 'article .entry-meta span{color:'.$entry_meta.'}' ;
	echo '.entry-content p{color:'.$post_text.'}' ;
	echo '.single-category-bottom a, .single-category-bottom a:visited, .single-tag-bottom a{color:'.$post_category.'}' ;
	echo '.single-category-bottom a:hover, .single-category-bottom a:focus, .single-tag-bottom a:hover{color:'.$post_category_hov.'}' ;
	echo 'article .social li{color:'.$post_social.'}' ;
	echo 'article .author a, article .author a:visited{color:'.$post_author.'}' ;
	echo '.navigation-post .nav-previous a, .navigation-post .nav-next a{color:'.$post_nav.'}' ;
	echo '.navigation-post .nav-previous a:hover, .navigation-post .nav-next a:hover{color:'.$post_nav_hov.'}' ;

	//comment
	echo '.comments-title h4{color:'.$comment_title.'}' ;
	echo '.comments-title{border-top-color:'.$comment_title_bord.'}' ;
	echo '.comments-title, .comment-list li article.comment{border-bottom-color:'.$comment_title_bord.'}' ;
	echo '.comment-list li .meta-comment .comment-author .fn a{color:'.$comment_author.'}' ;
	echo '.comment-list li .comment-meta, .comment-list li .comment-content p{color:'.$comment_content.'}' ;
	echo 'blockquote, blockquote p, blockquote cite{color:'.$blockquote.'}' ;

	//=========FORM STYLING======//

	echo 'input[type="text"], input[type="password"], input[type="email"], textarea, select, input[type="submit"]{border-color:'.$form_bord.'}' ;
	echo 'input[type="text"]:focus, input[type="password"]:focus, input[type="email"]:focus, textarea:focus, input[type="submit"]:hover{border-color:'.$form_bord_foc.'}' ;
	echo 'input[type="text"]:focus, input[type="password"]:focus, input[type="email"]:focus, textarea:focus, input[type="submit"]:hover{color:'.$form_bord_foc.'}' ;
	echo 'input[type="submit"]{color:'.$btn_text.'}' ;

	
	echo '</style> ';

	}

	add_action( 'wp_head', 'bow_customizer_header_output');



