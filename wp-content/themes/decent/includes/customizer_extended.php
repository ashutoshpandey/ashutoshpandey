<?php
/**
 * Contains Customizer Extended Controls
 *
 * @since 1.0
 */
 

if ( class_exists( 'WP_Customize_Control' )):

	/**
	 * Decent Customize Important Links Control
	 *
	 * Controls Important Links for the Theme
	 */
	class Decent_Customize_Important_Links_Control extends WP_Customize_Control {
	
		public function render_content() {
			echo '<p><a href="'.DECENT_DOCS_URL.'" target="_blank">'.__('Theme Documentation','decent').'</a></p>';
			//echo '<p><a href="" target="_blank">'.__('Theme Support','decent').'</a></p>';
			echo '<p><a href="'.DECENT_CONTACT_URL.'" target="_blank">'.__('Contact us','decent').'</a></p>';
		}
	}

endif;