<?php

class Tremaine_Posttype_Neighborhoods extends Tremaine_Posttype {
	
	protected $slug = 'neighborhoods';
	protected $post_type = 'neighborhoods';
	protected $settings = array(
		'_property_filter_field_name'	 	=> array('default' => '', 'type' => 'text' ),
		'_property_filter_field_value' 		=> array('default' => '', 'type' => 'text' ),
		'_property_filter_field_logic' 		=> array('default' => 'OR', 'type' => 'text' ),
		'_property_filter_compare' 			=> array('default' => '', 'type' => 'text' ),
		'_property_filter_case_sensitive' 	=> array('default' => '', 'type' => 'text' ),
		'_html_code' 						=> array('default' => '', 'type' => 'raw' ),
		'_longitude' 						=> array('default' => '', 'type' => 'text' ),
		'_latitude' 						=> array('default' => '', 'type' => 'text' ),
		'_geo_zoom' 						=> array('default' => '', 'type' => 'text' ),
	);
	
	protected $args = array(
		'public' => true,
	);
	
	protected $labels = 'Neighborhoods';
	
	
	protected function edit_form_after_title( $post, $settings ){
		
		include WOVAXTREMAINEPATH . 'includes/include-neighborhood-editor-form.php';
		
	} // end edit_form_after_title
	
	
	public function genesis_entry_content_before(){
		
		global $post;
		
		$settings = $this->get_settings( $post->ID );
		
		$ls = '[tremaine_listing sort_by="Price-numeric-desc" ';
		if ( ! empty( $settings['_property_filter_field_name'] ) ) $ls .= 'custom_field="' . $settings['_property_filter_field_name'] . '" ';
		if ( ! empty( $settings['_property_filter_field_value'] ) ) $ls .= 'custom_field_value="' . $settings['_property_filter_field_value'] . '" ';
		if ( ! empty( $settings['_property_filter_compare'] ) ) $ls .= 'compare="' . $settings['_property_filter_compare'] . '" ';
		$ls .= ' posts_per_page="6"]';
		
		$geo_zoom = ( ! empty( $settings['_geo_zoom'] ) ) ? $settings['_geo_zoom'] : 14;
		
		echo do_shortcode( $ls );
		
		include locate_template( 'inc/inc-single-neighborhood.php' );
		
	} // end genesis_entry_content
	
	
	public function genesis_before_footer(){
		
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
		
	} // end genesis_before_footer
	
	
	//protected function genesis_loop(){
		
		//add_action( 'genesis_loop' , array( $this , 'the_neighborhood' ) );
		
	//} // end genesis_loop
	
	
	//public function the_neighborhood(){
		//echo 
	//} // end the_neighborhood
	
	
} // end Tremaine_Postttype