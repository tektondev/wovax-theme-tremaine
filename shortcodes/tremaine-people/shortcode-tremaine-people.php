<?php

class Shortcode_Tremaine_People extends Tremaine_Shortcode {

	protected $tag = 'tremaine_people';
	
	protected $default_atts = array(
		'ids' 	=> false,
		'link' 	=> 0,
		);
		
	public function __construct(){
		
		require_once WOVAXTREMAINEPATH . 'updated-classes/class-tremaine-person.php';
		
	}  // End __construct
	
	
	public function render_shortcode( $atts , $content, $tag, $atts_orig ){
		
		$people = $this->get_people( $atts );
		
		$people_cards = $this->get_people_cards( $people, $atts );
		
		if ( ! empty( $people_cards ) && count( $people_cards ) < 2  ){
			
			for( $i = 0; $i < 8; $i++ ){
				
				$people_cards[] = $people_cards[0];			
				
			} // end for
			
		} // end if
		
		ob_start();
		
		include WOVAXTREMAINEPATH . 'shortcodes/tremaine-people/includes/people-gallery.php';
		
		return ob_get_clean();
		
	} // end render_shortcode
	
	
	public function get_people( $atts ){
		
		$people = array();
		
		$args = array(
			'post_type' => 'people',
			'posts_per_page' => -1,
			'status' => 'publish', 
		);
		
		$args = array_merge( $args, $atts );
		
		if ( ! empty( $atts[ 'ids' ] ) ) {
			
			$ids = explode( ',' , $atts[ 'ids' ] );
			
			$args['post__in'] = $ids;
			
			$args['orderby'] = 'post__in'; 
			
		} // end if
		
		$the_query = new WP_Query( $args );
		
		if ( $the_query->have_posts() ) {
			
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				
				$img_id = get_post_thumbnail_id();
				$img_url_array = wp_get_attachment_image_src( $img_id, 'large', true );
				$img_url = $img_url_array[0];
				
				$photo = get_post_meta( get_the_ID(), '_primary_photo_url_manual', true );
				
				if( empty( $photo ) ){
					
					$photo = ( get_post_meta( get_the_ID(), '_primary_photo_url', true ) );
					
				} // end if
				
				$person = new Tremaine_Person( $the_query->post );
				
				$person = array(
					'post'			=> $the_query->post,
					'title' 		=> get_the_title(),
					'content' 		=> get_the_content(),
					'excerpt' 		=> get_the_excerpt(),
					'link' 			=> get_post_permalink(),
					'img' 			=> $photo,
					'position' 		=> $person->get_position_title(),
					'display_name'  => get_post_meta( get_the_ID(), '_display_name', true ),
					'first_name'  	=> get_post_meta( get_the_ID(), '_first_name', true ),
					'last_name'  	=> get_post_meta( get_the_ID(), '_last_name', true ),
					
				);
				
				$position_low = strtolower( $person[ 'position' ] );
			
				if ( strpos( $position_low, 'sales associate' ) !== false ){
					
					$person[ 'position' ] = 'Broker Associate';
					
				} // end if
				
				if ( empty( $person['display_name' ] ) ) $person['display_name' ] = $person['first_name' ] . ' ' . $person['last_name' ];
				
				if ( empty( $person['excerpt'] ) ) $person['excerpt'] = $person['content'];
				
				$person['excerpt'] = wp_trim_words( $person['excerpt'], 15, '...' );
				
				$people[] = $person;
				
			}

			wp_reset_postdata();
			
		}
		
		return $people;
		
		
	} // end get_peoples
	
	
	public function get_people_cards( $people, $atts ){
		
		$people_cards = array();
		
		foreach( $people as $person ){
			
			ob_start();
			
			include WOVAXTREMAINEPATH . 'shortcodes/tremaine-people/includes/people-card.php';
			
			$people_cards[] = ob_get_clean();
			
		} // endforech
		
		return $people_cards;
		
	} // end get_people_cards
	
	
} // end Shortcode_Tremaine_people