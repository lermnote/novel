<?php
/**
 * Displays the site navigation.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

?>
<?php if ( has_nav_menu( 'primary' ) ) : ?>
	<nav id="site-navigation"  class="navbar navbar-expand-md navbar-light bg-light">
		<div class="container">
			<?php get_template_part( 'template-parts/header/site-branding' ); ?>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="main-menu">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => '',
						'items_wrap'     => '<ul id="%1$s" class="navbar-nav mb-2 mb-md-0 %2$s">%3$s</ul>',
						'fallback_cb'    => false,
						'walker'         => new \Novel\Inc\Nav_Walker(),
					)
				);
				?>
			</div>
		</div>
	</nav>
<?php endif; ?>
