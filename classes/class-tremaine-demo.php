<?php

class Tremaine_Demo {
		
	
	public function init(){
		
		if ( isset( $_GET['comp'] ) ){
		
			add_action( 'genesis_before' , array( $this , 'add_comp' ) );
		
		} // end if
		
	} // end init
	
	
	public function add_comp(){
		
		$path = get_stylesheet_directory_uri() . '/comps/';
		
		switch( $_GET['comp']  ){
			case 'sell':
				$comp = 'sell.jpg';
				break;
			case 'listing':
				$comp = 'mls-property.jpg';
				break;
			case 'listings':
				$comp = 'mls-search-results.jpg';
				break;
			case 'agent':
				$comp = 'agent.jpg';
				break;
			case 'developments':
				$comp = 'developments.jpg';
				break;
			case 'neighborhoods':
				$comp = 'neighborhood.jpg';
				break;
			case 'agents':
				$comp = 'agent-search.jpg';
				break;
			default:
				$comp = 'homepage.jpg';
			
		} // end switch
		
		echo '<div style="position:absolute;width:100%;top:0;left:0;opacity:0.5;z-index:99999" class="comp-overlay-wrap"><img style="display:block;margin: 0 auto;" class="comp-overlay" src="' . $path . $comp . '" /></div>';
				
	} // end add_comp	
	
}