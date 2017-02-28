<?php

class Tremaine_Shortcode_Listing extends Tremaine_Shortcode {
	
	protected $tag = 'tremaine_listing';
	
	protected $default_atts = array();
	
	
	public function render_shortcode( $atts , $content, $tag, $atts_orig ){
		
		ob_start();
		
		include locate_template( 'inc/inc-listing-gallery.php' );
		
		return ob_get_clean();
		
	} // end render_shortcode
	
} // end Tremaine_Shortcode_Agents