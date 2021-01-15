<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Novel
 */

get_header();
?>
<div class="row">
	<div class="col-12 col-md-8 offset-md-2 card">
		<?php

		if ( have_posts() ) {

			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/content', 'single' );
			}
		}

		?>
		<nav aria-label="Page navigation">
			<ul class="pagination justify-content-around fs-5 mb-4">
				<li class="page-item">
					<?php previous_post_link( '%link', '%title', true, '', 'novel' ); ?>
				</li>
				<li class="page-item"><a class="page-link" href="#">目录</a></li>
				<li class="page-item">
					<?php next_post_link( '%link', '%title', true, '', 'novel' ); ?>
				</li>
			</ul>
		</nav>
	</div>
</div>

<?php get_footer(); ?>
