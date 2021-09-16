<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.
/**
 *
 * Field: switcher
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! class_exists( 'SP_WPCF_Field_switcherf' ) ) {
	class SP_WPCF_Field_switcherf extends SP_WPCF_Fields {

		/**
		 * Switcherf field constructor.
		 *
		 * @param array  $field The field type.
		 * @param string $value The values of the field.
		 * @param string $unique The unique ID for the field.
		 * @param string $where To where show the output CSS.
		 * @param string $parent The parent args.
		 */
		public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
			parent::__construct( $field, $value, $unique, $where, $parent );
		}

		/**
		 * Render field
		 *
		 * @return void
		 */
		public function render() {

			$text_off   = ( ! empty( $this->field['text_off'] ) ) ? $this->field['text_off'] : esc_html__( 'Off', 'wp-carousel-free' );
			$text_width = ( ! empty( $this->field['text_width'] ) ) ? ' style="width: ' . $this->field['text_width'] . 'px;"' : '';

			echo wp_kses_post( $this->field_before() );

			echo wp_kses_post( '<div class="spf--switcher"' . $text_width . '>' );
			echo '<span class="spf--off">' . esc_html( $text_off ) . '</span>';
			echo '<span class="spf--ball"></span>';
			echo '<input type="text" name="' . esc_attr( $this->field_name() ) . '" value="' . esc_attr( $this->value ) . '"' . $this->field_attributes() . ' />'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '</div>';

			echo ( ! empty( $this->field['label'] ) ) ? '<span class="spf--label">' . esc_html( $this->field['label'] ) . '</span>' : '';

			echo '<div class="clear"></div>';

			echo wp_kses_post( $this->field_after() );

		}

	}
}
