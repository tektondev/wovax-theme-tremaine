<?php 
/*
Template Name: Import Code
Template Post Type: post, page, event
*/
class Tremaine_Import_Page_Template {
	
	public function __construct(){
		
		add_action( 'genesis_after_header' , array( $this , 'add_code_section' ), 9999 );
		
		add_action( 'pre_get_posts', array( $this , 'edit_genisis_templates' ), 99 );
		
	} // end __construct
	
	
	public function wp_init(){
		
		add_action( 'tremaine_wp_head_style' , array( $this , 'add_feature_css' ) );
		
	} // end wp_init
	
	
	public function add_code_section(){
		
		global $post;
		
		$code = get_post_meta( $post->ID, '_frame_code', true );
		
		$modals = apply_filters( 'do_modal_windows', htmlspecialchars_decode( $code ) );
		
		echo '<iframe id="import-content" src="?tkd-frame=true" frameborder="0" style="width: 100%; height: 9000px; overflow:hidden;"  scrolling="no"></iframe>';
		echo "<script>jQuery( document ).ready( function(){
			  set_frm_height();
		  });
		  
		  jQuery( window ).load( function(){ set_frm_height(); });
		  jQuery( window ).resize( function(){ set_frm_height(); });
		  
		  function set_frm_height(){
			  
			  var frame = jQuery('#import-content');
			  var hght = frame.contents().find('html').outerHeight();
			  frame.height( ( hght + 50 ) + 'px' );
			  
		  } // end set_frm_height
		set_frm_height();</script>";
		
	} // end 
	
	
	//* Remove entry header - all markup
	public function edit_genisis_templates(){
			
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		
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

$import_page = new Tremaine_Import_Page_Template();

genesis();