<?php

class Tremaine_Post_Type_Office extends Tremaine_Posttype  {
	
	protected $slug = 'office';
	protected $post_type = 'office';
	protected $settings = array(
		'_title'	 		=> array('default' => 'Jameson Sotheby\'s International Realty', 'type' => 'text' ),
		'_address1'	 	=> array('default' => '', 'type' => 'text' ),
		'_address2'	 	=> array('default' => '', 'type' => 'text' ),
		'_city'	 		=> array('default' => '', 'type' => 'text' ),
		'_state'	 		=> array('default' => '', 'type' => 'text' ),
		'_zip'	 		=> array('default' => '', 'type' => 'text' ),
		'_phone'	 		=> array('default' => '', 'type' => 'text' ),
		'_email'	 		=> array('default' => '', 'type' => 'text' ),
		'_website'	 		=> array('default' => '', 'type' => 'text' ),
		'_office_id'		=> array('default' => '', 'type' => 'text' ),
		'_map_link'		=> array('default' => '', 'type' => 'text' ),
	);
	
	protected $args = array(
		'public' 	=> true,
		'supports' 	=> array( 'title', 'editor', 'excerpt','thumbnail' ),
	);
	
	protected $labels = 'Offices';
	
	
	protected function edit_form_after_title( $post, $settings ){
		
		include WOVAXTREMAINEPATH . 'parts/office/post-editor-form.php';
		
	} // end edit_form_after_title
	
	
	public function register_shortcodes(){
		
		add_shortcode( 'tremaine_offices' , array( $this , 'render_shortcode' ) );
		
	} // end 
	
	
	//public function init(){
		
		//add_action( 'init', array( $this , 'register' ) );
		
		//add_shortcode( 'tremaine_modal' , array( $this , 'render_shortcode' ) );
		
		//add_action( 'wp_footer', array( $this, 'the_modals' ), 100 );
		
		//add_filter( 'the_content', array( $this, 'the_content_modals' ), 999 );
		
		//add_filter( 'do_shortcode_tag', array( $this, 'the_content_modals' ), 999 );
		
		//add_filter( 'do_modal_windows', array( $this, 'the_content_modals' ), 999 );
		
		//global $tremaine_modals;
		
		//$tremaine_modals = array();
		
	//} // end init
	

	
	
	/*public function register(){
		
		$args = array(
      		'public' 		=> true,
     		'label'  		=> 'Offices',
			'supports'		=> array( 'title', 'editor', 'excerpt','thumbnail' ),
			'show_ui'       => true,
			'show_in_menu' 	=> true,
    	);
		
   		register_post_type( 'office', $args );
		
	} // end Register*/
	
	
	public function render_shortcode( $atts, $content, $tag ){
		
		$html = '';
		
		$cards = $this->get_office_cards( $atts );
		
		ob_start();
		
		include WOVAXTREMAINEPATH . 'parts/office/office-card-gallery.php';
		
		$html .= ob_get_clean();
		
		return $html;
		
	} // end render_shortcode
	
	
	public function get_office_cards( $atts ){
		
		$html = '';
		
		$offices = array();
		
		$the_query = new WP_Query( array( 'post_type' => 'office', 'status' => 'publish', 'posts_per_page' => -1 ) );

		if ( $the_query->have_posts() ) {
			
			while ( $the_query->have_posts() ) {
				
				$the_query->the_post();
				
				$html .= get_the_title();
				
				$settings = $this->get_settings( $the_query->post->ID );
				
				$settings['excerpt'] = get_the_excerpt();
		
				$settings['link'] = get_post_permalink();
				
				$offices[] = $this->get_office_card( $settings, $the_query->post, $atts );
				
			} // end while

			wp_reset_postdata();
			
		} // end if
		
		if ( count( $offices ) < 2 ){
			
			$offices[] = $offices[0];
			$offices[] = $offices[0];
			$offices[] = $offices[0];
			$offices[] = $offices[0];
			$offices[] = $offices[0];
			
		} // end if
		
		return $offices;
		
	}
	
	
	public function get_office_card( $settings, $post, $atts = array() ){
		
		ob_start();
		
		include WOVAXTREMAINEPATH . 'parts/office/office-card.php';
		
		return ob_get_clean();
		
	} // end get_office_card
		
} 