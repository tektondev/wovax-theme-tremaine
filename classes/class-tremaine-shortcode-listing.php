<?php

class Tremaine_Shortcode_Listing extends Tremaine_Shortcode {
	
	protected $tag = 'tremaine_listing';
	
	protected $default_atts = array();
	
	
	public function render_shortcode( $atts , $content, $tag, $atts_orig ){
		
		require_once 'class-tremaine-property-factory.php';
		
		$property_factory = new Tremaine_Property_Factory();
		
		$properties = $property_factory->get_properties();
		
		ob_start();
		
		include locate_template( 'inc/inc-listing-gallery.php' );
		
		return ob_get_clean();
		
	} // end render_shortcode
	
} // end Tremaine_Shortcode_Agents