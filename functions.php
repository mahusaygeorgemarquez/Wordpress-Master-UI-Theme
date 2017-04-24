<?php
global $masterui;

function masterui_init(){
	global $masterui;
	show_admin_bar(false);
	$masterui = new MasterUI();
}
add_action('init', 'masterui_init');

function masterui_header(){
	global $masterui;
	$masterui->headerPage();
}

function masterui_footer(){
	global $masterui;
	$masterui->footerPage();
}

function masterui_setup() {
	load_theme_textdomain( 'masterui' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_image_size( 'masterui-featured-image', 2000, 1200, true );
	for($i=100; $i<=1000; $i+=50){
		add_image_size( 'masterui-thumbnail-$i', $i, $i, true );
	}
	
	$GLOBALS['content_width'] = 525;

	register_nav_menus( array(
		'leftmainmenu'    => __( 'Left Main Menu', 'masterui' ),
		'rightmainmenu'    => __( 'Right Main Menu', 'masterui' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	add_theme_support( 'customize-selective-refresh-widgets' );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),




		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			'leftmainmenu' => array(
				'name' => __( 'Left Main Menu', 'masterui' ),
				'items' => array(
					'link_home', 
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'rightmainmenu' => array(
				'name' => __( 'Right Main Menu', 'masterui' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Twenty Seventeen array of starter content.
	 *
	 * @since Twenty Seventeen 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'masteruistarter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'masterui_setup' );

require get_parent_theme_file_path( '/includes/masterui.cls.php' );