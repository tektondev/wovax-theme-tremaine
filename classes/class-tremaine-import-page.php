<?php

class Tremaine_Import_Page {
	
	
	public function init(){
		
		add_filter( 'template_include', array( $this, 'template_include' ), 9999 );
		
		add_action( 'edit_form_after_title', array( $this, 'edit_form_after_title' ), 1 );
		
		add_action( 'save_post_page', array( $this , 'save_code' ), 99 );
		
	} // end init
	
	
	public function template_include( $template ){
		
		if ( isset( $_GET['tkd-frame'] ) ){
			
			$template = WOVAXTREMAINEPATH . 'frame.php';
			
		} // end if
		
		return $template;
		
	} // end template_include
	
	
	public function edit_form_after_title( $post ){
		
		if ( get_page_template_slug( $post->ID ) == 'page-import.php' ){
			
			$code = get_post_meta( $post->ID , '_frame_code', true );
			
			echo '<h2>HTML Code</h2><textarea name="_frame_code" style="width:100%;height: 900px;">' . htmlspecialchars( $code ) . '</textarea>';
			
			remove_post_type_support( 'page', array( 'editor','excerpt', ) );
			
		}
		
	} // end 
	
	
	public function save_code( $post_id ){
		
		if ( isset( $_POST['_frame_code'] ) ){
			
			update_post_meta( $post_id, '_frame_code', $_POST['_frame_code'] );
			
		} // end if
		
	}
	
	
}