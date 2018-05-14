<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Kava_Child_Archive_Document extends Jet_Document_Base {

	public function get_name() {
		return 'kava_child_archive';
	}

	public static function get_title() {
		return __( 'Kava Child Archive', 'kava-child' );
	}

	public function get_preview_as_query_args() {
		return array(
			'post_type'   => 'post',
			'numberposts' => get_option( 'posts_per_page', 10 ),
		);
	}

}