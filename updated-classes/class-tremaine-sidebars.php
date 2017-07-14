<?php

class Tremaine_Sidebars {

	
	public function __construct(){
		
		add_action( 'widgets_init', array( $this, 'register_sidebars' ) );
		
	} // end __construct
	
	
	public function register_sidebars(){
		
		register_sidebar( array(
			'name' => 'Mobile Menu',
			'id' => 'mobile_menu',
			'description' => 'Widgets in this area will be shown on the responsive menu.',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		) );
		
		
	} // end register_sidebars
	
	
} // End Tremaine_Sidebars

$temaine_sidebars = new Tremaine_Sidebars();