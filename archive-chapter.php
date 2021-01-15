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
$category      = get_queried_object();
var_dump($category);
$r             = new WP_Query(
	array(
		'cat'            => $category->cat_ID,
		'posts_per_page' => 1,
		'post_status'    => 'publish',
		'no_found_rows'  => true,
	)
);
//Novel meta
$meta   = get_term_meta( $category->term_id, 'novel_cat_options', true );
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
	$categories = get_categories(
		array(
			'child_of'   => $category->cat_ID,
			'hide_empty' => false,
		)
	);
	foreach ( $categories as $child_cat ) {
		$cat_post = new WP_Query(
			array(
				'cat' => $child_cat->cat_ID,
			)
		);
		?>

	<div class="collapse card mb-3" id="collapseExample">
		<header class="card-header d-flex justify-content-between">
			<strong><?php echo $child_cat->name; ?> ~ 共<?php echo $child_cat->count; ?>章 </strong>
			<span>
				正序
			</span>
		</header>
		<div class="card-body row row-cols-1 row-cols-md-3 g-4">
			<?php
			while ( $cat_post->have_posts() ) :
				?>
				<?php $cat_post->the_post(); ?>
				<?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'title' ) ); ?>
			<?php endwhile; ?>
		</div>
	</div>
	<?php } ?>

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>
