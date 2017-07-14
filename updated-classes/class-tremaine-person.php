<?php

class Tremaine_Person {
	
	protected $post = false;
	
	protected $post_id = false;
	
	protected $position_title = false;
	
	public function __construct( $post = false ){
		
		if ( $post ){
			
			$this->post = $post;
			
			$this->post_id = $post->ID;
			
		} // End if
		
	} // End __construct()
	
	
	public function get_position_title( $post_id = false, $reset = false ){
		
		if ( $this->position_title && ! $reset ) return $this->position_title;
		
		$position = $this->get_person_meta( $post_id, '_position' );
		
		$position_low = strtolower( $position );
			
		if ( strpos( $position_low, 'sales associate' ) !== false ){
			
			$position = 'Broker Associate';
			
		} // end if
		
		$this->position_title = $position;
		
		return $this->position_title;
		
	} // End get_position_title
	
	
	protected function get_person_meta( $post_id, $key ){
		
		if ( ! $post_id ) $post_id = $this->post_id;
		
		$manual_key = $key . '_manual';
		
		if ( $post_id ){
		
			$value = get_post_meta( $post_id, $manual_key, true );
			
			if ( empty( $value ) ){
				
				$value = get_post_meta( $post_id, $key, true );
				
			} // end if
		
		} else {
			
			$value = '';
			
		} // End if
		
		return $value;
		
	} // End get_person_meta
	
} // End Tremaine_Person