<?php
/**
 * Exit if accessed directly.
 *
 * @package Responsive
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Define constants.
 */
define( 'RESPONSIVE_THEME_VERSION', '4.0.5' );
define( 'RESPONSIVE_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'RESPONSIVE_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
/**
 *
 * WARNING: Please do not edit this file in any way
 *
 * Load the theme function files
 */
global $responsive_blog_layout_columns;
$responsive_blog_layout_columns = array( 'blog-2-col', 'blog-3-col', 'blog-4-col' );

$responsive_template_directory = get_template_directory();
require $responsive_template_directory . '/core/includes/functions.php';
require $responsive_template_directory . '/core/includes/functions-update.php';
require $responsive_template_directory . '/core/includes/functions-sidebar.php';
require $responsive_template_directory . '/core/includes/functions-install.php';
require $responsive_template_directory . '/core/includes/functions-admin.php';
require $responsive_template_directory . '/core/includes/functions-extras.php';
require $responsive_template_directory . '/core/includes/functions-extentions.php';
require $responsive_template_directory . '/core/includes/theme-options/theme-options.php';
require $responsive_template_directory . '/core/includes/post-custom-meta.php';
require $responsive_template_directory . '/core/includes/hooks.php';
require $responsive_template_directory . '/core/includes/version.php';
require $responsive_template_directory . '/core/includes/customizer/controls/typography/webfonts.php';
require $responsive_template_directory . '/core/includes/customizer/helper.php';
require $responsive_template_directory . '/core/includes/customizer/customizer.php';
require $responsive_template_directory . '/core/includes/customizer/custom-styles.php';
require $responsive_template_directory . '/core/includes/compatibility/woocommerce/class-responsive-woocommerce.php';
require $responsive_template_directory . '/admin/admin-functions.php';
require $responsive_template_directory . '/core/includes/classes/class-responsive-mobile-menu-markup.php';
require $responsive_template_directory . '/core/gutenberg/gutenberg-support.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings
	 */
	require_once $responsive_template_directory . '/core/includes/classes/class-responsive-admin-settings.php';
}

/**
 * Return value of the supplied responsive free theme option.
 *
 * @param  array   $option  options.
 * @param  boolean $default flag.
 */
function responsive_free_get_option( $option, $default = false ) {
	global $responsive_options;

	// If the option is set then return it's value, otherwise return false.
	if ( isset( $responsive_options[ $option ] ) ) {
		return $responsive_options[ $option ];
	}

	return $default;
}



/**
 * Responsive_free_setup
 */
function responsive_free_setup() {
	add_theme_support( 'title-tag' );
	// Adding Gutenberg support.
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'core/css/gutenberg-editor.css' );
	// Gutenberg editor color palette.
	add_theme_support( 'editor-color-palette', responsive_gutenberg_color_palette() );
	$small_font_sizes  = get_theme_mod( 'meta_typography' );
	$normal_sizes      = get_theme_mod( 'body_typography' );
	$larger_font_sizes = get_theme_mod( 'heading_h1_typography' );
	$large_font_sizes  = get_theme_mod( 'heading_h2_typography' );
	if ( isset( $small_font_sizes['font-size'] ) ) {
		$small_font_sizes_default_value = ( $small_font_sizes && isset( $small_font_sizes['font-size'] ) ) ? str_replace( 'px', '', $small_font_sizes['font-size'] ) : '12';
	} else {
		$small_font_sizes_default_value = 13;
	}
	if ( isset( $normal_sizes['font-size'] ) ) {
		$normal_sizes_default_value = ( $normal_sizes && isset( $normal_sizes['font-size'] ) ) ? str_replace( 'px', '', $normal_sizes['font-size'] ) : '16';
	} else {
		$normal_sizes_default_value = 16;
	}
	if ( isset( $larger_font_sizes['font-size'] ) ) {
		if ( false === strpos( $larger_font_sizes['font-size'], 'px' ) ) {
			$larger_font_sizes_default_value = ( $larger_font_sizes && isset( $larger_font_sizes['font-size'] ) ) ? str_replace( array( 'em', 'rem' ), '', $larger_font_sizes['font-size'] ) : '2.625';
			$larger_font_sizes_default_value = $normal_sizes_default_value * $larger_font_sizes_default_value;
		} else {
			$larger_font_sizes_default_value = str_replace( 'px', '', $larger_font_sizes['font-size'] );
		}
	} else {
		$larger_font_sizes_default_value = 33;
	}

	if ( isset( $large_font_sizes['font-size'] ) ) {
		if ( false === strpos( $large_font_sizes['font-size'], 'px' ) ) {
			$large_font_sizes_default_value = ( $large_font_sizes && isset( $large_font_sizes['font-size'] ) ) ? str_replace( array( 'em', 'rem' ), '', $large_font_sizes['font-size'] ) : '2.250';
			$large_font_sizes_default_value = $normal_sizes_default_value * $large_font_sizes_default_value;
		} else {
			$large_font_sizes_default_value = str_replace( 'px', '', $large_font_sizes['font-size'] );
		}
	} else {
		$large_font_sizes_default_value = 26;
	}
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => _x( 'Small', 'Name of the small font size in the block editor', 'responsive' ),
				'shortName' => _x( 'S', 'Short name of the small font size in the block editor.', 'responsive' ),
				'size'      => $small_font_sizes_default_value,
				'slug'      => 'small',
			),
			array(
				'name'      => _x( 'Regular', 'Name of the regular font size in the block editor', 'responsive' ),
				'shortName' => _x( 'M', 'Short name of the regular font size in the block editor.', 'responsive' ),
				'size'      => $normal_sizes_default_value,
				'slug'      => 'normal',
			),
			array(
				'name'      => _x( 'Large', 'Name of the large font size in the block editor', 'responsive' ),
				'shortName' => _x( 'L', 'Short name of the large font size in the block editor.', 'responsive' ),
				'size'      => $large_font_sizes_default_value,
				'slug'      => 'large',
			),
			array(
				'name'      => _x( 'Larger', 'Name of the larger font size in the block editor', 'responsive' ),
				'shortName' => _x( 'XL', 'Short name of the larger font size in the block editor.', 'responsive' ),
				'size'      => $larger_font_sizes_default_value,
				'slug'      => 'larger',
			),
		)
	);
}
add_action( 'after_setup_theme', 'responsive_free_setup' );

$responsive_options = responsive_get_options();

if ( ! defined( 'ELEMENTOR_PARTNER_ID' ) ) {
	define( 'ELEMENTOR_PARTNER_ID', 2126 );
}
/**
 * Edit Customize Register
 *
 * @param array $wp_customize WP Customize.
 */
function responsive_edit_customize_register( $wp_customize ) {
	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector' => '.site-name a',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector' => '.site-description',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[home_headline]',
		array(
			'selector' => '.featured-title',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[home_subheadline]',
		array(
			'selector' => '.featured-subtitle',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[cta_text]',
		array(
			'selector' => '.call-to-action',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[banner_image]',
		array(
			'selector' => '#featured',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[about_title]',
		array(
			'selector' => '#about_div .section_title',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[about_text]',
		array(
			'selector' => '.about_text',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[about_cta_text]',
		array(
			'selector' => '.about-cta-button',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[feature_title]',
		array(
			'selector' => '#feature_div .section_title',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[testimonial_title]',
		array(
			'selector' => '#testimonial_div .section_title',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[team_title]',
		array(
			'selector' => '#team_div .section_title',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'nav_menu_locations[top]',
		array(
			'selector' => '.main-nav',
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'sidebars_widgets[home-widget-1]',
		array(
			'selector' => '#home_widget_1',

		)
	);
	$wp_customize->selective_refresh->add_partial(
		'sidebars_widgets[home-widget-2]',
		array(
			'selector' => '#home_widget_2',

		)
	);
	$wp_customize->selective_refresh->add_partial(
		'sidebars_widgets[home-widget-3]',
		array(
			'selector' => '#home_widget_3',

		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[featured_content]',
		array(
			'selector' => '#featured-image',

		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[home_content_area]',
		array(
			'selector' => '#featured-content p',

		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[copyright_textbox]',
		array(
			'selector' => '.copyright',

		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[contact_title]',
		array(
			'selector' => '.contact_title',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[contact_subtitle]',
		array(
			'selector' => '.contact_subtitle',

		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[contact_add]',
		array(
			'selector' => '.contact_add',

		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[contact_email]',
		array(
			'selector' => '.contact_email',

		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[contact_ph]',
		array(
			'selector' => '.contact_ph',

		)
	);
	$wp_customize->selective_refresh->add_partial(
		'responsive_theme_options[contact_content]',
		array(
			'selector' => '.contact_right',

		)
	);
	$wp_customize->selective_refresh->add_partial(
		'header_image',
		array(
			'selector' => '#site-branding',

		)
	);
}
add_action( 'customize_register', 'responsive_edit_customize_register' );
add_theme_support( 'customize-selective-refresh-widgets' );

/**
 * Custom Category Widget
 *
 * @param array $arg Arguments.
 * @return mixed
 */
function responsive_custom_category_widget( $arg ) {
	$cat = get_theme_mod( 'exclude_post_cat' );

	if ( $cat ) {
		$cat            = array_diff( array_unique( $cat ), array( '' ) );
		$arg['exclude'] = $cat;
	}
	return $arg;
}
add_filter( 'widget_categories_args', 'responsive_custom_category_widget' );
add_filter( 'widget_categories_dropdown_args', 'responsive_custom_category_widget' );

/**
 * Exclude post category recent post widget
 *
 * @param array $array Array.
 * @return mixed
 */
function responsive_exclude_post_cat_recentpost_widget( $array ) {
	$s   = '';
	$i   = 1;
	$cat = get_theme_mod( 'exclude_post_cat' );

	if ( $cat ) {
		$cat = array_diff( array_unique( $cat ), array( '' ) );
		foreach ( $cat as $c ) {
			$i++;
			$s .= '-' . $c;
			if ( count( $cat ) >= $i ) {
				$s .= ', ';
			}
		}
	}

	$array['cat'] = array( $s );

	return $array;
}
add_filter( 'widget_posts_args', 'responsive_exclude_post_cat_recentpost_widget' );

if ( ! function_exists( 'responsive_page_featured_image' ) ) :

	/**
	 * Featured image
	 */
	function responsive_page_featured_image() {
		// check if the page has a Post Thumbnail assigned to it.
		$responsive_options = responsive_get_options();
		if ( has_post_thumbnail() ) {
			?>
						<div class="featured-image">
							<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'responsive' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" <?php responsive_schema_markup( 'url' ); ?>>
								<?php	the_post_thumbnail(); ?>
							</a>
						</div>
					<?php
		}
	}

endif;

/**
 * Exclude post with Category from blog and archive page.
 */
if ( ! function_exists( 'responsive_exclude_post_cat' ) ) :
	/**
	 * Exclude post with Category from blog and archive page.
	 *
	 * @param  object $query Query.
	 */
	function responsive_exclude_post_cat( $query ) {
		$responsive_options = responsive_get_options();
		$cat                = get_theme_mod( 'exclude_post_cat' );

		if ( $cat && ! is_admin() && $query->is_main_query() ) {
			if ( ! array( $cat ) ) {
				$cat = array( $cat );
			}
			$cat = array_diff( array_unique( $cat ), array( '' ) );
			if ( $query->is_home() || $query->is_archive() ) {
				$query->set( 'category__not_in', $cat );
			}
		}
	}
endif;
add_action( 'pre_get_posts', 'responsive_exclude_post_cat', 10 );

if ( ! function_exists( 'responsive_get_attachment_id_from_url' ) ) :
	/**
	 * Get atachment id from URL
	 *
	 * @param string $attachment_url URL.
	 */
	function responsive_get_attachment_id_from_url( $attachment_url = '' ) {
		global $wpdb;
		$attachment_id = false;
		// If there is no url, return.
		if ( '' == $attachment_url ) {
			return;
		}
		// Get the upload directory paths.
		$upload_dir_paths = wp_upload_dir();

		// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image.
		if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {

			// If this is the URL of an auto-generated thumbnail, get the URL of the original image.
			$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );

			// Remove the upload path base directory from the attachment URL.
			$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );

			// Finally, run a custom database query to get the attachment ID from the modified attachment URL.
			$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = %s AND wposts.post_type = 'attachment'", $attachment_url ) );
		}
		return $attachment_id;
	}
endif;

/**
 * Enqueue customizer styling
 */
function responsive_controls_style() {
	wp_enqueue_style( 'responsive-blocks', get_stylesheet_directory_uri() . '/core/css/customizer.css', RESPONSIVE_THEME_VERSION, 'all' );
}

add_action( 'customize_controls_print_styles', 'responsive_controls_style' );

/**
 * Add rating links to the admin dashboard
 *
 * @param string $footer_text The existing footer text.
 *
 * @return      string
 * @since        2.0.6
 * @global        string $typenow
 */
function responsive_admin_rate_us( $footer_text ) {
	$page        = isset( $_GET['page'] ) ? $_GET['page'] : '';
	$show_footer = array( 'responsive-options' );

	if ( in_array( $page, $show_footer, true ) ) {
		$rate_text = sprintf(
			/* translators: %s Link to 5 star rating */
			__( 'If you like <strong>Responsive Theme</strong> please leave us a %s rating. It takes a minute and helps a lot. Thanks in advance!', 'responsive' ),
			'<a href="https://wordpress.org/support/view/theme-reviews/responsive?filter=5#postform" target="_blank" class="responsive-rating-link" style="text-decoration:none;" data-rated="' . esc_attr__( 'Thanks :)', 'responsive' ) . '">&#9733;&#9733;&#9733;&#9733;&#9733;</a>'
		);

		return $rate_text;
	} else {
		return $footer_text;
	}
}

add_filter( 'admin_footer_text', 'responsive_admin_rate_us' );

/**
 * Include menu.
 */
function responsive_display_menu() {
	$position = get_theme_mod( 'menu_position', 'in_header' );
	?>
	<nav id="main-nav" class="main-nav" role="navigation">
	<?php
	if ( 'in_header' !== $position ) :
		?>
		<div class="container">
			<div class="row">
		<?php
	endif;

	wp_nav_menu(
		array(
			'menu_id'        => 'header-menu',
			'fallback_cb'    => 'responsive_fallback_menu',
			'theme_location' => 'header-menu',
		)
	);

	if ( 'in_header' !== $position ) :
		?>
			</div>
		</div>
		<?php
	endif;
	?>
	</nav>
	<?php
}


/**
 * Check the responsive version is above 4.0.
 * Change the value layout if it is fullwidth_without_box.
 */
function responsive_check_previous_version() {
	$theme_data  = wp_get_theme();
	$new_version = $theme_data->get( 'Version' );
	global $responsive_options;
	$responsive_options = responsive_get_options();
	$header_layout      = get_theme_mod( 'header_layout_options' );
	$menu_position      = get_theme_mod( 'menu_position' );

	// Check if we had a response and compare the current version on wp.org to version 2. If it is version 2 or greater display a message.
	if ( $new_version && version_compare( $new_version, '4.1.0', '>=' ) ) {

		if ( ! $responsive_options['home_headline'] ) {
			$responsive_options['home_headline'] = 'HAPPINESS';
		}
		if ( ! $responsive_options['home_subheadline'] ) {
			$responsive_options['home_subheadline'] = 'IS A WARM CUP';
		}
		if ( ! $responsive_options['home_content_area'] ) {
			$responsive_options['home_content_area'] = 'Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.';
		}
		if ( ! $responsive_options['cta_text'] ) {
			$responsive_options['cta_text'] = 'Call to Action';
		}
		if ( ! $responsive_options['cta_url'] ) {
			$responsive_options['cta_url'] = '#';
		}

		! get_theme_mod( 'responsive_hide_tagline' ) ? set_theme_mod( 'responsive_hide_tagline', get_theme_mod( 'res_hide_tagline', 0 ) ) : '';
		! get_theme_mod( 'responsive_hide_title' ) ? set_theme_mod( 'responsive_hide_title', get_theme_mod( 'res_hide_site_title', 0 ) ) : '';

		! get_theme_mod( 'responsive_button_color' ) ? set_theme_mod( 'responsive_button_color', get_theme_mod( 'button-color', '#0066CC' ) ) : '';
		! get_theme_mod( 'responsive_button_hover_color' ) ? set_theme_mod( 'responsive_button_hover_color', get_theme_mod( 'button-hover-color', '#10659C' ) ) : '';
		! get_theme_mod( 'responsive_button_text_color' ) ? set_theme_mod( 'responsive_button_text_color', get_theme_mod( 'button-text-color', '#FFFFFF' ) ) : '';
		! get_theme_mod( 'responsive_button_hover_text_color' ) ? set_theme_mod( 'responsive_button_hover_text_color', get_theme_mod( 'button-hover-text-color', '#FFFFFF' ) ) : '';

		! get_theme_mod( 'responsive_inputs_background_color' ) ? set_theme_mod( 'responsive_inputs_background_color', get_theme_mod( 'input-background-color', '#FFFFFF' ) ) : '';
		! get_theme_mod( 'responsive_inputs_text_color' ) ? set_theme_mod( 'responsive_inputs_text_color', get_theme_mod( 'input-text-color', '#333333' ) ) : '';
		! get_theme_mod( 'responsive_inputs_border_color' ) ? set_theme_mod( 'responsive_inputs_border_color', get_theme_mod( 'input-border-color', '#cccccc' ) ) : '';

		! get_theme_mod( 'responsive_label_color' ) ? set_theme_mod( 'responsive_label_color', get_theme_mod( 'label-color', '#333333' ) ) : '';

		! get_theme_mod( 'responsive_header_menu_background_color' ) ? set_theme_mod( 'responsive_header_menu_background_color', get_theme_mod( 'responsive_menu_background_colorpicker', '#ffffff' ) ) : '';
		! get_theme_mod( 'responsive_header_active_menu_background_color' ) ? set_theme_mod( 'responsive_header_active_menu_background_color', get_theme_mod( 'responsive_menu_active_colorpicker', '#ffffff' ) ) : '';
		if ( '#ffffff' !== get_theme_mod( 'responsive_header_menu_background_color' ) ) {
			! get_theme_mod( 'responsive_header_menu_link_color' ) ? set_theme_mod( 'responsive_header_menu_link_color', get_theme_mod( 'responsive_menu_text_colorpicker', '#ffffff' ) ) : '';
			! get_theme_mod( 'responsive_header_menu_toggle_color' ) ? set_theme_mod( 'responsive_header_menu_toggle_color', get_theme_mod( 'responsive_menu_text_colorpicker', '#ffffff' ) ) : '';
		}
		if ( '#ffffff' !== get_theme_mod( 'responsive_header_active_menu_background_color' ) ) {
			! get_theme_mod( 'responsive_header_menu_link_hover_color' ) ? set_theme_mod( 'responsive_header_menu_link_hover_color', get_theme_mod( 'responsive_menu_text_hover_colorpicker', '#ffffff' ) ) : '';
		}
		! get_theme_mod( 'responsive_header_menu_toggle_color' ) ? set_theme_mod( 'responsive_header_menu_toggle_color', get_theme_mod( 'responsive_menu_text_colorpicker', '#333333' ) ) : '';
		! get_theme_mod( 'responsive_header_menu_link_color' ) ? set_theme_mod( 'responsive_header_menu_link_color', get_theme_mod( 'responsive_menu_text_colorpicker', '#333333' ) ) : '';
		! get_theme_mod( 'responsive_header_menu_border_color' ) ? set_theme_mod( 'responsive_header_menu_border_color', get_theme_mod( 'responsive_menu_border_color', '#eaeaea' ) ) : '';
		! get_theme_mod( 'responsive_header_menu_link_hover_color' ) ? set_theme_mod( 'responsive_header_menu_link_hover_color', get_theme_mod( 'responsive_menu_text_hover_colorpicker', '#10659C' ) ) : '';
		! get_theme_mod( 'responsive_header_background_color' ) ? set_theme_mod( 'responsive_header_background_color', get_theme_mod( 'responsive_fullwidth_header_color', '#ffffff' ) ) : '';
		! get_theme_mod( 'responsive_header_site_title_color' ) ? set_theme_mod( 'responsive_header_site_title_color', get_theme_mod( 'responsive_fullwidth_sitetitle_color', '#333333' ) ) : '';
		! get_theme_mod( 'responsive_header_text_color' ) ? set_theme_mod( 'responsive_header_text_color', get_theme_mod( 'responsive_site_description_color', '#999999' ) ) : '';

		! get_theme_mod( 'responsive_box_background_color' ) ? set_theme_mod( 'responsive_box_background_color', get_theme_mod( 'responsive_container_background_color', '#ffffff' ) ) : '';
		if ( '#ffffff' !== get_theme_mod( 'responsive_box_background_color' ) ) {
			! get_theme_mod( 'background_color' ) ? set_theme_mod( 'background_color', 'ffffff' ) : '';
		}

		! get_theme_mod( 'responsive_link_color' ) ? set_theme_mod( 'responsive_link_color', get_theme_mod( 'link-color', '#0066CC' ) ) : '';
		! get_theme_mod( 'responsive_link_hover_color' ) ? set_theme_mod( 'responsive_link_hover_color', get_theme_mod( 'link-hover-color', '#10659C' ) ) : '';

		if ( '#ffffff' === get_theme_mod( 'responsive_footer_background_color' ) ) {
			! get_theme_mod( 'responsive_footer_text_color' ) ? set_theme_mod( 'responsive_footer_text_color', '#333333' ) : '';
			! get_theme_mod( 'responsive_footer_link_color' ) ? set_theme_mod( 'responsive_footer_link_color', '#999999' ) : '';
			! get_theme_mod( 'responsive_footer_link_hover_color' ) ? set_theme_mod( 'responsive_footer_link_hover_color', '#333333' ) : '';
		}

		$header_layout = array( 'above_header', 'below_header' );
		if ( in_array( get_theme_mod( 'menu_position' ), $header_layout, true ) ) {
			! get_theme_mod( 'responsive_header_layout' ) ? set_theme_mod( 'responsive_header_layout', 'vertical' ) : '';

			if ( 'above_header' === get_theme_mod( 'menu_position' ) ) {
				! get_theme_mod( 'responsive_header_elements' ) ? set_theme_mod( 'responsive_header_elements', array( 'main-navigation', 'site-branding' ) ) : '';
			}
		}

		if ( 'in_header' === get_theme_mod( 'menu_position' ) && 'header-logo-right' === get_theme_mod( 'header_layout_options' ) ) {
			! get_theme_mod( 'responsive_header_elements' ) ? set_theme_mod( 'responsive_header_elements', array( 'main-navigation', 'site-branding' ) ) : '';
		}

		! get_theme_mod( 'responsive_header_alignment' ) ? set_theme_mod( 'responsive_header_alignment', str_replace( 'header-logo-', '', get_theme_mod( 'header_layout_options' ) ) ) : '';
		! get_theme_mod( 'responsive_container_width' ) ? set_theme_mod( 'responsive_container_width', get_theme_mod( 'responsive_main_container_width', 1140 ) ) : '';

		$responsive_options_blog = array( 'full-width-page', 'blog-2-col', 'blog-3-col', 'blog-4-col' );

		if ( in_array( $responsive_options['blog_posts_index_layout_default'], $responsive_options_blog, true ) ) {
			! get_theme_mod( 'responsive_blog_sidebar_position' ) ? set_theme_mod( 'responsive_blog_sidebar_position', 'no' ) : '';
			! get_theme_mod( 'responsive_blog_content_width' ) ? set_theme_mod( 'responsive_blog_content_width', 100 ) : '';
			for ( $i = 0; $i < 4; $i++ ) {
				if ( 'blog-' . $i . '-col' === $responsive_options['blog_posts_index_layout_default'] ) {
					! get_theme_mod( 'responsive_blog_entry_columns' ) ? set_theme_mod( 'responsive_blog_entry_columns', $i ) : '';
					! get_theme_mod( 'responsive_blog_entry_display_masonry' ) ? set_theme_mod( 'responsive_blog_entry_display_masonry', get_theme_mod( 'responsive_display_masonry' ) ) : '';
				}
			}
		}

		if ( 'sidebar-content-page' === $responsive_options['blog_posts_index_layout_default'] ) {
			! get_theme_mod( 'responsive_blog_sidebar_position' ) ? set_theme_mod( 'responsive_blog_sidebar_position', 'left' ) : '';
		}

		if ( get_theme_mod( 'responsive_display_thumbnail_without_padding' ) ) {
			! get_theme_mod( 'responsive_blog_entry_featured_image_style' ) ? set_theme_mod( 'responsive_blog_entry_featured_image_style', 'stretched' ) : '';
		}

		if ( 'sidebar-content-page' === $responsive_options['single_post_layout_default'] ) {
			! get_theme_mod( 'responsive_single_blog_sidebar_position' ) ? set_theme_mod( 'responsive_single_blog_sidebar_position', 'left' ) : '';
		}

		if ( 'full-width-page' === $responsive_options['single_post_layout_default'] ) {
			! get_theme_mod( 'responsive_single_blog_sidebar_position' ) ? set_theme_mod( 'responsive_single_blog_sidebar_position', 'left' ) : '';
			! get_theme_mod( 'responsive_single_blog_content_width' ) ? set_theme_mod( 'responsive_single_blog_content_width', 100 ) : '';
		}

		if ( 'sidebar-content-page' === $responsive_options['static_page_layout_default'] ) {
			! get_theme_mod( 'responsive_single_blog_sidebar_position' ) ? set_theme_mod( 'responsive_single_blog_sidebar_position', 'left' ) : '';
		}

		if ( 'full-width-page' === $responsive_options['static_page_layout_default'] ) {
			! get_theme_mod( 'responsive_page_sidebar_position' ) ? set_theme_mod( 'responsive_page_sidebar_position', 'left' ) : '';
			! get_theme_mod( 'responsive_page_content_width' ) ? set_theme_mod( 'responsive_page_content_width', 100 ) : '';
		}

		if ( 'fullwidth-stretched' === $responsive_options['site_layout_option'] ) {
			! get_theme_mod( 'responsive_width' ) ? set_theme_mod( 'responsive_width', 'full-width' ) : '';
			if ( '#ffffff' === get_theme_mod( 'responsive_box_background_color' ) ) {
				'ffffff' !== get_theme_mod( 'background_color' ) ? set_theme_mod( 'background_color', 'ffffff' ) : '';
			}
		}

		if ( 'full' === get_theme_mod( 'header_width' ) ) {
			( ! get_theme_mod( 'responsive_header_menu_full_width' ) && 0 !== get_theme_mod( 'responsive_header_menu_full_width' ) ) ? set_theme_mod( 'responsive_header_menu_full_width', 1 ) : '';
		}

		$body_typography = get_theme_mod( 'body_typography' );
		if ( $body_typography && array_key_exists( 'color', $body_typography ) ) {
			! get_theme_mod( 'responsive_body_text_color' ) ? set_theme_mod( 'responsive_body_text_color', $body_typography['color'] ) : '';
		}

		$menu_typography        = get_theme_mod( 'menu_typography' );
		$header_menu_typography = get_theme_mod( 'header_menu_typography' );

		if ( $menu_typography ) {
			if ( ! $header_menu_typography ) {
				set_theme_mod( 'header_menu_typography', $menu_typography );
			}
		}

		$post_meta_typography = get_theme_mod( 'post_meta_typography' );
		$meta_typography      = get_theme_mod( 'meta_typography' );

		if ( $post_meta_typography ) {
			if ( ! $meta_typography ) {
				set_theme_mod( 'meta_typography', $post_meta_typography );
			}
		}

		$meta_typography = get_theme_mod( 'post_meta_typography' );
		if ( $meta_typography && array_key_exists( 'color', $meta_typography ) ) {
			! get_theme_mod( 'responsive_meta_text_color' ) ? set_theme_mod( 'responsive_meta_text_color', $meta_typography['color'] ) : '';
		}

		for ( $i = 1; $i < 7; $i++ ) {
			$heading_h = get_theme_mod( 'heading_h' . $i . '_typography' );
			$heading   = get_theme_mod( 'headings_typography' );
			if ( $heading ) {
				if ( ! get_theme_mod( 'heading_h' . $i . '_typography' ) ) {
					set_theme_mod( 'heading_h' . $i . '_typography', $heading );
				} else {
					foreach ( $heading as $key => $value ) {
						if ( ! $heading_h[ $key ] ) {
							$temp      = array( $key => $value );
							$heading_h = $temp + get_theme_mod( 'heading_h' . $i . '_typography' );
							set_theme_mod( 'heading_h' . $i . '_typography', $heading_h );
						}
					}
				}
			}

			if ( $heading_h && array_key_exists( 'color', $heading_h ) ) {
				! get_theme_mod( "responsive_h{$i}_text_color" ) ? set_theme_mod( "responsive_h{$i}_text_color", $heading_h['color'] ) : '';
			}
		}

		if ( class_exists( 'woocommerce' ) ) {
			! get_theme_mod( 'responsive_shop_product_rating_color' ) ? set_theme_mod( 'responsive_shop_product_rating_color', get_theme_mod( 'responsive_product_rating_color', '#0066CC' ) ) : '';

			! get_theme_mod( 'responsive_add_to_cart_button_color' ) ? set_theme_mod( 'responsive_add_to_cart_button_color', get_theme_mod( 'responsive_button_color', '#0066CC' ) ) : '';
			! get_theme_mod( 'responsive_add_to_cart_button_text_color' ) ? set_theme_mod( 'responsive_add_to_cart_button_text_color', get_theme_mod( 'responsive_button_text_color', '#ffffff' ) ) : '';
			! get_theme_mod( 'responsive_add_to_cart_button_hover_color' ) ? set_theme_mod( 'responsive_add_to_cart_button_hover_color', get_theme_mod( 'responsive_button_hover_color', '#10659C' ) ) : '';
			! get_theme_mod( 'responsive_add_to_cart_button_hover_text_color' ) ? set_theme_mod( 'responsive_add_to_cart_button_hover_text_color', get_theme_mod( 'responsive_button_hover_text_color', '#ffffff' ) ) : '';

			! get_theme_mod( 'responsive_cart_buttons_color' ) ? set_theme_mod( 'responsive_cart_buttons_color', get_theme_mod( 'responsive_button_color', '#0066CC' ) ) : '';
			! get_theme_mod( 'responsive_cart_buttons_text_color' ) ? set_theme_mod( 'responsive_cart_buttons_text_color', get_theme_mod( 'responsive_button_text_color', '#ffffff' ) ) : '';
			! get_theme_mod( 'responsive_cart_buttons_hover_color' ) ? set_theme_mod( 'responsive_cart_buttons_hover_color', get_theme_mod( 'responsive_button_hover_color', '#10659C' ) ) : '';
			! get_theme_mod( 'responsive_cart_buttons_hover_text_color' ) ? set_theme_mod( 'responsive_cart_buttons_hover_text_color', get_theme_mod( 'responsive_button_hover_text_color', '#ffffff' ) ) : '';

			! get_theme_mod( 'responsive_cart_checkout_button_color' ) ? set_theme_mod( 'responsive_cart_checkout_button_color', get_theme_mod( 'responsive_button_color', '#0066CC' ) ) : '';
			! get_theme_mod( 'responsive_cart_checkout_button_text_color' ) ? set_theme_mod( 'responsive_cart_checkout_button_text_color', get_theme_mod( 'responsive_button_text_color', '#ffffff' ) ) : '';
			! get_theme_mod( 'responsive_cart_checkout_button_hover_color' ) ? set_theme_mod( 'responsive_cart_checkout_button_hover_color', get_theme_mod( 'responsive_button_hover_color', '#10659C' ) ) : '';
			! get_theme_mod( 'responsive_cart_checkout_button_hover_text_color' ) ? set_theme_mod( 'responsive_cart_checkout_button_hover_text_color', get_theme_mod( 'responsive_button_hover_text_color', '#ffffff' ) ) : '';
			! get_theme_mod( 'responsive_breadcrumb_color' ) ? set_theme_mod( 'responsive_breadcrumb_color', get_theme_mod( 'responsive_product_breadcrumb_color', '#0066CC' ) ) : '';

		}
	}
}
if ( is_admin() ) {
	add_action( 'admin_init', 'responsive_check_previous_version', 5 );
} else {
	add_action( 'wp', 'responsive_check_previous_version', 5 );
}


/**
 * Add iFrame to allowed wp_kses_post tags
 *
 * @param array  $tags Allowed tags, attributes, and/or entities.
 * @param string $context Context to judge allowed tags by. Allowed values are 'post'.
 *
 * @return array
 */
function responsive_wpkses_post_tags( $tags, $context ) {
	if ( 'post' === $context ) {
		$tags['iframe'] = array(
			'src'             => true,
			'height'          => true,
			'width'           => true,
			'frameborder'     => true,
			'allowfullscreen' => true,
		);
	}
	return $tags;
}
add_filter( 'wp_kses_allowed_html', 'responsive_wpkses_post_tags', 10, 2 );
