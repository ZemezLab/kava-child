<?php

if ( ! class_exists( 'Kava_Child_Structure_404' ) ) {

	/**
	 * Define Kava_Child_Structure_404 class
	 */
	class Kava_Child_Structure_404 extends Jet_Theme_Core_Structure_Base {

		public function get_id() {
			return 'kava_child_404';
		}

		public function get_single_label() {
			return esc_html__( 'Kava Child 404', 'jet-theme-core' );
		}

		public function get_plural_label() {
			return esc_html__( 'Kava Child 404', 'jet-theme-core' );
		}

		public function get_sources() {
			return array();
		}

		public function get_document_type() {
			return array(
				'class' => 'Kava_Child_404_Document',
				'file'  => get_theme_file_path( 'document-types/404.php' ),
			);
		}

		/**
		 * Is current structure could be outputed as location
		 *
		 * @return boolean
		 */
		public function is_location() {
			return true;
		}

		/**
		 * Location name
		 *
		 * @return boolean
		 */
		public function location_name() {
			return 'kava_child_404';
		}

		/**
		 * Aproprite location name from Elementor Pro
		 * @return [type] [description]
		 */
		public function pro_location_mapping() {
			return '404';
		}

	}

}
