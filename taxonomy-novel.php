<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

get_header();
$archive_title = get_the_archive_title();
$description   = get_the_archive_description();
$novel         = get_queried_object();
$r             = new WP_Query(
	array(
		'post_type'      => 'chapter',
		'tax_query'      => array(
			array(
				'taxonomy' => 'novel',
				'field'    => 'slug',
				'terms'    => $novel->slug,
			),
		),
		'posts_per_page' => 1,
		'post_status'    => 'publish',
		'no_found_rows'  => true,
	)
);
//Novel meta
$meta   = get_term_meta( $novel->term_id, 'novel_cat_options', true );
$image  = wp_get_attachment_image_src( $meta['novel_cover_image'], 'full' );
$src    = $image ? $image[0] : '';
$width  = $image ? $image[1] : '';
$height = $image ? $image[2] : '';
?>

<?php if ( have_posts() ) : ?>

	<header class="page-header alignwide card mb-3">
		<div class="row g-0 p-3">
			<div class="col-4 col-lg-auto mb-3 mb-md-0">
				<img class="border border-1 rounded img-fluid" src="<?php echo esc_url( $src ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" alt="<?php echo esc_attr( $description ); ?>">
			</div>
			<div class="col-8">
				<div class="d-flex flex-column ps-3 justify-content-between">
					<header>
						<?php the_archive_title( '<h1 class="page-title mb-3">', '</h1>' ); ?>
						<div class="novel-meta  mb-3">
							<span class="badge bg-primary"><?php echo $meta['novel_status']; ?></span>
							<span class="badge bg-secondary">现代武侠</span>
							<span class="badge bg-success">流川枫</span>
							<span class="badge bg-danger">Danger</span>
						</div>
					</header>
					<div class="cat-meta mb-3">
						<span class="">作者：</span><span class="">沫若不闻</span>
					</div>
					<?php if ( $description ) : ?>
						<div class="archive-description d-none d-md-block"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
					<?php endif; ?>
					<div class="d-none d-md-flex justify-content-between">
						<a href="#" class="btn btn-primary btn-sm" role="button" data-bs-toggle="button">开始阅读</a>
						<a href="#" class="btn btn-primary btn-sm" role="button" data-bs-toggle="button" aria-pressed="true">加入书架</a>
						<a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">全部章节</a>
					</div>
				</div>
			</div>
			<?php if ( $description ) : ?>
				<h3 class="fw-bolder d-block d-md-none">作品简介</h3>
						<div class="archive-description d-block d-md-none"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
					<?php endif; ?>
			<div class="d-flex d-md-none justify-content-between">
				<a href="#" class="btn btn-primary btn-sm" role="button" data-bs-toggle="button">开始阅读</a>
				<a href="#" class="btn btn-primary btn-sm" role="button" data-bs-toggle="button" aria-pressed="true">加入书架</a>
				<a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">全部章节</a>
			</div>
		</div>
	</header><!-- .page-header -->
	<div class="card p-3 mb-3">
		<?php
		while ( $r->have_posts() ) :
			$r->the_post();
			get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );
			endwhile;
		?>
	</div>
	<?php
	$volumes = get_terms(
		array(
			'taxonomy' => 'volume',
		)
	);
	foreach ( $volumes as $volume ) {
		$chapter = new WP_Query(
			array(
				'post_type' => 'chapter',
				'tax_query' => array(
					array(
						'taxonomy' => 'volume',
						'field'    => 'slug',
						'terms'    => $volume->slug,
					),
					array(
						'taxonomy' => 'novel',
						'field'    => 'slug',
						'terms'    => $novel->slug,
					),
				),
			)
		);
		?>

	<div class="collapse card mb-3" id="collapseExample">
		<header class="card-header d-flex justify-content-between">
			<strong><?php echo esc_attr( $volume->name ); ?> ~ 共<?php echo esc_attr( $chapter->post_count ); ?>章 </strong>
			<span>
				正序
			</span>
		</header>
		<div class="card-body row row-cols-1 row-cols-md-3 g-4">
			<?php
			while ( $chapter->have_posts() ) :
				?>
				<?php $chapter->the_post(); ?>
				<?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'title' ) ); ?>
			<?php endwhile; ?>
		</div>
	</div>
		<?php } ?>

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>
