<?php

class Tremaine_Post_Type_Modal {
	
	
	public function init(){
		
		add_action( 'init', array( $this , 'register' ) );
		
		add_shortcode( 'tremaine_modal' , array( $this , 'render_shortcode' ) );
		
	} // end init
	
	
	public function register(){
		
		$args = array(
      		'public' 		=> true,
     		'label'  		=> 'Modals',
			'supports'		=> array( 'title', 'editor', 'thumbnail' ),
			'show_ui'       => true,
			'show_in_menu' 	=> true,
    	);
		
   		register_post_type( 'modal', $args );
		
	} // end Register
	
	
	public function render_shortcode( $atts, $content, $tag ){
		
		$modal_html = '';
		
		$default_atts = array(
			'id' 		=> '',
			'display' 	=> 'image-left',
			'width' 	=> 800,
			'text' => false,
			'button' => 'link',
		);
		
		$atts = shortcode_atts( $default_atts, $atts, $tag );
		
		error_reporting(E_ALL);
ini_set('display_errors','1');
		
		if ( ! empty( $atts['id'] ) ){
			
			$post = get_post( $atts['id'] ) ;
			
			$modal_id = 'modal-' . $post->ID;
			
			$thumb_id = get_post_thumbnail_id( $post->ID);
			
			if ( ! empty( $thumb_id ) ) {
				
				$thumb_url_array = wp_get_attachment_image_src( $thumb_id, 'large', true ); 
				$img_url = $thumb_url_array[0];
				
			} else {
				
				$img_url = false;
				
			} // end if
			
			if ( $atts['text'] ) {
			
				switch( $atts['button'] ){
				
					case 'button-light':
						$modal_html .= '<a href="#" class="tre-button-light show-modal" data-modalid="' . $modal_id . '">' . $atts['text'] . '</a>';
						break;
					case 'button-dark':
						$modal_html .= '<a href="#" class="tre-button-dark show-modal" data-modalid="' . $modal_id . '">' . $atts['text'] . '</a>';
						break;
					default:
						$modal_html .= '<a href="#" class="show-modal" data-modalid="' . $modal_id . '">' . $atts['text'] . '</a>';
						break;
					
				} // end switch
				
			} // end if
			
			ob_start();
			
			switch( $atts['display'] ){
				
				default:
					include WOVAXTREMAINEPATH . 'includes/include-modal-shortcode-image-left.php';
					break;
				
			} // end switch
			
			$modal_html .= ob_get_clean();
			
		} // end if
		
		return $modal_html;
		
	} // end render_shortcode
	
	
	
} 