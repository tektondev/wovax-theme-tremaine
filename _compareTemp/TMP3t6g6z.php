<?php

class Tremaine_Index_Template extends Tremaine_Template {
	
	
	public function genesis_before_content(){
		
		global $post;
		
		if ( ! is_singular() && ! is_archive() ){
			
			echo '<h1>Luxury Lifestyle Blog</h1>';
			
		} // end if
		
	} // end genesis_after_header
	
	
	public function body_class( $classes ){
		
		global $post;
		
		if ( ! is_singular() && ! is_archive() ){
			
			$classes[] = 'blog-template';
			
		} // end if
		
		return $classes;
		
	} // end body_class
	
	
} // end Tremaine_Index_Template

$tremaine_template = new Tremaine_Index_Template();

genesis();