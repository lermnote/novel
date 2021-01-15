<?php
/**
 * Enqueue theme styles and scripts here
 *
 * @package  Novel\Inc
 */

namespace Novel\Inc;

use Novel\Inc\Traits\Singleton;

class Enqueue {

	use Singleton;

	public function __construct() {
		$this->hooks();
	}

	public function hooks() {
		add_action( 'wp_enqueue_scripts', array( $this, 'styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	public function styles() {
		wp_enqueue_style( 'novel_style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
		wp_enqueue_style( 'bootstrap-css', LERM_URI . 'assets/css/bootstrap.css', array(), '1.0.0' );
		wp_enqueue_style( 'main-css', LERM_URI . 'assets/css/main.css', array(), '1.0.0' );
	}
	public function scripts() {
		wp_register_script( 'bootstrap-js', LERM_URI . 'assets/js/bootstrap.js', array(), '3.1.0', true );
		// wp_register_script( 'lazyload', LERM_URI . 'assets/js/lazyload.min.js', array(), '2.0.0', true );
		// wp_register_script( 'lightbox', LERM_URI . 'assets/js/ekko-lightbox.min.js', array(), '2.0.0', true );
		// wp_register_script( 'share', LERM_URI . 'assets/js/social-share.min.js', array(), wp_get_theme()->get( 'Version' ), true );
		// wp_register_script( 'qrcode', LERM_URI . 'assets/js/qrcode.min.js', array(), '2.0', true );
		// wp_register_script( 'lerm_js', LERM_URI . 'assets/js/lerm.min.js', array(), wp_get_theme()->get( 'Version' ), true );

		wp_enqueue_script( 'bootstrap-js' );

		// wp_enqueue_script( 'lazyload' );
		// wp_enqueue_script( 'lightbox' );

		// if ( is_singular( 'post' ) ) {
		// 	wp_enqueue_script( 'qrcode' );
		// 	wp_enqueue_script( 'share' );
		// }
		// wp_localize_script(
		// 	'lerm_js',
		// 	'adminajax',
		// 	array(
		// 		'url'      => admin_url( 'admin-ajax.php' ),
		// 		'nonce'    => wp_create_nonce( 'ajax_nonce' ),
		// 		'noposts'  => __( 'No older posts found', 'lerm' ),
		// 		'loadmore' => __( 'Load more', 'lerm' ),
		// 		'loading'  => '<i class="fa fa-spinner fa-spin mr-1"></i>' . __( 'Loading...', 'lerm' ),
		// 		'loggedin' => is_user_logged_in(),
		// 	)
		// );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
