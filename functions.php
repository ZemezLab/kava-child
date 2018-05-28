<?php
/**
 * Child functions and definitions.
 */
add_filter( 'kava-theme/assets-depends/styles', 'kava_child_styles_depends' );
add_filter( 'kava-theme/disabled-modules', 'kava_child_disabled_modules' );
add_action( 'jet-theme-core/register-config', 'kava_child_core_config' );
add_action( 'init', 'kava_child_plugins_wizard_config', 9 );
add_action( 'init', 'kava_child_data_importer_config', 9 );

/**
 * Enqueue styles.
 */
function kava_child_styles_depends( $deps ) {

	$parent_handle = 'kava-parent-theme-style';

	wp_register_style(
		$parent_handle,
		get_template_directory_uri() . '/style.css',
		array(),
		kava_theme()->version()
	);

	$deps[] = $parent_handle;

	return $deps;
}

/**
 * Register JetThemeCore config
 *
 * @param  [type] $manager [description]
 * @return [type]          [description]
 */
function kava_child_core_config( $manager ) {
	$manager->register_config(
		array(
			'dashboard_page_name' => esc_html__( 'Kava Child', 'kava-child' ),
			'library_button'      => false,
			'menu_icon'           => 'dashicons-admin-generic',
			'api'                 => array( 'enabled' => false ),
		)
	);
}

/**
 * Disabled not required modules.
 *
 * @param  array $modules Default disabled modules
 * @return array
 */
function kava_child_disabled_modules( $modules ) {
	$modules[] = 'blog-layouts';
	return $modules;
}

/**
 * Register Jet Plugins Wizards config
 * @return [type] [description]
 */
function kava_child_plugins_wizard_config() {

	if ( ! is_admin() ) {
		return;
	}

	if ( ! function_exists( 'jet_plugins_wizard_register_config' ) ) {
		return;
	}

	jet_plugins_wizard_register_config( array(
		'license' => array(
			'enabled' => false,
		),
		'plugins' => array(
			'jet-data-importer' => array(
				'name'   => esc_html__( 'Jet Data Importer', 'kava-child' ),
				'source' => 'remote',
				'path'   => 'https://github.com/ZemezLab/jet-data-importer/archive/master.zip',
				'access' => 'base',
			),
			'kava-extra' => array(
				'name'   => esc_html__( 'Kava Extra', 'kava-child' ),
				'source' => 'remote',
				'path'   => 'https://github.com/ZemezLab/kava-extra/archive/master.zip',
				'access' => 'base',
			),
			'elementor' => array(
				'name'   => esc_html__( 'Elementor', 'kava-child' ),
				'access' => 'skins',
			),
		),
		'skins'   => array(
			'base' => array(
				'jet-data-importer',
				'kava-extra',
			),
			'advanced' => array(
				'default' => array(
					'full'  => array(
						'elementor',
						'jet-blog',
						'jet-blocks',
						'jet-elements',
						'jet-tabs',
						'jet-theme-core',
						'jet-tricks',
						'jet-menu',
						'jet-reviews',
					),
					'lite'  => false,
					'demo'  => '',
					'thumb' => get_template_directory_uri() . '/assets/demo-content/default/default.jpg',
					'name'  => esc_html__( 'Default', 'kava-child' ),
				),
			),
		),
		'texts'   => array(
			'theme-name' => esc_html__( 'Kava Child', 'kava-child' ),
		)
	) );

}

/**
 * Register Jet Data Importer config
 * @return [type] [description]
 */
function kava_child_data_importer_config() {

	if ( ! is_admin() ) {
		return;
	}

	if ( ! function_exists( 'jet_data_importer_register_config' ) ) {
		return;
	}

	jet_data_importer_register_config( array(
		'xml' => false,
		'advanced_import' => array(
			'default' => array(
				'label'    => esc_html__( 'Default', 'kava-child' ),
				'full'     => get_template_directory() . '/assets/demo-content/default/default.xml',
				'lite'     => false,
				'thumb'    => get_template_directory_uri() . '/assets/demo-content/default/default.jpg',
				'demo_url' => '',
			),
		),
		'import' => array(
			'chunk_size' => 3,
		),
		'slider' => array(
			'path' => 'https://raw.githubusercontent.com/JetImpex/wizard-slides/master/slides.json',
		),
		'export' => array(
			'options' => array(
				'woocommerce_default_country',
				'woocommerce_techguide_page_id',
				'woocommerce_default_catalog_orderby',
				'techguide_catalog_image_size',
				'techguide_single_image_size',
				'techguide_thumbnail_image_size',
				'woocommerce_cart_page_id',
				'woocommerce_checkout_page_id',
				'woocommerce_terms_page_id',
				'tm_woowishlist_page',
				'tm_woocompare_page',
				'tm_woocompare_enable',
				'tm_woocompare_show_in_catalog',
				'tm_woocompare_show_in_single',
				'tm_woocompare_compare_text',
				'tm_woocompare_remove_text',
				'tm_woocompare_page_btn_text',
				'tm_woocompare_show_in_catalog',

				'site_icon',
				'elementor_cpt_support',
				'elementor_disable_color_schemes',
				'elementor_disable_typography_schemes',
				'elementor_container_width',
				'elementor_css_print_method',
				'elementor_global_image_lightbox',

				'jet-elements-settings',
				'jet_menu_options',

				'highlight-and-share',
				'stockticker_defaults',
				'wsl_settings_social_icon_set',
			),
			'tables' => array(),
		),
	) );

}
