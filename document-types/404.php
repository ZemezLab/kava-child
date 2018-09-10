<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Kava_Child_404_Document extends Jet_Document_Base {

	public function get_name() {
		return 'kava_child_404';
	}

	public static function get_title() {
		return __( 'Kava Child 404', 'jet-theme-core' );
	}

}
