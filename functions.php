<?php
/**
 * Child functions and definitions.
 */
add_filter( 'kava-theme/assets-depends/styles', 'kava_child_styles_depends' );
add_filter( 'kava-theme/disabled-modules', 'kava_child_disabled_modules' );
add_action( 'jet-theme-core/register-config', 'kava_child_core_config' );

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
