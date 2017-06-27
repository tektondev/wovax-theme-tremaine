<?php

class Tremaine_Posttype_Developments extends Tremaine_Posttype {
	
	protected $slug = 'developments';
	protected $post_type = 'developments';
	protected $settings = array(
		'_subtitle'	 			=> array('default' => '', 'type' => 'text' ),
		'_residences'	 		=> array('default' => '', 'type' => 'text' ),
		'_unit_mix' 			=> array('default' => '', 'type' => 'text' ),
		'_pricing' 				=> array('default' => '', 'type' => 'text' ),
		'_architect' 			=> array('default' => '', 'type' => 'text' ),
		'_developer' 			=> array('default' => '', 'type' => 'text' ),
		'_interior_designer' 	=> array('default' => '', 'type' => 'text' ),
		'_address' 				=> array('default' => '', 'type' => 'text' ),
		'_more_link'			=> array('default' => '', 'type' => 'text' ),
		'_more_info_modal'		=> array('default' => '', 'type' => 'text' ),
		'_bg_image'				=> array('default' => '', 'type' => 'text' ),
		'_logo'					=> array('default' => '', 'type' => 'text' ),
		'_modal_id' 			=> array('default' => '', 'type' => 'text' ),
		'_modal_link_text' 		=> array('default' => '', 'type' => 'text' ),
		'_prop_search_text' 	=> array('default' => '', 'type' => 'text' ),
	);
	
	protected $args = array(
		'public' 	=> true,
		'supports' 	=> array( 'title', 'editor', 'thumbnail', 'excerpt' )
	);
	
	protected $labels = 'Developments';
	
	protected $genesis_entry_header_title = false;
	
	protected $page_widgets = true;
	
	protected function edit_form_after_title( $post, $settings ){
		
		$modals = $this->get_modals();
		
		include WOVAXTREMAINEPATH . 'includes/include-developments-editor-form.php';
		
	} // end edit_form_after_title
	
	
	public function genesis_after_header(){
		
		global $post;
		
		$settings = $this->get_settings( $post->ID );
		
		$areas = get_terms( 'development_areas', array() );
		
		$modal_id = ( $settings['_modal_id'] )? $settings['_modal_id'] : '4095263';
		
		ob_start();
		
		include locate_template( 'inc/inc-single-developments.php' );
		include locate_template( 'inc/inc-single-developments-content.php' );
		
		$html = ob_get_clean();
		
		$html = apply_filters( 'do_modal_windows', $html );
		
		echo $html;
		
	} // end genesis_entry_content
	
	
	protected function register_taxonomy(){
		
		register_taxonomy(
			'development_areas',
			$this->post_type,
			array(
				'label' => 'Areas',
				'rewrite' => array( 'slug' => 'development-areas' ),
				'hierarchical' => true,
			)
		);
	}
	
	protected function get_developments_gallery( $term_id = false ){
		
		$gallery_html = '';
		
		$args = array(
			'post_type' => $this->post_type,
			'status' => 'publish',
			'posts_per_page' => -1,
		);
		
		if ( $term_id ){
			
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'development_areas',
					'terms'    => $term_id,
				),
			);
			
		} // end if
		
		$the_query = new WP_Query( $args );
		
		$gallery_html .= '<div class="tre-gallery-hover"><ul class="tre-gallery-hover-results">';
		
		if ( $the_query->have_posts() ) {
			
			while ( $the_query->have_posts() ) {
				
				$the_query->the_post();
				
				$featured_img = get_post_thumbnail_id();
		
				if ( $featured_img ){
					
					$featured_img_array = wp_get_attachment_image_src( $featured_img, 'full');
					
					$featured_img = $featured_img_array[0];
					
				} else {
					
					$featured_img = '';
					
				}// end if
				
				$terms = wp_get_post_terms( $the_query->post->ID, 'development_areas', array('fields' => 'names') );
				
				$term_name = ( is_array( $terms ) )? $terms[0] : '';
				
				$gallery_html .= '<li class="tre-gallery-hover-card">';
				
				$gallery_html .= '<ul style="background-image:url(' . $featured_img . ');">';
												
					$gallery_html .= '<li class="tre-gallery-hover-caption"><div class="inner-caption">';
					
					$gallery_html .= '<h5>' . get_the_title() . '</h5>';
					
					$gallery_html .= '<h6>' . $term_name . '</h6>';
					
					$gallery_html .= '<a href="' . get_post_permalink() . '">View Details <i class="fa fa-caret-right" aria-hidden="true"></i></a>';
					
					$gallery_html .= '</div></li>';
				
				$gallery_html .= '</ul>';
				
				$gallery_html .= '</li>';
				
			} // end while
			
			/* Restore original Post Data */
			wp_reset_postdata();
			
		} // end if
		
		$gallery_html .= '</ul></div>';
		
		return $gallery_html;
		
		
	} // end get_developments_gallery
	
	
	protected function get_modals(){
		
		$modals = array( 0 => 'Not Set' );
		
		$args = array(
			'post_type' => 'modal',
			'status'	=> 'publish',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC',
		);
		
		$modal_posts = get_posts( $args );
		
		if ( is_array( $modal_posts ) ){
			
			foreach( $modal_posts as $modal ){
				
				$modals[ $modal->ID ] = $modal->post_title;
				
			} // end foreach
			
		} // end if
		
		return $modals;
		
	} // end get_modals
	
	
	//public function genesis_entry_content(){
		
		//include locate_template( 'inc/inc-single-developments-content.php' );
		
	//} // end genesis_entry_content
	
	
	//public function genesis_before_footer(){
		
		//include locate_template( 'inc/inc-single-developments-footer.php' );
		
	//} // end genesis_before_footer
	
	
} // end Tremaine_Postttype