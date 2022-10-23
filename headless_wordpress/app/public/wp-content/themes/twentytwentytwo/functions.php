<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

// Register Custom Post Type
function add_videos_cpt() {

	$labels = array(
		'name'                  => 'videos',
		'singular_name'         =>  'Video',
		'menu_name'             =>  'Videos',
		'name_admin_bar'        =>  'poster',
		'archives'              =>  'Video Archives',
		'attributes'            =>  'Video Attributes',
		'parent_item_colon'     =>  'Parent Video:',
		'all_items'             =>  'All Video',
		'add_new_item'          =>  'Add New Video',
		'add_new'               =>  'Add New',
		'new_item'              =>  'New Video',
		'edit_item'             =>  'Edit Video',
		'update_item'           =>  'Update Video',
		'view_item'             =>  'View Video',
		'view_items'            =>  'View Videos',
		'search_items'          =>  'Search Videos',
		'not_found'             =>  'Not found',
		'not_found_in_trash'    =>  'Not found in Trash',
		'featured_image'        =>  'Poster image',
		'set_featured_image'    =>  'Set poster image',
		'remove_featured_image' =>  'Remove poster image',
		'use_featured_image'    =>  'Use as poster image',
		'insert_into_item'      =>  'Insert into item',
		'uploaded_to_this_item' =>  'Uploaded to this Video',
		'items_list'            =>  'Videos list',
		'items_list_navigation' =>  'Videos list navigation',
		'filter_items_list'     =>  'Filter Videos list',
	);
	$args = array(
		'label'                 => 'Video',
		'description'           => 'The site videos',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-video',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
		'show_in_graphql'       => true,
		'graphql_single_name'	=> 'video',
		'graphql_plural_name'	=> 'videos',
	);
	register_post_type( 'videos', $args );

}
add_action( 'init', 'add_videos_cpt', 0 );

// remove default Read more button from excerpt
function excerpt_read_more_link($more) {
	global $post;
	return '';
}
add_filter('excerpt_more', 'excerpt_read_more_link');