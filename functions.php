<?php
add_action('after_setup_theme', 'wpBootstrap_setup');
add_action('widgets_init', 'wpBootstrap_widgets');
add_action('wp_enqueue_scripts', 'wpBootstrap_resource');

function wpBootstrap_resource() {
	// Styles
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('ie10-css', get_template_directory_uri() . '/css/ie10-viewport-bug-workaround.css');
	wp_enqueue_style('navbar', get_template_directory_uri() . '/css/navbar-fixed-top.css');
	wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css');

	// Javascripts
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true);
	wp_enqueue_script('ie10-js', get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js', array('jquery'), '', true);
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
		'before_widget' => '<div>',
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

class Twbs_Walker extends Walker_Nav_Menu
{
	function start_el(&$output, $object, $depth = 0, $args = Array(), $current_object_id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		// If the item has children, add the dropdown class for bootstrap
		if ( $args->has_children ) $class_names = "dropdown ";

		$classes = empty( $object->classes ) ? array() : (array) $object->classes;

		$class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
		$attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
		$attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
		$attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';

		// if the item has children add these two attributes to the anchor tag
		if ($args->has_children) $attributes .= ' class="dropdown-toggle" data-toggle="dropdown"';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before.apply_filters('the_title', $object->title, $object->ID);
		$item_output .= $args->link_after;

		// if the item has children add the caret just before closing the anchor tag
		if ($args->has_children) $item_output .= ' <span class="caret"></span></a>';
		else $item_output .= '</a>';

		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $object, $depth, $args);
	} // end start_el function

	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}

	function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output){
		$id_field = $this->db_fields['id'];
		if (is_object($args[0])) $args[0]->has_children = !empty($children_elements[$element->$id_field]);
		
		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}