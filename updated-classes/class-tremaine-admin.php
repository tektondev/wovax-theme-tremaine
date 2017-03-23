<?php

class Tremaine_Admin {
	
	
	public function init(){
		
		add_action('after_setup_theme', array( $this, 'remove_admin_bar' ) );
		
		add_action( 'admin_init', array( $this , 'remove_dashboard_page') );
		
	} // end init
	
	
	public function remove_dashboard_page(){
		
		global $user_ID;

    	if ( current_user_can( 'subscriber' ) ) {
		
			remove_menu_page('index.php'); // Pages
		
		} // end if
		
	} // end 
	
	
	public function remove_admin_bar() {
		
	  	if ( ! current_user_can('administrator') && ! is_admin() ) {
		  
			show_admin_bar(false);
		
	  	} // end if
		
	} // end remove_admin_bar
	
} // end Tremaine_Admin