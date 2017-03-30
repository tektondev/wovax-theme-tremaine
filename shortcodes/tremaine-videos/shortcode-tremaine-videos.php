<?php

class Shortcode_Tremaine_Video extends Tremaine_Shortcode {

	protected $tag = 'tremaine_videos';
	
	protected $default_atts = array(
		'is-archive' 		=> '',
		'cpage' 			=> '',
		'archive-url'   	=> '',
		'posts_per_page' 	=> '',
		);
	
	
	public function render_shortcode( $atts , $content, $tag, $atts_orig ){
		
		require_once WOVAXTREMAINEPATH . 'updated-classes/class-tremaine-forms.php';
		
		$forms = new Tremaine_Forms();
		
		if ( ! empty( $_GET['cpage'] ) ) {
			
			$atts['cpage'] = sanitize_text_field( $_GET['cpage'] );
			
		} // end if
		
		$args = array(
			'post_type' 		=> 'video',
			'posts_per_page' 	=> 9,
			'status' 			=> 'publish', 
		);
		
		foreach( $args as $arkey => $arvalue ){
			
			if ( ! empty( $atts[ $arkey ] ) ){
				
				$args[ $arkey ] = $atts[ $arkey ];
				
			} // end if
			
		} // end foreach
		
		$args['paged'] = ( ! empty( $atts['cpage'] ) )? $atts['cpage'] : 1; 
		
		$the_query = new WP_Query( $args );
		
		$videos = $this->get_videos( $the_query );
		
		$pagination = $forms->get_pagination( $the_query, $args['paged'], $args[ 'posts_per_page' ] );
		
		$video_cards = $this->get_video_cards( $videos );
		
		/*if ( ! empty( $video_cards ) && count( $video_cards ) < 2  ){
			
			for( $i = 0; $i < 8; $i++ ){
				
				$video_cards[] = $video_cards[0];			
				
			} // end for
			
		} // end if*/
		
		ob_start();
		
		include WOVAXTREMAINEPATH . 'shortcodes/tremaine-videos/includes/video-gallery.php';
		
		return ob_get_clean();
		
	} // end render_shortcode
	
	
	public function get_videos( $the_query ){
		
		$videos = array();
		
		if ( $the_query->have_posts() ) {
			
			while ( $the_query->have_posts() ) {
				
				$the_query->the_post();
				
				$img_id = get_post_thumbnail_id();
				$img_url_array = wp_get_attachment_image_src( $img_id, 'large', true );
				$img_url = $img_url_array[0];
				
				$video = array(
					'title' 		=> get_the_title(),
					'content' 		=> get_the_content(),
					'link' 			=> get_post_meta( $the_query->post->ID,  '_video_url', true ),
					'img' 			=> $img_url,
					
				);
				
				$videos[] = $video;
				
			}

			wp_reset_postdata();
			
		} // end if
		
		return $videos;
		
		
	} // end get_videos
	
	
	public function get_video_cards( $videos ){
		
		$video_cards = array();
		
		foreach( $videos as $video ){
			
			ob_start();
			
			include WOVAXTREMAINEPATH . 'shortcodes/tremaine-videos/includes/video-card.php';
			
			$video_cards[] = ob_get_clean();
			
		} // endforech
		
		return $video_cards;
		
	} // end get_video_cards
	
	
} // end Shortcode_Tremaine_Video