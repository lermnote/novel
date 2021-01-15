<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card-body p-5'); ?>>
	<!-- <div class="card-body p-5"> -->
		<header class="entry-header text-center mb-4">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<p class="card-text">
				<small class="text-muted">
					<span>作者：<a href="#">金庸</a></span>
					<span>Last updated 3 mins ago</span>
				</small>
			</p>
		</header>

		<div class="entry-content">
			<?php
			the_content();

			// wp_link_pages(
			// 	array(
			// 		'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
			// 		'after'    => '</nav>',
			// 		/* translators: %: page number. */
			// 		'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
			// 	)
			// );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer default-max-width">
			
		</footer><!-- .entry-footer -->
	<!-- </div> -->
</article><!-- #post-${ID} -->
