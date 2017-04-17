<?php

class Tremaine_Videos extends Tremaine_Post_Type {
	
	protected $args 		= array(
      		'public' 		=> true,
			'supports'		=> array( 'title', 'editor', 'thumbnail' ),
			'show_ui'       => true,
			'show_in_menu' 	=> true,
    	);
	protected $post_type 	= 'video';
	protected $labels 		= 'Videos';
	protected $settings 	= array();
	

} // end Tremaine_Videos