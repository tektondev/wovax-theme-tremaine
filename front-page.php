<?php

class Tremaine_Front_Page_Template {
	
	public function __construct(){
		
		add_action( 'genesis_after_header' , array( $this , 'add_banner_section' ), 9999 );
		
		add_action( 'pre_get_posts', array( $this , 'edit_genisis_templates' ), 99 );
		
	} // end __construct
	
	
	public function wp_init(){
		
		add_action( 'tremaine_wp_head_style' , array( $this , 'add_feature_css' ) );
		
	} // end wp_init
	
	
	public function add_banner_section(){
		
		$padding = get_theme_mod( 'tremaine_frontpage_padding' , '20%' );
		
		$video_mp4 = get_theme_mod( 'tremaine_frontpage_video_mp4' , false );
		//$video_ogg = $this->get_option( 'wovax_frontpage_bg_video_ogg' ); 
		
		include locate_template( 'inc/inc-frontpage-feature.php' ) ;
		
	} // end 
	
	
	//* Remove entry header - all markup
	public function edit_genisis_templates(){
		
		if ( is_singular('page') ){
			
			global $post;
			
			if ( empty( $post->post_content ) ){
		
				remove_action( 'genesis_loop', 'genesis_do_loop' );
				
			} // end if
		
		} // end if
		
		//* Remove the entry header markup (requires HTML5 theme support)
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
	
		//* Remove the entry title (requires HTML5 theme support)
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	
		//* Remove the entry meta in the entry header (requires HTML5 theme support)
		remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
	
		//* Remove the post format image (requires HTML5 theme support)
		remove_action( 'genesis_entry_header', 'genesis_do_post_format_image', 4 );
		
	} // end 
	
	
} // end Tremaine_Front_Page_Template

$front_page = new Tremaine_Front_Page_Template();

genesis();