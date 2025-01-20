<?php
/**
 * Functions file for Gutenberg support.
 *
 * @package Responsive WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Function to add customizer color options to gutenberg color palette.
 */
function responsive_gutenberg_color_palette() {

	$body_typography      = get_theme_mod( 'body_typography' );
	$body_text_color      = esc_html( get_theme_mod( 'responsive_body_text_color', '#333333' ) );
	$box_background_color = esc_html( get_theme_mod( 'responsive_box_background_color', '#ffffff' ) );

	$button_color            = esc_html( get_theme_mod( 'responsive_button_color', '#0066CC' ) );
	$button_hover_color      = esc_html( get_theme_mod( 'responsive_button_hover_color', '#10659C' ) );
	$button_text_color       = esc_html( get_theme_mod( 'responsive_button_text_color', '#FFFFFF' ) );
	$button_hover_text_color = esc_html( get_theme_mod( 'responsive_button_hover_text_color', '#FFFFFF' ) );

	$responsive_gutenberg_color_options = array(

		// Button colors.
		array(
			'name'  => __( 'Button Color', 'responsive' ),
			'slug'  => 'button-color',
			'color' => $button_color,
		),
		array(
			'name'  => __( 'Button Hover Color', 'responsive' ),
			'slug'  => 'button-hover-color',
			'color' => $button_hover_color,
		),
		array(
			'name'  => __( 'Button Hover Text Color', 'responsive' ),
			'slug'  => 'button-hover-text-color',
			'color' => $button_hover_text_color,
		),
		array(
			'name'  => __( 'Button Text Color', 'responsive' ),
			'slug'  => 'button-text-color',
			'color' => $button_text_color,
		),

		// Blog Post Background Color.
		array(
			'name'  => __( 'Text color', 'responsive' ),
			'slug'  => 'responsive-container-background-color',
			'color' => $body_text_color,
		),

		// Container Background Color.
		array(
			'name'  => __( 'Container Background Color', 'responsive' ),
			'slug'  => 'responsive-main-container-background-color',
			'color' => $box_background_color,
		),
	);

	return $responsive_gutenberg_color_options;
}

/**
 * Add custom color classes to Gutenberg
 *
 * @param array $responsive_gutenberg_color_options List of customizer color options for Gutenberg editor.
 */
function responsive_gutenberg_colors( $responsive_gutenberg_color_options ) {

	if ( empty( $responsive_gutenberg_color_options ) ) {
		return;
	}
	$css = '';
	foreach ( $responsive_gutenberg_color_options as $color ) {
		if ( ! empty( $color['color'] ) ) {
			$custom_color = get_theme_mod( $color['slug'], $color['color'] );
			$css         .= ':root .has-' . $color['slug'] . '-color { color: ' . esc_attr( $custom_color ) . '; }';
			$css         .= ':root .has-' . $color['slug'] . '-background-color { background-color: ' . esc_attr( $custom_color ) . '; }';
		}
	}
	return wp_strip_all_tags( $css );
}

/**
 * [customizer_css description].
 *
 * @return string.
 */
function responsive_gutenberg_customizer_css() {
	$body_text_color = esc_html( get_theme_mod( 'responsive_body_text_color', '#333333' ) );

	$link_color       = esc_html( get_theme_mod( 'responsive_link_color', '#0066CC' ) );
	$link_hover_color = esc_html( get_theme_mod( 'responsive_link_hover_color', '#10659C' ) );

	$button_color              = esc_html( get_theme_mod( 'responsive_button_color', '#0066CC' ) );
	$button_hover_color        = esc_html( get_theme_mod( 'responsive_button_hover_color', '#10659C' ) );
	$button_text_color         = esc_html( get_theme_mod( 'responsive_button_text_color', '#FFFFFF' ) );
	$button_hover_text_color   = esc_html( get_theme_mod( 'responsive_button_hover_text_color', '#FFFFFF' ) );
	$button_border_color       = esc_html( get_theme_mod( 'responsive_button_border_color', '#10659C' ) );
	$button_hover_border_color = esc_html( get_theme_mod( 'responsive_button_hover_border_color', '#0066CC' ) );

	$buttons_padding_right  = esc_html( get_theme_mod( 'responsive_buttons_right_padding', 10 ) );
	$buttons_padding_left   = esc_html( get_theme_mod( 'responsive_buttons_left_padding', 10 ) );
	$buttons_padding_top    = esc_html( get_theme_mod( 'responsive_buttons_top_padding', 10 ) );
	$buttons_padding_bottom = esc_html( get_theme_mod( 'responsive_buttons_bottom_padding', 10 ) );

	$buttons_tablet_padding_right  = esc_html( get_theme_mod( 'responsive_buttons_tablet_right_padding', 10 ) );
	$buttons_tablet_padding_left   = esc_html( get_theme_mod( 'responsive_buttons_tablet_left_padding', 10 ) );
	$buttons_tablet_padding_top    = esc_html( get_theme_mod( 'responsive_buttons_tablet_top_padding', 10 ) );
	$buttons_tablet_padding_bottom = esc_html( get_theme_mod( 'responsive_buttons_tablet_bottom_padding', 10 ) );

	$buttons_mobile_padding_right  = esc_html( get_theme_mod( 'responsive_buttons_mobile_right_padding', 10 ) );
	$buttons_mobile_padding_left   = esc_html( get_theme_mod( 'responsive_buttons_mobile_left_padding', 10 ) );
	$buttons_mobile_padding_top    = esc_html( get_theme_mod( 'responsive_buttons_mobile_top_padding', 10 ) );
	$buttons_mobile_padding_bottom = esc_html( get_theme_mod( 'responsive_buttons_mobile_bottom_padding', 10 ) );
	$buttons_border_width          = esc_html( get_theme_mod( 'responsive_buttons_border_width', 1 ) );

	$box_background_color = esc_html( get_theme_mod( 'responsive_box_background_color', '#ffffff' ) );
	$alt_background_color = esc_html( get_theme_mod( 'responsive_alt_background_color', '#eaeaea' ) );

	// button desktop border radius
	$button_top_left_radius            = esc_html( get_theme_mod( 'responsive_buttons_radius_top_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_top_right_radius           = esc_html( get_theme_mod( 'responsive_buttons_radius_top_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_bottom_right_radius        = esc_html( get_theme_mod( 'responsive_buttons_radius_bottom_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_bottom_left_radius         = esc_html( get_theme_mod( 'responsive_buttons_radius_bottom_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	// Tablet button radius.
	$button_tablet_top_left_radius     = esc_html( get_theme_mod( 'responsive_buttons_radius_tablet_top_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_tablet_top_right_radius    = esc_html( get_theme_mod( 'responsive_buttons_radius_tablet_top_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_tablet_bottom_right_radius = esc_html( get_theme_mod( 'responsive_buttons_radius_tablet_bottom_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_tablet_bottom_left_radius  = esc_html( get_theme_mod( 'responsive_buttons_radius_tablet_bottom_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );

	// Mobile button radius.
	$button_mobile_top_left_radius     = esc_html( get_theme_mod( 'responsive_buttons_radius_mobile_top_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_mobile_top_right_radius    = esc_html( get_theme_mod( 'responsive_buttons_radius_mobile_top_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_mobile_bottom_right_radius = esc_html( get_theme_mod( 'responsive_buttons_radius_mobile_bottom_right_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );
	$button_mobile_bottom_left_radius  = esc_html( get_theme_mod( 'responsive_buttons_radius_mobile_bottom_left_radius', Responsive\Core\get_responsive_customizer_defaults( 'responsive_buttons_radius' ) ) );

	$button_background_image           = get_theme_mod( 'responsive_button_background_image_toggle' ) ? esc_url( get_theme_mod( 'responsive_button_background_image' ) ) : null ;
	$button_typography                 = get_theme_mod( 'button_typography');
	$button_tablet_typography          = get_theme_mod( 'button_tablet_typography' );
	$button_mobile_typography          = get_theme_mod( 'button_mobile_typography' );

	$inputs_border_color               = esc_html( get_theme_mod( 'responsive_inputs_border_color', Responsive\Core\get_responsive_customizer_defaults( 'inputs_border' ) ) );
	$inputs_text_color                 = esc_html( get_theme_mod( 'responsive_inputs_text_color', Responsive\Core\get_responsive_customizer_defaults( 'inputs_text' ) ) );
	$inputs_background_color           = esc_html( get_theme_mod( 'responsive_inputs_background_color', Responsive\Core\get_responsive_customizer_defaults( 'inputs_background' ) ) );

	$label_color                       = esc_html( get_theme_mod( 'responsive_label_color', Responsive\Core\get_responsive_customizer_defaults( 'label' ) ) );
	// Input fields padding.
	$inputs_padding_right              = esc_html( get_theme_mod( 'responsive_inputs_right_padding', 3 ) );
	$inputs_padding_left               = esc_html( get_theme_mod( 'responsive_inputs_left_padding', 3 ) );
	$inputs_padding_top                = esc_html( get_theme_mod( 'responsive_inputs_top_padding', 3 ) );
	$inputs_padding_bottom             = esc_html( get_theme_mod( 'responsive_inputs_bottom_padding', 3 ) );

	$inputs_tablet_padding_right       = esc_html( get_theme_mod( 'responsive_inputs_tablet_right_padding', 3 ) );
	$inputs_tablet_padding_left        = esc_html( get_theme_mod( 'responsive_inputs_tablet_left_padding', 3 ) );
	$inputs_tablet_padding_top         = esc_html( get_theme_mod( 'responsive_inputs_tablet_top_padding', 3 ) );
	$inputs_tablet_padding_bottom      = esc_html( get_theme_mod( 'responsive_inputs_tablet_bottom_padding', 3 ) );

	$inputs_mobile_padding_right       = esc_html( get_theme_mod( 'responsive_inputs_mobile_right_padding', 3 ) );
	$inputs_mobile_padding_left        = esc_html( get_theme_mod( 'responsive_inputs_mobile_left_padding', 3 ) );
	$inputs_mobile_padding_top         = esc_html( get_theme_mod( 'responsive_inputs_mobile_top_padding', 3 ) );
	$inputs_mobile_padding_bottom      = esc_html( get_theme_mod( 'responsive_inputs_mobile_bottom_padding', 3 ) );

	// Input fields border radius.
	$inputs_top_left_radius            = esc_html( get_theme_mod( 'responsive_inputs_radius_top_left_radius', 0 ) );
	$inputs_top_right_radius           = esc_html( get_theme_mod( 'responsive_inputs_radius_top_right_radius', 0 ) );
	$inputs_bottom_right_radius        = esc_html( get_theme_mod( 'responsive_inputs_radius_bottom_right_radius', 0 ) );
	$inputs_bottom_left_radius         = esc_html( get_theme_mod( 'responsive_inputs_radius_bottom_left_radius', 0 ) );

	$inputs_tablet_top_left_radius     = esc_html( get_theme_mod( 'responsive_inputs_radius_tablet_top_left_radius', 0 ) );
	$inputs_tablet_top_right_radius    = esc_html( get_theme_mod( 'responsive_inputs_radius_tablet_top_right_radius', 0 ) );
	$inputs_tablet_bottom_right_radius = esc_html( get_theme_mod( 'responsive_inputs_radius_tablet_bottom_right_radius', 0 ) );
	$inputs_tablet_bottom_left_radius  = esc_html( get_theme_mod( 'responsive_inputs_radius_tablet_bottom_left_radius', 0 ) );

	$inputs_mobile_top_left_radius     = esc_html( get_theme_mod( 'responsive_inputs_radius_mobile_top_left_radius', 0 ) );
	$inputs_mobile_top_right_radius    = esc_html( get_theme_mod( 'responsive_inputs_radius_mobile_top_right_radius', 0 ) );
	$inputs_mobile_bottom_right_radius = esc_html( get_theme_mod( 'responsive_inputs_radius_mobile_bottom_right_radius', 0 ) );
	$inputs_mobile_bottom_left_radius  = esc_html( get_theme_mod( 'responsive_inputs_radius_mobile_bottom_left_radius', 0 ) );

	// Inputs Border width.
	$input_border_top_width            = esc_html( get_theme_mod( 'responsive_inputs_border_width_top_border', 1 ) );
	$input_border_right_width          = esc_html( get_theme_mod( 'responsive_inputs_border_width_right_border', 1 ) );
	$input_border_bottom_width         = esc_html( get_theme_mod( 'responsive_inputs_border_width_bottom_border', 1 ) );
	$input_border_left_width           = esc_html( get_theme_mod( 'responsive_inputs_border_width_left_border', 1 ) );

	$input_border_tablet_top_width     = esc_html( get_theme_mod( 'responsive_inputs_border_width_tablet_top_border', 1 ) );
	$input_border_tablet_right_width   = esc_html( get_theme_mod( 'responsive_inputs_border_width_tablet_right_border', 1 ) );
	$input_border_tablet_bottom_width  = esc_html( get_theme_mod( 'responsive_inputs_border_width_tablet_bottom_border', 1 ) );
	$input_border_tablet_left_width    = esc_html( get_theme_mod( 'responsive_inputs_border_width_tablet_left_border', 1 ) );

	$input_border_mobile_top_width     = esc_html( get_theme_mod( 'responsive_inputs_border_width_mobile_top_border', 1 ) );
	$input_border_mobile_right_width   = esc_html( get_theme_mod( 'responsive_inputs_border_width_mobile_right_border', 1 ) );
	$input_border_mobile_bottom_width  = esc_html( get_theme_mod( 'responsive_inputs_border_width_mobile_bottom_border', 1 ) );
	$input_border_mobile_left_width    = esc_html( get_theme_mod( 'responsive_inputs_border_width_mobile_left_border', 1 ) );
	// Form Fields -> Label Color.
	$label_color                       = esc_html( get_theme_mod( 'responsive_label_color', Responsive\Core\get_responsive_customizer_defaults( 'label' ) ) );
	$inputs_background_image           = get_theme_mod( 'responsive_inputs_background_image_toggle' ) ? esc_url( get_theme_mod( 'responsive_inputs_background_image' ) ) : null ;
	$input_typography                  = get_theme_mod( 'input_typography');
	$input_tablet_typography           = get_theme_mod( 'input_tablet_typography' );
	$input_mobile_typography           = get_theme_mod( 'input_mobile_typography' );

	$alt_background_color              = esc_html( get_theme_mod( 'responsive_alt_background_color', Responsive\Core\get_responsive_customizer_defaults( 'alt_background' ) ) );

	$body_typography                   = get_theme_mod( 'body_typography' );
	$body_tablet_typography            = get_theme_mod( 'body_tablet_typography' );
	$body_mobile_typography            = get_theme_mod( 'body_mobile_typography' );
	// h1 typography.
	for ( $i=1; $i<7; $i++ ) {
		${"h{$i}_typography"}          = get_theme_mod( "heading_h{$i}_typography" );
		${"h{$i}_tablet_typography"}   = get_theme_mod( "heading_h{$i}_tablet_typography" );
		${"h{$i}_mobile_typography"}   = get_theme_mod( "heading_h{$i}_mobile_typography" );
	}
	// All headings typography
	$all_headings_typography           = get_theme_mod( 'headings_typography' );

	$custom_css = '';

	$block_editor_form_fields_css_selector = '
	.editor-styles-wrapper select,
	.editor-styles-wrapper textarea:not(.block-editor-plain-text),
	.editor-styles-wrapper input[type=tel],
	.editor-styles-wrapper input[type=email],
	.editor-styles-wrapper input[type=number],
	.editor-styles-wrapper input[type=search],
	.editor-styles-wrapper input[type=text],
	.editor-styles-wrapper input[type=date],
	.editor-styles-wrapper input[type=datetime],
	.editor-styles-wrapper input[type=datetime-local],
	.editor-styles-wrapper input[type=month],
	.editor-styles-wrapper input[type=password],
	.editor-styles-wrapper input[type=range],
	.editor-styles-wrapper input[type=time],
	.editor-styles-wrapper input[type=url],
	.editor-styles-wrapper input[type=week],
	.editor-styles-wrapper div.wpforms-container-full .wpforms-form input[type=date],
	.editor-styles-wrapper div.wpforms-container-full .wpforms-form input[type=datetime],
	.editor-styles-wrapper div.wpforms-container-full .wpforms-form input[type=datetime-local],
	.editor-styles-wrapper div.wpforms-container-full .wpforms-form input[type=email],
	.editor-styles-wrapper div.wpforms-container-full .wpforms-form input[type=month],
	.editor-styles-wrapper div.wpforms-container-full .wpforms-form input[type=number],
	.editor-styles-wrapper div.wpforms-container-full .wpforms-form input[type=password],
	.editor-styles-wrapper div.wpforms-container-full .wpforms-form input[type=range],
	.editor-styles-wrapper div.wpforms-container-full .wpforms-form input[type=search],
	.editor-styles-wrapper div.wpforms-container-full .wpforms-form input[type=tel],
	.editor-styles-wrapper div.wpforms-container-full .wpforms-form input[type=text],
	.editor-styles-wrapper div.wpforms-container-full .wpforms-form input[type=time],
	.editor-styles-wrapper div.wpforms-container-full .wpforms-form input[type=url],
	.editor-styles-wrapper div.wpforms-container-full .wpforms-form input[type=week],
	.editor-styles-wrapper div.wpforms-container-full .wpforms-form select,
	.editor-styles-wrapper div.wpforms-container-full .wpforms-form textarea';

	$block_editor_body_selector         = '.edit-post-visual-editor .editor-styles-wrapper, .block-editor-iframe__body.editor-styles-wrapper';
	$block_editor_h1_selector           = '.editor-styles-wrapper h1';
	$block_editor_h2_selector           = '.editor-styles-wrapper h2';
	$block_editor_h3_selector           = '.editor-styles-wrapper h3';
	$block_editor_h4_selector           = '.editor-styles-wrapper h4';
	$block_editor_h5_selector           = '.editor-styles-wrapper h5';
	$block_editor_h6_selector           = '.editor-styles-wrapper h6';
	$block_editor_all_headings_selector = '.editor-styles-wrapper h1,.editor-styles-wrapper h2,.editor-styles-wrapper h3,.editor-styles-wrapper h4,.editor-styles-wrapper h5,.editor-styles-wrapper h6,.editor-styles-wrapper .h1,.editor-styles-wrapper .h2,.editor-styles-wrapper .h3,.editor-styles-wrapper .h4,.editor-styles-wrapper .h5,.editor-styles-wrapper .h6';

	for ( $i = 1; $i < 7; $i++ ) {
		$custom_css .= '
		.edit-post-visual-editor.editor-styles-wrapper .wp-block h' . $i . ',
		.wp-block-freeform.block-library-rich-text__tinymce h' . $i . ',
		.wp-block-heading h' . $i . '.editor-rich-text__tinymce {
			color: ' . esc_html( get_theme_mod( "responsive_h{$i}_text_color", '#333333' ) ) . ';
		}';

		if ( get_theme_mod( 'heading_h' . $i . '_typography' ) ) {
			foreach ( get_theme_mod( 'heading_h' . $i . '_typography' ) as $key => $value ) {
				if ( 'font-family' === $key ) {
					$custom_css .= '.has-h' . $i . '-font-family{' . $key . ':' . $value . '; }';
				}
			}
			$custom_css .= '
			.edit-post-visual-editor.editor-styles-wrapper .wp-block h' . $i . ',
			.wp-block-freeform.block-library-rich-text__tinymce h' . $i . ',
			.wp-block-heading h' . $i . '.editor-rich-text__tinymce {';

			foreach ( get_theme_mod( 'heading_h' . $i . '_typography' ) as $key => $value ) {
				$custom_css .= $key . ':' . $value . ';';
			}
			$custom_css .= '}';
		}
	}

	$custom_css .= "
	.editor-styles-wrapper,
	.wp-block-freeform,
	.editor-writing-flow {
		background-color: {$box_background_color};
		color: {$body_text_color};
	}
	
	.edit-post-visual-editor.editor-styles-wrapper .editor-block-list__layout a,
	.wp-block-freeform.block-library-rich-text__tinymce a,
	.editor-writing-flow a,
	.editor-styles-wrapper .wp-block a,
	.editor-styles-wrapper .wp-block a * {
		color:{$link_color};
		text-decoration: none;
	}
	.edit-post-visual-editor.editor-styles-wrapper{
		background-color: {$box_background_color};
	}

	.edit-post-visual-editor.editor-styles-wrapper .editor-block-list__layout a:focus,
	.edit-post-visual-editor.editor-styles-wrapper .editor-block-list__layout a:hover,
	.wp-block-freeform.block-library-rich-text__tinymce a:hover,
	.wp-block-freeform.block-library-rich-text__tinymce a:focus,
	.editor-writing-flow a:hover,
	.editor-writing-flow a:focus{
		color: {$link_hover_color};
	}

	.edit-post-visual-editor.editor-styles-wrapper blockquote,
	.edit-post-visual-editor.editor-styles-wrapper blockquote p,
	.edit-post-visual-editor.editor-styles-wrapper .wp-block-quote,
	.wp-block-freeform.block-library-rich-text__tinymce code,
	.edit-post-visual-editor.editor-styles-wrapper .wp-block-freeform.block-library-rich-text__tinymce pre,
	.edit-post-visual-editor.editor-styles-wrapper .wp-block-preformatted pre,
	.edit-post-visual-editor.editor-styles-wrapper .wp-block-code .block-editor-plain-text,
	.edit-post-visual-editor.editor-styles-wrapper .wp-block-verse pre,
	.edit-post-visual-editor.editor-styles-wrapper pre {
    	background: {$alt_background_color};
	}";

	$custom_css .= '
	.editor-styles-wrapper .wp-block-button__link,
	.editor-styles-wrapper .wp-block-file__button,
	.editor-styles-wrapper .wp-block-search__button,
	.editor-styles-wrapper button{
		background-color:' . $button_color . ';
		border: ' . $buttons_border_width . 'px solid ' . $button_border_color . ';
		border-radius:' . responsive_spacing_css( $button_top_left_radius, $button_top_right_radius, $button_bottom_right_radius, $button_bottom_left_radius ) . ';
	    color: ' . $button_text_color . ';
		padding: ' . responsive_spacing_css( $buttons_padding_top, $buttons_padding_right, $buttons_padding_bottom, $buttons_padding_left ) . ';
    }

	.wp-block-search__button{
		padding: ' . responsive_spacing_css( $buttons_padding_top, $buttons_padding_right, $buttons_padding_bottom, $buttons_padding_left ) . ';
    }

	.responsive-block-editor-addons-buttons-repeater.responsive-block-editor-addons-button__wrapper > .not-inherited-from-theme {
		color: ' . $button_text_color . ';
	}

	.responsive-block-editor-addons-buttons-repeater.responsive-block-editor-addons-button__wrapper.wp-block-button__link {
		background-color: ' . $button_color . ' !important;
		border-color: ' . $button_border_color . ' !important;
	}

	.responsive-block-editor-addons-buttons-repeater.responsive-block-editor-addons-button__wrapper.wp-block-button__link > .inherited-from-theme {
		color: ' . $button_text_color . ' !important;
	}

	.responsive-block-editor-addons-buttons-repeater.responsive-block-editor-addons-button__wrapper:hover > .not-inherited-from-theme {
		color: ' . $button_hover_text_color . ';
	}

	.responsive-block-editor-addons-buttons-repeater.responsive-block-editor-addons-button__wrapper.wp-block-button__link:hover {
		background-color: ' . $button_hover_color . ' !important;
		border-color: ' . $button_hover_border_color . ' !important;
	}

	.responsive-block-editor-addons-buttons-repeater.responsive-block-editor-addons-button__wrapper.wp-block-button__link:hover > .inherited-from-theme {
		color: ' . $button_hover_text_color . ' !important;
	}

	.editor-styles-wrapper .wp-block-button__link:focus,
	.editor-styles-wrapper .wp-block-file__button:focus,
	.editor-styles-wrapper .wp-block-button__link:hover,
	.editor-styles-wrapper .wp-block-file__button:hover,
	.editor-styles-wrapper .wp-block-search__button:hover,
	.editor-styles-wrapper .wp-block-search__button:focus,
	.editor-styles-wrapper button:hover,
	.editor-styles-wrapper button:focus {
		color:' . $button_hover_text_color . ';
		border: ' . $buttons_border_width . 'px solid ' . $button_hover_border_color . ';
		background-color:' . $button_hover_color . ';
	}

	' . $block_editor_form_fields_css_selector . ' {
		color: ' . $inputs_text_color . ';
		background-color: ' . $inputs_background_color . ';
		border-color: ' . $inputs_border_color. ';
		border-top-width: '. $input_border_top_width. 'px;
		border-right-width: '. $input_border_right_width. 'px;
		border-bottom-width: '. $input_border_bottom_width. 'px;
		border-left-width: '. $input_border_left_width. 'px;
		border-radius: ' . responsive_spacing_css( $inputs_top_left_radius, $inputs_top_right_radius, $inputs_bottom_right_radius, $inputs_bottom_left_radius ) . ';
		line-height: 1.75;
		padding: ' . responsive_spacing_css( $inputs_padding_top, $inputs_padding_right, $inputs_padding_bottom, $inputs_padding_left ) . ';
		height: auto;
	}

	.editor-styles-wrapper label,
	.editor-styles-wrapper .wp-block-search__label {
		color:' . $label_color .';
	}
	address, blockquote, pre, code, kbd, tt, var {
		background-color:'. $alt_background_color .';
	}

	@media screen and ( max-width: 992px ) {
		.editor-styles-wrapper .wp-block-button__link,
		.editor-styles-wrapper .wp-block-file__button,
		.editor-styles-wrapper .wp-block-search__button,
		.editor-styles-wrapper button{
			padding: ' . responsive_spacing_css( $buttons_tablet_padding_top, $buttons_tablet_padding_right, $buttons_tablet_padding_bottom, $buttons_tablet_padding_left ) . ';
			border-radius:' . responsive_spacing_css( $button_tablet_top_left_radius, $button_tablet_top_right_radius, $button_tablet_bottom_right_radius, $button_tablet_bottom_left_radius ) . ';
		}
		' . $block_editor_form_fields_css_selector . ' {
			padding: ' . responsive_spacing_css( $inputs_tablet_padding_top, $inputs_tablet_padding_right, $inputs_tablet_padding_bottom, $inputs_tablet_padding_left ) . ';
			border-radius: ' . responsive_spacing_css( $inputs_tablet_top_left_radius, $inputs_tablet_top_right_radius, $inputs_tablet_bottom_right_radius, $inputs_tablet_bottom_left_radius ) . ';
			border-top-width: '. $input_border_tablet_top_width. 'px;
			border-right-width: '. $input_border_tablet_right_width. 'px;
			border-bottom-width: '. $input_border_tablet_bottom_width. 'px;
			border-left-width: '. $input_border_tablet_left_width. 'px;
		}
	}
	@media screen and ( max-width: 576px ) {
		.editor-styles-wrapper .wp-block-button__link,
		.editor-styles-wrapper .wp-block-file__button,
		.editor-styles-wrapper .wp-block-search__button,
		.editor-styles-wrapper button{
		    padding: ' . responsive_spacing_css( $buttons_mobile_padding_top, $buttons_mobile_padding_right, $buttons_mobile_padding_bottom, $buttons_mobile_padding_left ) . ';
			border-radius:' . responsive_spacing_css( $button_mobile_top_left_radius, $button_mobile_top_right_radius, $button_mobile_bottom_right_radius, $button_mobile_bottom_left_radius ) . ';
		}
		' . $block_editor_form_fields_css_selector . ' {
			padding: ' . responsive_spacing_css( $inputs_mobile_padding_top, $inputs_mobile_padding_right, $inputs_mobile_padding_bottom, $inputs_mobile_padding_left ) . ';
			border-radius: ' . responsive_spacing_css( $inputs_mobile_top_left_radius, $inputs_mobile_top_right_radius, $inputs_mobile_bottom_right_radius, $inputs_mobile_bottom_left_radius ) . ';
			border-top-width: '. $input_border_mobile_top_width. 'px;
			border-right-width: '. $input_border_mobile_right_width. 'px;
			border-bottom-width: '. $input_border_mobile_bottom_width. 'px;
			border-left-width: '. $input_border_mobile_left_width. 'px;
		}
	}
	';
	if ( $button_background_image ) {
		$custom_css .= "
		.editor-styles-wrapper .wp-block-button__link,
		.editor-styles-wrapper .wp-block-file__button,
		.editor-styles-wrapper .wp-block-search__button,
		.editor-styles-wrapper button {
			background-color:{$button_color};
			background-image: linear-gradient(to right, {$button_color}, {$button_color}), url({$button_background_image});
			background-repeat: no-repeat;
			background-size: cover;
			background-attachment: scroll;
		}";
	}
	if ( $inputs_background_image ) {
		$custom_css .= "
			$block_editor_form_fields_css_selector {
				background-color: {$inputs_background_color};
				background-image: linear-gradient(to right, {$inputs_background_color}, {$inputs_background_color}), url({$inputs_background_image});
				background-repeat: no-repeat;
				background-size: cover;
				background-attachment: scroll;
			}";
	}
	if ( $button_typography ) {
		$custom_css .= "
			.editor-styles-wrapper .wp-block-button__link,
			.editor-styles-wrapper .wp-block-file__button,
			.editor-styles-wrapper .wp-block-search__button,
			.editor-styles-wrapper button {
		";
		foreach ( $button_typography as $key => $value ) {
			if ( 'letter-spacing' === $key ) {
				$custom_css .= $key . ':' . $value . 'px;';
			} else {
				$custom_css .= $key . ':' . $value . ';';
			}
		}
		$custom_css .= "}";
	}
	if ( $button_tablet_typography ) {
		$custom_css .= "
		@media screen and ( max-width: 992px ) {
			.editor-styles-wrapper .wp-block-button__link,
			.editor-styles-wrapper .wp-block-file__button,
			.editor-styles-wrapper .wp-block-search__button,
			.editor-styles-wrapper button {
		";
		foreach ( $button_tablet_typography as $key => $value ) {
			$custom_css .= $key . ':' . $value . ';';
		}
		$custom_css .= "}}";
	}
	if ( $button_mobile_typography ) {
		$custom_css .= "
		@media screen and ( max-width: 576px ) {
			.editor-styles-wrapper .wp-block-button__link,
			.editor-styles-wrapper .wp-block-file__button,
			.editor-styles-wrapper .wp-block-search__button,
			.editor-styles-wrapper button {
		";
		foreach ( $button_mobile_typography as $key => $value ) {
			$custom_css .= $key . ':' . $value . ';';
		}
		$custom_css .= "}}";
	}
	// Apply Form Fields Typography styles.	
	if ( $input_typography ) {
		$custom_css .= "
			$block_editor_form_fields_css_selector {
		";
		foreach ( $input_typography as $key => $value ) {
			if ( 'letter-spacing' === $key ) {
				$custom_css .= $key . ':' . $value . 'px;';
			} else {
				$custom_css .= $key . ':' . $value . ';';
			}
		}
		$custom_css .= "}";
	}
	if ( $input_tablet_typography ) {
		$custom_css .= "
		@media screen and ( max-width: 992px ) {
			$block_editor_form_fields_css_selector {
		";
		foreach ( $input_tablet_typography as $key => $value ) {
			$custom_css .= $key . ':' . $value . ';';
		}
		$custom_css .= "}}";
	}
	if ( $input_mobile_typography ) {
		$custom_css .= "
		@media screen and ( max-width: 576px ) {
			$block_editor_form_fields_css_selector {
		";
		foreach ( $input_mobile_typography as $key => $value ) {
			$custom_css .= $key . ':' . $value . ';';
		}
		$custom_css .= "}}";
	}
	// Apply body typography styles.
	if ( $body_typography ) {
		foreach ( $body_typography as $key => $value ) {
			if ( 'font-family' === $key ) {
				$custom_css .= '.has-body-font-family{' . $key . ':' . $value . '; }';
				break;
			}
		}
		$custom_css .= "
			$block_editor_body_selector {
		";
		foreach ( $body_typography as $key => $value ) {
			$custom_css .= $key . ':' . $value . ';';
		}
		$custom_css .= "}";
	}
	if ( $body_tablet_typography ) { // body tablet typography
		$custom_css .= "
		@media screen and ( max-width: 992px ) {
			$block_editor_body_selector {
		";
		foreach ( $body_tablet_typography as $key => $value ) {
			$custom_css .= $key . ':' . $value . ';';
		}
		$custom_css .= "}}";
	}
	if ( $body_mobile_typography ) { // body mobile typography
		$custom_css .= "
		@media screen and ( max-width: 576px ) {
			$block_editor_body_selector {
		";
		foreach ( $body_mobile_typography as $key => $value ) {
			$custom_css .= $key . ':' . $value . ';';
		}
		$custom_css .= "}}";
	}

	// Apply all headings typography styles.
	if ( $all_headings_typography ) {
		$custom_css .= "
			$block_editor_all_headings_selector {
		";
		foreach ( $all_headings_typography as $key => $value ) {
			$custom_css .= $key . ':' . $value . ';';
		}
		$custom_css .= "}";
	}

	// Apply h1-h6 Typography styles.
	for ( $i = 1; $i <= 6; $i++ ) {
		// Update the selector for h1 to h6.
		$heading_selector   = ${"block_editor_h{$i}_selector"};
		// Dynamically get the heading typography variable.
		$typography_var     = ${"h{$i}_typography"};
		$_tablet_typography = ${"h{$i}_tablet_typography"};
		$_mobile_typography = ${"h{$i}_mobile_typography"};
	
		$custom_css .= "
		$heading_selector {
			color: " . esc_html( get_theme_mod( "responsive_h{$i}_text_color", get_theme_mod( 'responsive_all_heading_text_color', Responsive\Core\get_responsive_customizer_defaults( "h{$i}_text" ) ) ) ) . ";
		}
		";
	
		// Generate the typography rules if available.
		if ( $typography_var ) {
			$custom_css .= "
			$heading_selector {";

			foreach ( $typography_var as $key => $value ) {
				if ( 'letter-spacing' === $key ) {
					$custom_css .= "$key: {$value}px;";
				} else {
					$custom_css .= "$key: $value;";
				}
			}
			$custom_css .= "}
			";
		}
		if ( $_tablet_typography ) { // body tablet typography
			$custom_css .= "
			@media screen and ( max-width: 992px ) {
				$heading_selector {
			";
			foreach ( $_tablet_typography as $key => $value ) {
				$custom_css .= $key . ':' . $value . ';';
			}
			$custom_css .= "}}";
		}
		if ( $_mobile_typography ) { // body mobile typography
			$custom_css .= "
			@media screen and ( max-width: 576px ) {
				$heading_selector {
			";
			foreach ( $_mobile_typography as $key => $value ) {
				$custom_css .= $key . ':' . $value . ';';
			}
			$custom_css .= "}}";
		}
	}

	return $custom_css;
}
/**
 *  Enqueue block styles  in editor
 */
function responsive_block_styles() {
	$suffix = '';
	if ( is_rtl() ) {
		$suffix = '-rtl' . $suffix;
	}
	wp_enqueue_style( 'responsive-gutenberg-blocks', get_stylesheet_directory_uri() . '/core/css/gutenberg-editor' . $suffix . '.css', array(), '4.1' );
	wp_enqueue_script( 'responsive-block-editor-scripts', get_stylesheet_directory_uri() . '/core/js/block-editor-script.js', array(), RESPONSIVE_THEME_VERSION, false );
	wp_add_inline_style( 'responsive-gutenberg-blocks', apply_filters( 'responsive_gutenberg_editor_css', responsive_minimize_css( responsive_gutenberg_customizer_css() ) ) );

	// Add customizer colors to Gutenberg editor in backend.
	wp_add_inline_style( 'responsive-gutenberg-blocks', responsive_gutenberg_colors( responsive_gutenberg_color_palette() ) );
	wp_add_inline_style( 'responsive-style', responsive_gutenberg_colors( responsive_gutenberg_color_palette() ) );
}
add_action( 'enqueue_block_editor_assets', 'responsive_block_styles' );
