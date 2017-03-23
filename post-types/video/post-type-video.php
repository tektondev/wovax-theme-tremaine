<?php

class Tremaine_Videos extends Tremaine_Post_Type {
	
	protected $args 		= array(
      		'public' 		=> true,
			'supports'		=> array( 'title', 'editor','thumbnail' ),
			'show_ui'       => true,
			'show_in_menu' 	=> true,
    	);
	protected $post_type 	= 'video';
	protected $labels 		= 'Videos';
	protected $settings 	= array( 
		'_video_url'	 	=> array('default' => '', 'type' => 'text' ),
		);
		
		
	protected function post_link( $url, $post, $settings ){
		
		$url = $settings['_video_url'];
		
		return $url;
		
	} // end in_init
	
	
	protected function edit_form_after_title( $post, $settings ){
		
		include WOVAXTREMAINEPATH . 'parts/videos/editor.php';
		
	} // end edit_form_after_title
	

} // end Tremaine_Videos