<?php

abstract class Tremaine_Template {
	
	
	public function __construct(){
		
		$this->add_actions();
		
	}
	
	protected function add_actions(){
		
		if ( method_exists( $this , 'edit_template' ) ){
			
			add_action( 'pre_get_posts', array( $this , 'edit_template' ), 99 );
			
		} // end if
		
	} // ed add_actions
	
	
} // end Tremaine_Template