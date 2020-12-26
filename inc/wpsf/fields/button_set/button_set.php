<?php if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access directly.
/**
 *
 * Field: button_set
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
// if ( ! class_exists( 'CSF _Field_button_set' ) ) {
class WPSFramework_Option_button_set extends WPSFramework_Options {


	public function __construct( $field, $value = '', $unique = '' ) {

		parent::__construct( $field, $value, $unique );
	}

	public function output() {

		$args = wp_parse_args(
			$this->field,
			array(
				'multiple'   => false,
				'options'    => array(),
				'query_args' => array(),
			)
		);

		$value = ( is_array( $this->value ) ) ? $this->value : array_filter( (array) $this->value );

		echo $this->element_before();

		if ( isset( $this->field['options'] ) ) {

			$options = $this->field['options'];
			$options = ( is_array( $options ) ) ? $options : array_filter( $this->element_data( $options, false, $args['query_args'] ) );

			if ( is_array( $options ) && ! empty( $options ) ) {

				echo '<div' . $this->element_class() . 'data-multiple="' . esc_attr( $args['multiple'] ) . '">';

				foreach ( $options as $key => $option ) {

					$type    = ( $args['multiple'] ) ? 'checkbox' : 'radio';
					$extra   = ( $args['multiple'] ) ? '[]' : '';
					$active  = ( in_array( $key, $value ) || ( empty( $value ) && empty( $key ) ) ) ? ' csf--active' : '';
					$checked = ( in_array( $key, $value ) || ( empty( $value ) && empty( $key ) ) ) ? ' checked' : '';

					echo '<div class="csf--sibling csf--button' . esc_attr( $active ) . '">';
					echo '<input type="' . $this->element_attributes() . '" name="' . esc_attr( $this->element_name() ) . '" value="' . $this->element_value() . '"' . $this->element_attributes() . esc_attr( $checked ) . '/>';
					echo wp_kses_post( $option );
					echo '</div>';

				}

				echo '</div>';

			} else {

				echo ( ! empty( $this->field['empty_message'] ) ) ? esc_attr( $this->field['empty_message'] ) : esc_html__( 'No data available.', 'lerm' );

			}
		}

		echo $this->element_after();

	}

}
// }

