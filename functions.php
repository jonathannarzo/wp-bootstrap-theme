<?php
add_action('after_setup_theme', 'wpBootstrap_setup');
add_action('widgets_init', 'wpBootstrap_widgets');
add_action('wp_enqueue_scripts', 'wpBootstrap_resource');

function wpBootstrap_resource() {
	// Styles
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('fonts', get_template_directory_uri() . '/fonts/main/css.css');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('navbar', get_template_directory_uri() . '/css/navbar-fixed-top.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css');
	// Javascripts
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true);	
	wp_enqueue_script('bootstrap-menu-fix', get_template_directory_uri() . '/js/bootstrap-menu-fix.js', array(), '', true);
}

function wpBootstrap_setup() {
	// Navigation menus
	register_nav_menus(array(
		'primary' => __('Primary Menu'),
		'footer' => __('Footer Menu')
	));
}

function wpBootstrap_widgets() {

	// Slider widget
	register_sidebar(array(
		'name' 	=> 'Front page slider',
		'id'	=> 'slider',
		'before_widget' => '<div class="widget-item">',
		'after_widget' 	=> '</div>'
	));

	// Front page right sidebar
	register_sidebar(array(
		'name' 	=> 'Front page right sidebar',
		'id'	=> 'frontrightsidebar',
		'before_widget' => '<div class="col-md-4">',
		'after_widget' 	=> '</div>',
		'before_title' 	=> '<h3>',
		'after_title' 	=> '</h3>'
	));

	// Front page footer col 1
	register_sidebar(array(
		'name' 	=> 'Front footer column 1',
		'id'	=> 'frontcol1',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '<h3>',
		'after_title' 	=> '</h3>'
	));

	// Front page footer col 2
	register_sidebar(array(
		'name' 	=> 'Front footer column 2',
		'id'	=> 'frontcol2',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '<h3>',
		'after_title' 	=> '</h3>'
	));

	// Front page footer col 3
	register_sidebar(array(
		'name' 	=> 'Front footer column 3',
		'id'	=> 'frontcol3',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '<h3>',
		'after_title' 	=> '</h3>'
	));
}