<?php

abstract class Tremaine_Shortcode {
	
	protected $tag;
	
	protected $default_atts = array();
	
	
	public function init(){
		
		$this->register();
		
	} // end init
	
	
	public function register(){
		
		if ( method_exists( $this , 'render_shortcode' ) ){
		
			add_shortcode( $this->tag , array( $this , 'the_shortcode' ) );
		
		} // end if
		
	} // end register
	
	
	public function the_shortcode( $atts , $content , $tag ){
		
		$new_atts = shortcode_atts( $this->default_atts , $atts );
		
		$shortcode = $this->render_shortcode( $new_atts , $content, $tag, $atts  );
		
		return $shortcode;
		
	} // end the_shortcode
	
} // end Tremaine_Shortcode


/**
 * ------- Example ------------------------ 
 
class Tremaine_Shortcode_XXXXXXX extends Tremaine_Shortcode {
	
	protected $tag = '';
	
	protected $default_atts = array();
	
	
	public function render_shortcode( $atts , $content, $tag, $atts_orig ){
	} // end render_shortcode
	
} // end Tremaine_Shortcode_XXXXXXX

*/