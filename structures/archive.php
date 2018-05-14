<?php

if ( ! class_exists( 'Kava_Child_Structure_Archive' ) ) {

	/**
	 * Define Kava_Child_Structure_Archive class
	 */
	class Kava_Child_Structure_Archive extends Jet_Theme_Core_Structure_Base {

		public function get_id() {
			return 'kava_child_archive';
		}

		public function get_single_label() {
			return esc_html__( 'Kava Child Archive', 'kava-child' );
		}

		public function get_plural_label() {
			return esc_html__( 'Kava Child Archives', 'kava-child' );
		}

		public function get_sources() {
			return array();
		}

		public function get_document_type() {
			return array(
				'class' => 'Kava_Child_Archive_Document',
				'file'  => get_theme_file_path( 'document-types/archive.php' ),
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
			return 'kava_child_archive';
		}

		/**
		 * Aproprite location name from Elementor Pro
		 *
		 * @return [type] [description]
		 */
		public function pro_location_mapping() {
			return 'archive';
		}

	}

}
