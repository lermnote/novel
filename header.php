<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Novel
 */
$options = get_option( 'lerm_theme_options' );
// var_dump();
$carousel = new \Novel\Inc\Carousel( array( 'slides' => $options['lerm_slides'] ) );
?>
<!doctype html>
<html <?php language_attributes(); ?> <?php //twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'twentytwentyone' ); ?></a>

	<?php get_template_part( 'template-parts/header/site-header' ); ?>

	<div id="content" class="site-content">
		<?php if( is_home() && ! is_paged() ) { ?>
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<?php $carousel->render(); ?>
					</div>
					<div class="col-md-4">
						<?php dynamic_sidebar('sidebar-header'); ?>
					</div>
				</div>
			</div>
		<?php } ?>
		<div id="primary" class="content-area">
			<main id="main" class="container" role="main">
