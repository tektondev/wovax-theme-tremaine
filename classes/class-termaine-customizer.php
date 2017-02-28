<?php
class Tremaine_Customizer {
	
	public function init(){
		
		// Adds custom header support to customizer
		add_action( 'customize_register', array( $this , 'add_customizer_sections' ) );
		
	} // end do_init
	
	
	public function add_customizer_sections( $wp_customize ){
		
		$panel = 'Tremaine_theme';
		
		$wp_customize->add_panel( $panel, array(
		  'title' 		=> 'Tremaine Theme Options',
		  'description' => 'Options for the Tremaine theme',
		  'priority' 	=> 10, // Mixed with top-level-section hierarchy.
		) );
		
		
		//$this->add_header( $wp_customize  , $panel );
		
		//$this->add_frontpage( $wp_customize  , $panel );
		
		//$this->add_profile( $wp_customize  , $panel );
		
	} // end do_add_customizer
	
} // end WT_Tremaine_Customizer