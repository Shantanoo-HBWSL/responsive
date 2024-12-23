<?php
/**
 * Starter Content Compatibility.
 */

/**
 * Class Astre_Starter_Content
 */
class Responsive_Starter_Content {
	const HOME_SLUG     = 'home';
	const ABOUT_SLUG    = '#about';
	const SERVICES_SLUG = '#services';
	const TESTIMONIALS_SLUG  = '#testimonials';
	const WHY_US_SLUG   = '#whyus';
	const CONTACT_SLUG  = '#contact';

	/**
	 * Constructor
	 */
	public function __construct() {
		// Adding post meta and inserting post.
		add_action(
			'wp_insert_post',
			array(
				$this,
				'register_listener',
			),
			3,
			99
		);

		// Save responsiiive settings into database.
		add_action(
			'customize_save_after',
			array(
				$this,
				'save_responsive_settings',
			),
			10,
			3
		);

		if ( ! is_customize_preview() ) {
			return;
		}

		// preview customizer values.
		add_filter( 'default_post_metadata', array( $this, 'starter_meta' ), 99, 3 );

		add_filter( 'responsive_theme_defaults', array( $this, 'theme_defaults' ) );

		add_filter( 'responsive_global_color_palette', array( $this, 'theme_color_palettes_defaults' ) );

	}

	/**
	 * Load default starter meta.
	 *
	 * @since 4.0.2
	 * @param mixed  $value Value.
	 * @param int    $post_id Post id.
	 * @param string $meta_key Meta key.
	 *
	 * @return string Meta value.
	 */
	public function starter_meta( $value, $post_id, $meta_key ) {
		if ( get_post_type( $post_id ) !== 'page' ) {
			return $value;
		}
		if ( 'site-content-layout' === $meta_key ) {
			return 'plain-container';
		}
		if ( 'theme-transparent-header-meta' === $meta_key ) {
			return 'enabled';
		}
		if ( 'site-sidebar-layout' === $meta_key ) {
			return 'no-sidebar';
		}
		if ( 'site-post-title' === $meta_key ) {
			return 'disabled';
		}
		return $value;
	}

	/**
	 * Register listener to insert post.
	 *
	 * @since 4.0.0
	 * @param int      $post_ID Post Id.
	 * @param \WP_Post $post Post object.
	 * @param bool     $update Is update.
	 */
	public function register_listener( $post_ID, $post, $update ) {

		if ( $update ) {
			return;
		}

		$custom_draft_post_name = get_post_meta( $post_ID, '_customize_draft_post_name', true );
		$responsive = wp_get_theme( 'responsive' );
		$responsive_version = $responsive['Version'];

		if($custom_draft_post_name === 'responssive-start-template') {
			wp_enqueue_style( 'responsive-starter-content-default', get_template_directory_uri() . "/admin/starter-template/responsive-starter-template-default.css", false, $responsive_version );
		}

		$is_from_starter_content = ! empty( $custom_draft_post_name );

		if ( ! $is_from_starter_content ) {
			return;
		}

		if ( 'page' === $post->post_type ) {
			update_post_meta( $post_ID, 'site-content-layout', 'plain-container' );
			update_post_meta( $post_ID, 'theme-transparent-header-meta', 'enabled' );
			update_post_meta( $post_ID, 'site-sidebar-layout', 'no-sidebar' );
			update_post_meta( $post_ID, 'site-post-title', 'disabled' );
		}
	}

	/**
	 *  Get customizer json
	 *
	 * @since 4.0.0
	 *  @return mixed value.
	 */
	public function get_customizer_json() {
		try {
			$request = wp_remote_get( RESPONSIVE_THEME_URI . 'admin/starter-template/responsive-settings-export.json' );
		} catch ( Exception $ex ) {
			$request = null;
		}

		if ( is_wp_error( $request ) ) {
			return false; // Bail early.
		}

		// @codingStandardsIgnoreStart
		/**
		 * @psalm-suppress PossiblyNullReference
		 * @psalm-suppress UndefinedMethod
		 * @psalm-suppress PossiblyNullArrayAccess
		 * @psalm-suppress PossiblyNullArgument
		 * @psalm-suppress InvalidScalarArgument
		 */
		return json_decode( $request['body'], 1 );
		// @codingStandardsIgnoreEnd
	}

	/**
	 *  Save repsonsive customizer settings into database.
	 *
	 * @since 4.0.0
	 */
	public function save_responsive_settings() {

		$settings = self::get_customizer_json();

		// Delete existing dynamic CSS cache.
		delete_option( 'responsive-settings' );

		if ( ! empty( $settings['customizer-settings'] ) ) {
			foreach ( $settings['customizer-settings'] as $option => $value ) {
				update_option( $option, $value );
			}
		}
	}

	/**
	 * Load default responsive settings.
	 *
	 * @since 4.0.0
	 * @param mixed $defaults defaults.
	 * @return mixed value.
	 */
	public function theme_defaults( $defaults ) {
		$json     = '';
		$settings = self::get_customizer_json();

		if ( ! empty( $settings['customizer-settings'] ) ) {
			$json = $settings['customizer-settings']['responsive-settings'];
		}

		return $json ? $json : $defaults;
	}

	/**
	 * Load default color palettes.
	 *
	 * @since 4.0.0
	 * @param mixed $defaults defaults.
	 * @return mixed value.
	 */
	public function theme_color_palettes_defaults( $defaults ) {
		$json     = '';
		$settings = self::get_customizer_json();

		if ( ! empty( $settings['customizer-settings'] ) ) {
			$json = $settings['customizer-settings']['responsive-color-palettes'];
		}

		return $json ? $json : $defaults;
	}


	/**
	 * Return starter content definition.
	 *
	 * @return mixed|void
	 * @since 4.0.0
	 */
	public function get() {

		$nav_items_header = array(
			'services'    => array(
				'title' => __( 'Services', 'responsive' ),
				'type'  => 'custom',
				'url'   => '{{' . self::SERVICES_SLUG . '}}',
			),
			'about' => array(
				'title' => __( 'About', 'responsive' ),
				'type'  => 'custom',
				'url'   => '{{' . self::ABOUT_SLUG . '}}',
			),
			'testimonials'  => array(
				'title' => __( 'testimonials', 'responsive' ),
				'type'  => 'custom',
				'url'   => '{{' . self::TESTIMONIALS_SLUG . '}}',
			),
			'whyus'      => array(
				'title' => __( 'Why Us', 'responsive' ),
				'type'  => 'custom',
				'url'   => '{{' . self::WHY_US_SLUG . '}}',
			),
			'contact'  => array(
				'title' => __( 'Contact', 'responsive' ),
				'type'  => 'custom',
				'url'   => '{{' . self::CONTACT_SLUG . '}}',
			),
		);

		$content = array(
			'attachments' => array(
				'logo' => array(
					'post_title' => _x( 'Logo', 'Theme starter content', 'responsive' ),
					'file'       => 'admin/images/responsive-theme-starter-content-logo.png',
				),
			),
			'nav_menus'   => array(
				'header-menu'     => array(
					'name'  => esc_html__( 'Responsive Starter Template Primary', 'responsive' ),
					'items' => $nav_items_header,
				),
			),
			'theme_mods'  => array(
				'custom_logo' => '{{logo}}',
				'nav_menu_locations' => array(
    			    'header-menu' => '{{header-menu}}', // Assign the menu to the primary location
    			),
				'responsive_style' => 'flat',
				'responsive_hide_title' => true,
				'heading_h1_typography' => array(
					'font-size' => '64px',
				),
				'heading_h2_typography' => array(
					'font-size' => '52px',
				),
				'heading_h3_typography' => array(
					'font-size' => '26px',
				),
				'heading_h1_typography_font_size_value' => 64,
				'heading_h2_typography_font_size_value' => 52,
				'heading_h3_typography_font_size_value' => 26,
				'responsive_h2_text_color' => '#200c47',
				'responsive_h3_text_color' => '#200c47',
				'responsive_body_text_color' => '#1f1f1f',
				'responsive_header_full_width' => true,
				'responsive_button_color' => '#ffc300',
				'responsive_button_text_color' => '#1c1c1c',
				'responsive_buttons_radius_top_left_radius' => 13,
				'responsive_buttons_radius_top_right_radius' => 13,
				'responsive_buttons_radius_top_top_radius' => 13,
				'responsive_buttons_radius_top_bottom_radius' => 13,
				'responsive_buttons_top_padding' => 25,
				'responsive_buttons_left_padding' => 44,
				'responsive_buttons_bottom_padding' => 25,
				'responsive_buttons_right_padding' => 44,
				'responsive_meta_text_color' => '#3a1d74',
				'responsive_header_background_color' => '#2d2c52',
				'responsive_header_active_menu_link_color' => '#ffffff',
				'responsive_footer_background_color' => '#ffffff',
				'responsive_footer_text_color' => '#747474',
				'responsive_footer_links_color' => '#3a1d74',
				'responsive_content_header_heading_color' => '#ffffff',
				'footer_typography_font_size_value' => 18,
				'footer_typography' => array(
					'font-size' => '18px',
				),
				'responsive_footer_bar_layout' => 'vertical',
			),
			'options'     => array(
				'show_on_front' => 'page',
				'page_on_front' => '{{' . self::HOME_SLUG . '}}',
			),
			'posts'       => array(
				self::HOME_SLUG => require RESPONSIVE_THEME_DIR . 'admin/starter-template/responsive-home.php', // PHPCS:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			),
		);
		$this->custom_css_for_starter_template();

		return apply_filters( 'responsive_starter_content', $content );
	}

	public function custom_css_for_starter_template() {
		$responsive_theme_options = get_option('responsive_theme_options');

		$css = array(
			'responsive-starter-template-cover' => array(
				'min-height'=>'90vh',
			),
			'responsive-starter-template-media-text-container' => array(
				'grid-template-columns' => 'auto 43%',
			),
			'responsive-starter-template-media-text-title' => array(
				'text-align'=>'left',
			),
			'responsive-starter-template-media-text-content' => array(
				'font-family' => 'Libre Franklin',
				'font-size' => '24px',
				'font-weight' => '400',
				'line-height' => '41px',
				'text-align' => 'left',
			),
			'responsive-starter-template-button' => array(
				'width' => '236px',
				'height' => '67px',
				'padding' => '25px 44px',
				'border-radius' => '13px',
				'border' => '1px solid #FFC300',
				'background' => '#FFC300',
			),
			'responsive-starter-template-our-services-container' => array(
				'padding-top' => '144px',
				'padding-bottom' => '0px',
				'background-color' => '#ffffff',
			),
			'responsive-starter-template-our-services-title' => array(
				'text-align' => 'center',
			),
			'responsive-starter-template-our-services-columns' => array(
				'background-color' => '#ffffff',	
			),
			'responsive-starter-template-our-services-image' => array(
				'max-width' => '320px',
				'max-height' => '320px',
				'width' => '100%',
				'height' => '100%',
			),
			'responsive-starter-template-our-services-column-title' => array(
				'text-align' => 'center',
			),
			'responsive-starter-template-our-services-column-content' => array(
				'font-family' => 'Libre Franklin',
				'font-size' => '16px',
				'font-weight' => '300',
				'line-height' => '28px',
				'text-align' => 'center',
			),
			'responsive-starter-template-about-us-outer-container' => array(
				'padding-top' => '143px',
				'padding-bottom' => '144px',
				'background-color' => '#ffffff',
			),
			'responsive-starter-template-about-us-group' => array(
				'padding-right' => '80px',
			),
			'responsive-starter-template-about-us-title' => array(
				'text-align' => 'left',
			),
			'responsive-starter-template-about-us-content' => array(
				'font-family' => 'Libre Franklin',
				'font-size' => '18px',
				'font-weight' => '300',
				'line-height' => '30px',
				'text-align' => 'left',
			),
			'responsive-starter-template-about-us-image' => array(
				'max-width' => '450px',
				'max-height' => '670px',
				'width' => '100%',
				'height' => '100%',
			),
			'responsive-starter-template-whyus-outer-container' => array(
				'padding-top' => '60px',
				'padding-bottom' => '60px',
				'background' => '#D0A0FB33', 
			),
			'responsive-starter-template-whyus-image-passionate' => array(
				'max-width' => '80px',
				'max-height' => '80px',
				'width' => '100%',
				'height' => '100%',
			),
			'responsive-starter-template-whyus-image-profession' => array(
				'max-width' => '120px',
				'max-height' => '80px',
				'width' => '100%',
				'height' => '100%',
			),
			'responsive-starter-template-whyus-image-support' => array(
				'max-width' => '85px',
				'max-height' => '80px',
				'width' => '100%',
				'height' => '100%',
			),
			'responsive-starter-template-whyus-title' => array(
				'text-align' => 'center',
				'margin-top' => '16px',
			),
			'responsive-starter-template-whyus-content' => array(
				'font-family' => 'Libre Franklin',
				'font-size' => '16px',
				'font-weight' => '300',
				'line-height' => '26px',
				'text-align' => 'center',
			),
			'responsive-starter-template-testimonials-outer-container' => array(
				'padding-top' => '60px',
				'padding-bottom' => '60px',
				'background-color' => '#ffffff',
			),
			'responsive-starter-template-testimonials-inner-container' => array(
				'max-width' => '1024px',
				'width' => '100%',
				'margin' => 'auto', 
			),
			'responsive-starter-template-testimonials-content1' => array(
				'font-size' => '24px',
				'line-height' => '47px',
				'font-weight' => '300',
				'text-align' => 'center',
			),
			'responsive-starter-template-testimonials-content2' => array(
				'font-size' => '24px',
				'line-height' => '47px',
				'font-weight' => '600',
				'text-align' => 'center',
			),
			'responsive-starter-template-contact-outer-container' => array(
				'background' => 'linear-gradient(60.83deg, #2D2C52 -26.89%, #7C29C4 73.99%, #FFFFFF 130.3%)',
				'padding-top' => '104px',
				'padding-bottom' => '104px',
			),
			'responsive-starter-template-contact-title' => array(
				'text-align' => 'center',
			),
			'responsive-starter-template-contact-inner-container' => array(
				'margin-top' => '50px',
			),
			' responsive-starter-template-contact-anchor' => array(

			),
		);

		// Merge the arrays using array_merge()
		$updated_responsive_theme_options = array_merge($responsive_theme_options, $css);

		// update_option('responsive_theme_options', $updated_responsive_theme_options);

		// Convert the $css array into a CSS string
		$css_string = '';
		foreach ($css as $selector => $styles) {
			$css_string .= $selector . ' { ';
			foreach ($styles as $property => $value) {
				$css_string .= $property . ': ' . $value . '; ';
			}
			$css_string .= '} ';
		}
	
		// Add the inline CSS to the theme's head
		wp_add_inline_style('theme-style-handle', $css_string);  // Replace 'theme-style-handle' with your theme's stylesheet handle
	}
}
