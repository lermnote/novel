<?php
/**
 * Twenty Nineteen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Novel
 */
namespace Novel;

use WPOnion;
// Directory URI to the theme folder.
if ( ! defined( 'LERM_URI' ) ) {
	define( 'LERM_URI', trailingslashit( get_template_directory_uri() ) );
}

// Directory path to the theme folder.
if ( ! defined( 'LERM_DIR' ) ) {
	define( 'LERM_DIR', trailingslashit( get_template_directory() ) );
}

require_once LERM_DIR . 'inc/autoloader.php';
function lerm_get_theme_instance() {
	\Novel\Inc\THEME_SETUP::get_instance();
}
lerm_get_theme_instance();

require LERM_DIR . 'inc/wpsf/wpsf-framework-demo.php';

function novel_options( string $id, string $tag = '', $default = '' ) {

	// $args = apply_filters(
	// 	'theme_option',
	// 	[
	// 		'id'      => $id,
	// 		'tag'     => $tag,
	// 		'default' => $default,
	// 	]
	// );
	// Get theme options.
	$options = get_option( 'lerm_theme_options' );
	if ( ! array_key_exists( $id, $options ) ) {
		return;
	}

	if ( is_array( $options[ $id ] ) ) {
		if ( ! empty( $tag ) && array_key_exists( $tag, $options[ $id ] ) ) {
			return $options[ $id ][ $tag ] ? $options[ $id ][ $tag ] : $default;
		} else {
			return $options[ $id ] ? $options[ $id ] : $default;
		}
	} else {
		$default = $tag;
		return $options[ $id ] ? $options[ $id ] : $default;
	}
}
function add_post_link_class( $html ) {
	return str_replace( '<a', '<a class="page-link"', $html );
}
add_filter( 'next_post_link', 'Novel\add_post_link_class', 10, 1 );
add_filter( 'previous_post_link', 'Novel\add_post_link_class', 10, 1 );




// create a book custom post type
$books = new \Novel\Inc\Custom_Post_Type(
	'chapter',
	array(
		'menu_icon' => 'dashicons-book',
		// 'public'             => true,
		// 'publicly_queryable' => true,
		// 'show_ui'            => true,
		// 'show_in_menu'       => true,
		// 'query_var'          => true,
		// 'rewrite'            => array( 'slug' => 'novel' ),
		// 'has_archive'        => true,
		// 'hierarchical'       => true,
		// 'menu_position'      => 20,
		// 'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'comments' ),

		// 'show_in_rest'       => true,
	)
);

// create a novel taxonomy
$books->register_taxonomy(
	'volume',
	array(
		'has_archive'        => false,
		'publicly_queryable' => false,
	)
);
$books->register_taxonomy( 'novel' );
$books->register_taxonomy( 'post_tag' );
$books->columns(
	array(
		'cb'     => '<input type="checkbox" />',
		'title'  => __( 'Title', 'novel' ),
		'novel'  => __( 'Novels', 'novel' ),
		'volume' => __( 'Volumes', 'novel' ),
		'date'   => __( 'Date', 'novel' ),
	)
);

// make rating and price columns sortable
$books->sortable(
	array(
		'volume' => array( 'volume', true ),
		'novel'  => array( 'novel', true ),
	)
);
function after_wponion_loaded() {

	require_once __DIR__ . '/inc/wponion/config/fields.php';
	require_once __DIR__ . '/inc/wponion/config/settings.php';
	require_once __DIR__ . '/inc/wponion/config/cpt.php';

}
add_action( 'wponion/loaded', 'Novel\after_wponion_loaded' );
require_once __DIR__ . '/inc/wponion/wponion.php';

