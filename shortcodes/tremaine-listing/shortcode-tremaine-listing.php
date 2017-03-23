<?php

class Shortcode_Tremaine_Listing extends Tremaine_Shortcode {
	
	protected $tag = 'tremaine_listing';
	
	protected $default_atts = array(
			'paged' => 1,
			'posts_per_page' => 12,
			'display_as' => 'gallery',
			'keyword' => '',
			'sort_by' => 'date-desc',
			'custom_field' => '',
			'custom_field_value' => '',
			'compare' => '',
		);
	
	
	public function render_shortcode( $atts , $content, $tag, $atts_orig ){
		
		require_once WOVAXTREMAINEPATH . 'classes/class-tremaine-property-factory.php';
		$property_factory = new Tremaine_Property_Factory();
		
		$presets = $this->get_presets( $atts );
		
		$query = $this->get_query( $presets );
		
		$page = $presets['paged'];
		$total_results = $query->found_posts;
		$total_pages = $query->max_num_pages;
		$next_page = ( ( $page + 1 ) < $total_results ) ? ( $page + 1 ) : 'na';
		$prev_page = ( ( $page - 1 ) > 0 ) ? ( $page - 1 ) : 'na';
		$start_set = ( $page == 1 ) ? 1 : ( $page - 1 );
		$end_set = ( ( $start_set + 4 ) > $total_pages ) ? $total_pages : $start_set + 4;
		$showing_start = ( $page == 1 ) ? 1 : ( $page - 1 ) * $presets['posts_per_page'];
		$showing_end = ( $total_results < $presets['posts_per_page'] ) ? $total_results : $showing_start + ( $presets['posts_per_page'] - 1 ) ;
		
		$properties = $property_factory->get_properties_from_query( $query );
		
		$sort_options = get_option('wovax_sort_fields');
		
		global $tremaine_modals;
		
		ob_start();
		
		include 'includes/include-tremaine-listings-gallery.php';
		
		//include locate_template( 'inc/inc-listing-gallery.php' );
		
		return ob_get_clean();
		
	} // end render_shortcode
	
	
	protected function get_presets( $atts ){
		
		$defaults = array(
			'paged' => 1,
			'posts_per_page' => 12,
			'display_as' => 'gallery',
			'keyword' => '',
			'sort_by' => 'date-desc',
			'custom_field' => '',
			'custom_field_value' => '',
			'compare' => '',
		);
		
		if ( isset( $_GET['cpage'] ) ) $atts['paged'] = sanitize_text_field( $_GET['cpage'] );
		
		if ( isset( $_GET['skeyword'] ) ) $atts['keyword'] = sanitize_text_field( $_GET['skeyword'] );
		
		if ( isset( $_GET['sort_by'] ) ) $atts['sort_by'] = sanitize_text_field( $_GET['sort_by'] );
		
		$presets = shortcode_atts( $defaults , $atts );
		
		return $presets;
		
	} // end get_presets
	
	
	protected function get_query( $presets ) {
		
		$args = array(
			'post_type' => 'wovaxproperty',
			'status'	=> 'publish',
			'posts_per_page' => 12,
			'orderby' => 'post_date',
			'order' => 'ASC',
		);
		
		if ( ! empty( $presets['posts_per_page'] ) ) $args['posts_per_page'] = $presets['posts_per_page'];
		
		if ( ! empty( $presets['paged'] ) ) $args['paged'] = $presets['paged']; 
		
		if ( ! empty( $presets['sort_by'] ) ) $this->add_sort_args( $args, $presets );
		
		if ( ! empty( $presets['custom_field'] ) ){
			
			$args['meta_query'] = array(
				'relation' => 'OR',
			);
			
			$field_values = explode( ',' , $presets['custom_field_value'] );
			
			foreach( $field_values as $f_value ){
				
				$args['meta_query'][] = array(
					'key'     => $presets['custom_field'],
					'value'   => $f_value,
					'compare' => 'LIKE',
				);
				
			} // end foreach
			
		} // end if
		
		$the_query = new WP_Query( $args );
	
		return $the_query;
		
	} // end get_query
	
	
	public function add_sort_args( &$args, $presets ){
		
		switch( $presets['sort_by'] ){
			
			case 'Price-numeric-asc':
				$args['orderby'] = 'meta_value_num';
				$args['meta_key']  = 'Price';
				break;
			case 'Price-numeric-desc':
				$args['orderby'] = 'meta_value_num';
				$args['meta_key']  = 'Price';
				$args['order'] = 'DESC';
				break;
			case 'date-desc':
				$args['orderby'] = 'post_date';
				$args['order'] = 'DESC';
				break;
			case 'date-asc':
				$args['orderby'] = 'post_date';
				break;
			
		} // end switch
		
	} // end add_sort_args
	
} // end Tremaine_Shortcode_Agents