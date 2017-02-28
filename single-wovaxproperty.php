<?php

class Tremaine_Property_Template extends Tremaine_Template{
	
	protected $remove_loop = true;
	
	
	public function __construct(){
		
		parent::__construct();
		
	} // end __construct
	
	
	public function edit_template(){
		
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		
		add_action( 'genesis_loop' , array( $this , 'render_property' ) );
		
	}
	
	
	public function render_property(){
		
		global $post;
		
		require_once 'classes/class-tremaine-property-factory.php';
		$property_factory = new Tremaine_Property_Factory();
		
		$property = $property_factory->get_property( $post ); 
	
		echo $property->get_detail_page();
		
	} // end render_property	
	
} // end Tremaine_Property_Template

$property_page = new Tremaine_Property_Template();

genesis();