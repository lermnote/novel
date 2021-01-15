<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col'); ?>>

	<?php get_template_part( 'template-parts/header/excerpt-header', get_post_format() ); ?>

</article><!-- #post-${ID} -->
