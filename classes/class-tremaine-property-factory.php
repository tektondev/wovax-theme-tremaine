<?php

class Tremaine_Property_Factory {
	
	
	public function __construct(){
		
		require_once 'class-tremaine-property.php';
		
	} // end __construct
	
	
	public function get_property( $post ){
		
		if (  is_numeric( $post ) ) $post = get_post( $post );
		
		$property = new Tremaine_Property();
			
		$property->set_property( $post );
		
		return $property;
		
	} // end get_property( $post )
	
	
	public function get_properties( $args = array(), $is_form = false ){
		
		$properties = array();
		
		$property_args = array(
			'post_type' 		=> 'wovaxproperty',
			'posts_per_page' 	=> 12,
			'status' 			=> 'publish',
		);
		
		$property_args = array_merge( $property_args, $args );
		
		$query = new WP_Query( $property_args );

		$properties = $this->get_properties_from_query( $query );
		
		return $properties;
		
	} // end get_properties
	
	
	public function get_properties_from_query( $query ){

		while ( $query->have_posts() ) {
			
			$query->the_post();
			
			$property = new Tremaine_Property();
			
			$property->set_property( $query->post );
			
			$properties[] = $property;
			
		} // end while
		
		wp_reset_postdata();
		
		return $properties;
		
	} // end get_properties
	
	
} // end Tremaine_Property_Factory