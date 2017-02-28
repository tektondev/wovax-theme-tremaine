<?php

class Tremaine_Profile_Template extends Tremaine_Template {
	
	public function __construct(){
		
		parent::__construct();
		
	}
	
	
	public function edit_template(){
		
		global $wp_query;

		if ( array_key_exists( 'agent', $wp_query->query_vars ) ) {
		
			remove_action( 'genesis_loop', 'genesis_do_loop' );
			
			add_action( 'genesis_after_header' , array( $this , 'the_profile' ), 999 );
			
		} // end if
		
	} // end edit_template
	
	
	public function the_profile(){
		
		$user = $this->return_user();
		
		if ( ! empty( get_user_meta( $user->ID , '_wovax_user_profile_video', true ) ) || isset( $_GET['video'] ) ){
			
			$embed = wp_oembed_get( 'https://www.youtube.com/watch?v=Da8jaZUW-Gg' );
			
			$this->add_auto_play( $embed );
			
			include locate_template( 'inc/inc-profile-video.php' ) ;
			
			echo '<div class="has-video">';
			
			include locate_template( 'inc/inc-profile-banner.php' ) ;
			
			echo '</div>';
			
		} else {
			
			include locate_template( 'inc/inc-profile-banner.php' ) ;
			
		} // end if
		
		include locate_template( 'inc/inc-profile-about.php' ) ;
		
		include locate_template( 'inc/inc-profile-tabs.php' ) ;
		
	}
	
	public function return_user(){
		
		global $wp_query;
		
		$roles = array( 'agent');
		
		$user_id = false;
		
		foreach( $roles as $role ){
			
			if ( ! empty( $wp_query->query_vars[ $role ] ) ) {
				
				$user_id = $wp_query->query_vars[ $role ];
				break;
				
			} // end if
			
		} // end foreach
		
		if (  $user_id ){
			
			$user = get_user_by( 'slug' , $user_id );
			
			return $user;
			
		} // end if
		
		return false;
		
	} // end return_user
	
	
	public function add_auto_play( &$video_embed ){
		
		if ( strpos( $video_embed , 'youtube' ) > 0 ) {
			
			$video_embed = preg_replace_callback( 
				'/src="(.*?)"/',
				function ($matches) {
					return 'src="' . $matches[1] . '&rel=0&autoplay=1"';
				}, 
				$video_embed
			);
			
		} // end if
		
	} // end add_auto_play
	
	
} // end Tremaine_Property_Template

$profile = new Tremaine_Profile_Template();

genesis();