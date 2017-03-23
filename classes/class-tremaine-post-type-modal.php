<?php

class Tremaine_Post_Type_Modal {
	
	
	public function init(){
		
		add_action( 'init', array( $this , 'register' ) );
		
		add_shortcode( 'tremaine_modal' , array( $this , 'render_shortcode' ) );
		
		add_action( 'wp_footer', array( $this, 'the_modals' ), 100 );
		
		add_filter( 'the_content', array( $this, 'the_content_modals' ), 999 );
		
		add_filter( 'do_shortcode_tag', array( $this, 'the_content_modals' ), 999 );
		
		add_filter( 'do_modal_windows', array( $this, 'the_content_modals' ), 999 );
		
		global $tremaine_modals;
		
		$tremaine_modals = array();
		
	} // end init
	
	
	public function the_content_modals( $content ){
			
		$matches = array();
	
		preg_match_all( '/data-modalid="(.*?)"/', $content, $matches, PREG_PATTERN_ORDER );
		
		if ( ! empty( $matches[1] ) ){
			
			$modals = $matches[1];
			
			foreach( $modals as $modal ){
				
				$id = explode( '-', $modal );
				
				if ( ! empty( $id[1] ) ){
					
					$this->render_shortcode( array( 'id' => $id[1] ), '', 'content_modal' );
					
				} // end if
				
			} // end foreach
			
		} // end if
		
		return $content;
		
	} // end the_content_modals
	
	
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
		
		global $tremaine_modals;
		
		if ( ! isset( $tremaine_modals ) ) $tremaine_modals = array();
		
		$modal_html = '';
		
		$default_atts = array(
			'id' 		=> '',
			'display' 	=> 'image-left',
			'width' 	=> 800,
			'text' => false,
			'button' => 'link',
		);
		
		$atts = shortcode_atts( $default_atts, $atts, $tag );
		
		if ( ! empty( $atts['id'] ) ){
			
			$post = get_post( $atts['id'] ) ;
			
			if ( $post ){
			
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
			
			$modal_display_html = ob_get_clean();
			
			if ( ! array_key_exists( 'modal-' . $atts['id'] , $tremaine_modals ) ){
			
				$tremaine_modals['modal-' . $atts['id'] ] = $modal_display_html;
			
			} // end if
			
			//$modal_html .= $modal_display_html;
			
			} // end if
			
		} // end if
		
		return $modal_html;
		
	} // end render_shortcode
	
	
	public function the_modals(){
		
		global $tremaine_modals;
		
		if ( isset( $tremaine_modals ) && is_array( $tremaine_modals ) ){
			
			foreach( $tremaine_modals as $modal ){
				
				$html = '<div class="tre-modal-frame" style="top: -9999rem;"><div class="tre-modal-window"><a href="#" class="tre-close-modal"><i class="fa fa-times" aria-hidden="true"></i></a><div class="tre-modal-window-content">' . $modal . '</div></div></div>';
   
				echo $html;
				
			} // end foreach
			
		} // end if
		
	} // end the_modals
	
	
} 