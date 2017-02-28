<?php

class Tremaine_Shortcode_Agents extends Tremaine_Shortcode {
	
	protected $tag = 'browse_agents';
	
	protected $default_atts = array();
	
	
	public function render_shortcode( $atts , $content, $tag, $atts_orig ){
		
		$keyword = ( ! empty( $_GET['skeyword'] ) ) ? $_GET['skeyword'] : '';
		
		ob_start();
		
		include locate_template( 'inc/inc-agents-form.php' );
		
		return ob_get_clean();
		
	} // end render_shortcode
	
} // end Tremaine_Shortcode_Agents