<?php
/**
 * @author lerm http://lerm.net
 * @date   2016-08-27
 * @since  lerm 2.0
 *
 * Display lerm_slides on Home page
 */
namespace Novel\Inc;

use Novel\Inc\Traits\Singleton;

class Carousel {

	use Singleton;

	public $slides = array();

	public function __construct( $args = array() ) {
		$defaults = array(
			// 'slides'         => lerm_options( 'lerm_slides' )? '':'',
			// 'indicators'     => lerm_options( 'slide_indicators' ),
			// 'control_arrows' => lerm_options( 'slide_control' ),
			'slides'         => '',
			'indicators'     => '',
			'control_arrows' => '',
		);
		// Parse the arguments with the deaults.
		$this->args = apply_filters( 'lerm_slide_args', wp_parse_args( $args, $defaults ) );
		$this->get();
	}

	private function get() {
		$all_slides = $this->args['slides'];
		$sort       = 0;
        $slides     = array();
		if ( $all_slides ) {
			foreach ( $all_slides as $slide ) {
				// $attachment = wp_get_attachment_image_src( $slide['image'], 'full' );
                // var_dump($attachment);
				if ( ! empty( $slide['image'] ) ) {
					$slides[ $sort ] = $slide;
					$sort++;
				}
			}
			$this->slides = $slides;
		}
	}

	public function render() {
		$indicator = '';
		$carousel  = '';
		if ( $this->slides ) {
			foreach ( $this->slides as $key => $slide ) {
				$attachment = wp_get_attachment_image_src( $slide['image'], 'full' );
				$active     = ( 0 === $key ) ? ' active' : '';
				$indicator .= sprintf( '<li data-target="#lermSlides" data-slide-to="%s" class="%s"></li>', $key, $active );
				$image      = sprintf( '<img class="d-block img-fluid w-100 rounded slider " src="%1$s" alt="%2$s" width="%3$s" height="%4$s">', $attachment[0], $attachment[0], $attachment[1], $attachment[2] );
				$link       = sprintf( '<a href="%1$s" title="%2$s">%3$s</a>', $slide['url'], $slide['title'], $image );
				$title      = sprintf( '<div class="carousel-caption">%1$s%2$s</div>', $slide['title'] ? '<h5>' . $slide['title'] . '</h5>' : '', $slide['description'] ? '<p>' . $slide['description'] . '</p>' : '' );
				$carousel  .= sprintf( '<div class="carousel-item%1$s">%2$s%3$s</div>', $active, $slide['url'] ? $link : $image, $title );
			}
			?>
			<div id="lermSlides" class="carousel slide carousel-fade mb-3" data-ride="carousel">
				<?php if ( $this->args['indicators'] ) { ?>
					<ol class="carousel-indicators mb-0">
						<?php echo $indicator; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</ol>
				<?php } ?>
				<div class="carousel-inner">
					<?php echo $carousel; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</div>
				<?php if ( $this->args['control_arrows'] ) { ?>
					<a class="carousel-control-prev d-none d-md-flex" href="#lermSlides" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="screen-reader-text">Previous</span>
					</a>
					<a class="carousel-control-next d-none d-md-flex" href="#lermSlides" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="screen-reader-text">Next</span>
					</a>
				<?php } ?>
			</div>
			<?php
		}
	}
}
