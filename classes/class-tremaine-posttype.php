<?php

abstract class Tremaine_Posttype {
	
	protected $slug;
	protected $args;
	protected $labels;
	protected $genesis_post_info = false;
	protected $genesis_loop = true;
	protected $genesis_entry_content = true;
	protected $genesis_entry_header_title = true;
	protected $page_widgets = false;
	
	protected $post_type;
	protected $settings = array();
	
	
	public function init(){
		
		add_action( 'init' , array( $this , 'register' ) );
		
		if ( method_exists( $this , 'edit_form_after_title' ) ) add_action( 'edit_form_after_title' ,  array( $this , 'action_edit_form_after_title' ), 9 );
		
		if ( ! empty( $this->settings ) ) add_action( 'save_post_' . $this->post_type ,  array( $this , 'action_save' ), 9, 3 );
		
		if ( method_exists( $this , 'register_shortcodes' ) ) { $this->register_shortcodes(); }
		
	} // end init
	
	
	public function template_init(){
		
		add_action( 'pre_get_posts', array( $this , 'edit_template_structure' ), 99 );	
		
	} // end template_init
	
	
	public function edit_template_structure(){
		
		if ( ! $this->genesis_post_info ) remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
		if ( ! $this->genesis_loop ) remove_action( 'genesis_loop', 'genesis_do_loop' );
		if ( ! $this->genesis_entry_content ) remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
		if ( ! $this->genesis_entry_header_title ) remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
		if ( $this->page_widgets ) add_action( 'genesis_before_footer' , array( $this , 'add_before_footer' ), 11 );
		
		if ( method_exists( $this , 'genesis_before_content' ) ) add_action( 'genesis_before_content' ,  array( $this , 'genesis_before_content' ) );
		if ( method_exists( $this , 'genesis_loop' ) ) add_action( 'genesis_loop' ,  array( $this , 'genesis_loop' ) );
		if ( method_exists( $this , 'genesis_entry_content_before' ) ) add_action( 'genesis_entry_content' ,  array( $this , 'genesis_entry_content_before' ), 1 );
		if ( method_exists( $this , 'genesis_entry_content' ) ) add_action( 'genesis_entry_content' ,  array( $this , 'genesis_entry_content' ) );
		if ( method_exists( $this , 'genesis_before_footer' ) ) add_action( 'genesis_before_footer' ,  array( $this , 'genesis_before_footer' ) );
		if ( method_exists( $this , 'genesis_after_header' ) ) add_action( 'genesis_after_header' ,  array( $this , 'genesis_after_header' ), 99 );
		
	}
	
	
	public function action_save( $post_id, $post, $update ){
		
		$settings = $this->get_settings_form();
		
		foreach( $settings as $key => $value ){
			
			update_post_meta( $post_id, $key, $value );
			
		} // end foreach
		
		
	} // end action_save
	
	
	public function action_edit_form_after_title( $post ){
		
		//var_dump( $post );
		
		if ( $post->post_type == $this->post_type ){
			
			$settings = $this->get_settings( $post->ID );
			
			$this->edit_form_after_title( $post, $settings );
			
		} // end if
		
	} // end action_edit_form_after_title
	
	
	public function register(){
		
		$args = $this->args;
		
		if ( is_array( $this->labels ) ){
			
			$args['labels'] = $this->labels;
			
		} else {
			
			$args['label'] = $this->labels;
			
		} // end if
		
		
		register_post_type( $this->slug, $args );
		
		if ( method_exists( $this , 'register_taxonomy' ) ) {
			
			$this->register_taxonomy();
			
		} // end if
		
	} // end register
	
	public function add_before_footer(){
			
			if ( is_active_sidebar( 'tremaine_page_after') ) {
		
			echo '<section class="tre-page-after"><div class="wrap">';
				
				ob_start();
				
					dynamic_sidebar( 'tremaine_page_after' ); 
				
				$html = ob_get_clean();
				
				echo apply_filters( 'do_modal_windows', $html );
				
				echo '</div></section>';
			
		} // end if
		
		if ( is_active_sidebar( 'tremaine_page_footer_before') ) {
		
			echo '<nav class="tre-page-after-nav"><div class="wrap">';
				
				ob_start();
				
					dynamic_sidebar( 'tremaine_page_footer_before' );
				
				$html = ob_get_clean();
				
				echo apply_filters( 'do_modal_windows', $html );
				
				echo '</div></nav>';
			
		} // end if
		
	}
	
	
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
	
	
	protected function get_settings_form(){
		
		$settings = array();
		
		foreach( $this->settings as $key => $values ){
			
			if ( isset( $_POST[ $key ] ) ){
			
				if ( $values['type']  == 'raw' ){
					
					$settings[ $key ] = $_POST[ $key ];
					
				} else {
					
					$settings[ $key ] = sanitize_text_field( $_POST[ $key ] );
					
				} // end if
			
			} // end if
			
		} // end foreach
		
		return $settings;
		
	} // end get_settings
	
	
} // end Tremaine_Postttype