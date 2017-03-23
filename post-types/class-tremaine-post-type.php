<?php 

abstract class Tremaine_Post_Type {
	
	protected $args 		= array();
	protected $post_type 	= false;
	protected $labels 		= array();
	protected $settings 	= array();
	
	
	public function init(){
		
		add_action( 'init' , array( $this , 'register' ) );
		
		if ( method_exists( $this , 'edit_form_after_title' ) ) add_action( 'edit_form_after_title' ,  array( $this , 'action_edit_form_after_title' ), 9 );
		
		if ( ! empty( $this->settings ) ) add_action( 'save_post_' . $this->post_type ,  array( $this , 'action_save' ), 9, 3 );
		
		if ( method_exists( $this , 'post_link' ) )  add_filter( 'post_link', array( $this, 'the_post_link' ), 10, 3 );
	
	} // end init
	
	
	public function register(){
		
		$args = $this->args;
		
		if ( is_array( $this->labels ) ){
			
			$args['labels'] = $this->labels;
			
		} else {
			
			$args['label'] = $this->labels;
			
		} // end if
		
		
		register_post_type( $this->post_type, $args );
		
		if ( method_exists( $this , 'register_taxonomy' ) ) {
			
			$this->register_taxonomy();
			
		} // end if
		
	} // end register
	
	
	public function action_edit_form_after_title( $post ){
		
		//var_dump( $post );
		
		if ( $post->post_type == $this->post_type ){
			
			$settings = $this->get_settings( $post->ID );
			
			$this->edit_form_after_title( $post, $settings );
			
		} // end if
		
	} // end action_edit_form_after_title
	
	
	public function the_post_link( $url, $post, $leavename = false ){
		
		if ( $post->post_type == $this->post_type ) {
			
			$settings = $this->get_settings( $post->ID );
			
			$url = $this->post_link( $url, $post, $settings );
			
		} // end if
		
		return $url;
		
	} // end in_init
	
	
	public function get_settings( $post_id ){
		
		$settings = array();
		
		foreach( $this->settings as $key => $values ){
			
			$value = get_post_meta( $post_id, $key, true );
			
			$settings[ $key ] = ( empty( $value ) )? $values['default'] : $value; 
			
		} // end foreach
		
		$featured_img = get_post_thumbnail_id( $post_id );
		
		if ( $featured_img ){
			
			$featured_img_array = wp_get_attachment_image_src( $featured_img, 'full');
			
			$featured_img = $featured_img_array[0];
			
		} // end if
		
		$settings['featured_image'] = ( $featured_img )? $featured_img : '';
		
		return $settings;
		
	} // end get_settings
	
	
	public function action_save( $post_id, $post, $update ){
		
		$settings = $this->get_settings_form();
		
		foreach( $settings as $key => $value ){
			
			update_post_meta( $post_id, $key, $value );
			
		} // end foreach
		
		
	} // end action_save
	
	
	protected function get_settings_form(){
		
		$settings = array();
		
		foreach( $this->settings as $key => $values ){
			
			if ( isset( $_POST[ $key ] ) ) {
			
				if ( $values['type']  == 'raw' ){
					
					$settings[ $key ] = $_POST[ $key ];
					
				} else {
					
					$settings[ $key ] = sanitize_text_field( $_POST[ $key ] );
					
				} // end if
			
			} // end if
			
		} // end foreach
		
		return $settings;
		
	} // end get_settings
	
} // end Tremaine_Post_Type