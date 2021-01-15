<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

get_header();
?>

<div class="row mb-2">
	<div class="col-md-6">
	  <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
		<div class="col p-4 d-flex flex-column position-static">
		  <strong class="d-inline-block mb-2 text-primary">World</strong>
		  <h3 class="mb-0">Featured post</h3>
		  <div class="mb-1 text-muted">Nov 12</div>
		  <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
		  <a href="#" class="stretched-link">Continue reading</a>
		</div>
		<div class="col-auto d-none d-lg-block">
		  <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

		</div>
	  </div>
	</div>
	<div class="col-md-6">
	  <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
		<div class="col p-4 d-flex flex-column position-static">
		  <strong class="d-inline-block mb-2 text-success">Design</strong>
		  <h3 class="mb-0">Post title</h3>
		  <div class="mb-1 text-muted">Nov 11</div>
		  <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
		  <a href="#" class="stretched-link">Continue reading</a>
		</div>
		<div class="col-auto d-none d-lg-block">
		  <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

		</div>
	  </div>
	</div>
  </div>
<?php

if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post();

		get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );
	}

	// Previous/next page navigation.
	//twenty_twenty_one_the_posts_navigation();

} else {

	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content-none' );

}

get_footer();
