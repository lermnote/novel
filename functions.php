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

// require_once LERM_DIR . 'inc/autoloader.php';
// function lerm_get_theme_instance() {
// 	\Novel\Inc\THEME_SETUP::get_instance();
// }
// lerm_get_theme_instance();
// // create a book custom post type
// $books = new \Novel\Inc\Custom_Post_Type( 'book' );


// // create a genre taxonomy
// $books->register_taxonomy( 'genre' );


// // define the columns to appear on the admin edit screen
// $books->columns(
// 	array(
// 		'cb'     => '<input type="checkbox" />',
// 		'title'  => __( 'Title' ),
// 		'genre'  => __( 'Genres' ),
// 		'price'  => __( 'Price' ),
// 		'rating' => __( 'Rating' ),
// 		'date'   => __( 'Date' ),
// 	)
// );


// // populate the price column
// // $books->populate_column('price', function($column, $post) {

// //     echo "£" . get_field('price'); // ACF get_field() function

// // });


// // // populate the ratings column
// // $books->populate_column('rating', function($column, $post) {

// //     echo get_field('rating') . '/5'; // ACF get_field() function

// // });


// // make rating and price columns sortable
// $books->sortable(
// 	array(
// 		'price'  => array( 'price', true ),
// 		'rating' => array( 'rating', true ),
// 	)
// );


// use "pages" icon for post type
// $books->menu_icon( 'dashicons-book-alt' );


// require __DIR__ . '/inc/dev/wponion.php';
// require __DIR__ . '/inc/dev/index.php';

// require __DIR__ . '/inc/test/stable/wponion.php';
// add_action( 'wponion/loaded', 'novel_after_wponion_loaded' );
// function novel_after_wponion_loaded($file) {
// 		var_dump( 'dddddd' );
// 	//  include __DIR__ . '/inc/wponion/sample/settings.php';
// 	//  include __DIR__ . '/inc/wponion/sample/dashboard-widgets.php';
// 	//  include __DIR__ . '/inc/wponion/sample/taxonomy.php';
// }
// require __DIR__ . '/inc/stable/index.php';
// require_once LERM_DIR . 'inc/wpsf/wpsf-framework.php';

require LERM_DIR . 'inc/wpsf/wpsf-framework-demo.php';
