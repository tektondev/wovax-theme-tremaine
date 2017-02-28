<?php

class Tremaine_Share_Modal {
	
	
	public function init(){
		
		add_action( 'wp_footer' , array( $this, 'the_modal' ) );
		
		add_action( 'widgets_init', array( $this, 'register_sidebar' ) );
		
		//add_action( 'loop_start', array( $this, 'jptweak_remove_share' ) );
		
	} // end add_modal
	
	
	public function jptweak_remove_share() {
		
   	 	remove_filter( 'the_content', 'sharing_display',19 );
		
    	remove_filter( 'the_excerpt', 'sharing_display',19 );
		
    	if ( class_exists( 'Jetpack_Likes' ) ) {
			
        	remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
			
    	} // end if
		
	} // end jptweak_remove_share
	
	
	public function the_modal(){
			
			if ( function_exists( 'sharing_display' ) ) {
				
				echo '<div id="tremaine-share-modal-bg" class="close-share-modal" style="display:none"></div><div id="tremaine-share-modal" style="top: -9999rem"><a href="#" class="close-share-modal"><i class="fa fa-times" aria-hidden="true"></i></a>';
				
				sharing_display( '', true );
				
				echo '</div>';
				
			}
			
			if ( class_exists( 'Jetpack_Likes' ) ) {
				
				
				
					$custom_likes = new Jetpack_Likes;
					echo $custom_likes->post_likes( '' );
			}
		
	} // end the_modal
	
	
	public function register_sidebar(){
		
		 register_sidebar( array(
			'name' => 'Social Modal',
			'id' => 'social-modal',
			'description' => 'Social icons modal for share action',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		) );
		
		
	} // end register_sidebar
	
	
}