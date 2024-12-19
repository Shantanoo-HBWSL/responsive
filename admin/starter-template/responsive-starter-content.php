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
		error_log("Post ID: ".$post_ID);

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
			// 'home'     => array(
			// 	'type'      => 'post_type',
			// 	'object'    => 'page',
			// 	'object_id' => '{{' . self::HOME_SLUG . '}}',
			// ),
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
				// 'mobile_menu' => array(
				// 	'name'  => esc_html__( 'Primary', 'responsive' ),
				// 	'items' => $nav_items_header,
				// ),
			),
			'theme_mods'  => array(
				'custom_logo' => '{{logo}}',
				'nav_menu_locations' => array(
    			    'header-menu' => '{{header-menu}}', // Assign the menu to the primary location
    			),
			),
			'options'     => array(
				'page_on_front' => '{{' . self::HOME_SLUG . '}}',
				'show_on_front' => 'page',
			),
			'posts'       => array(
				self::HOME_SLUG => require RESPONSIVE_THEME_DIR . 'admin/starter-template/responsive-home.php', // PHPCS:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			),
		);

		return apply_filters( 'responsive_starter_content', $content );
	}
}
