<?php

class Tremaine_Slideshow {
	
	
	//public function get_property_slideshow( $property_id , $display = 'basic' ){ 
		
		//$slides = $this->get_property_slides( $property_id );
		
		//return $this->get_slideshow_display( $slides , $display );
		
	//} // end get_property_slideshow
	
	
	public function get_property_slideshow( $images , $display = 'basic' ){ 
		
		return $this->get_slideshow_display( $images , $display );
		
	} // end get_property_slideshow
	
	
	protected function get_property_slides( $property_id ){
		
		$slides = array();
		
		if ( get_post_meta( $property_id , 'postGalleryEnable' , true ) ){
			
			$img_posts = get_attached_media('image' , $property_id );
			
			foreach( $img_posts as $img_post ){
				
				$slide = array();
				
				$thumb = wp_get_attachment_image_src( $img_post->ID, 'thumbnail' );
				
				$feat = wp_get_attachment_image_src( $img_post->ID, 'large' );
				
				$slide['thumbnail'] = $thumb[0];
				
				$slide['full'] = $feat[0];
				
				$slides[] = $slide;
				
			} // end foreach
			
		} else {
		} // end if
		
		return $slides;
		
	} // end get_property_slides
	
	
	protected function get_property_featured( $property_id ){
		
		$slide = array();
		
		if ( has_post_thumbnail ){
		
			$src = wp_get_attachment_image_src( get_post_thumbnail_id( $property_id ), 'full' );
			
			$slide['image'] = $src[0];
		
		} // end if
		
		return $slide;
		
	} // end get_property_featured
	
	
	protected function get_slideshow_display( $slides , $type = 'listing'  ){
		
		$html .= '';
		
		switch( $type ){
			
			default:
				$html .= $this->get_slideshow_display_listing( $slides );
				break;
			
		}
		
		return $html;
		
	} // end get_slideshow_display
	
	
	protected function get_slideshow_display_listing( $slides ){
		
		$slides_html = '';
		
		$thumbnail_html = '';
		
		$i = 0;
		
		foreach( $slides as $index => $slide ){
					
			$active = ( $i == 0 ) ? true : false;
			
			$slides_html .= $this->get_slideshow_slide( $slide , $active );
			
			$thumbnail_html .= $this->get_slideshow_thumbnail( $slide , $active );
			
			$i++;
			
		} // end foreach
		
		ob_start();
		
		include locate_template( 'inc/inc-slideshow-listing.php' );
		
		$html .= ob_get_clean();
		
		return $html;
		
	}
	
	
	protected function get_slideshow_thumbnail( $slide , $active = false ){
		
		$html = '<li class="tre-active tre-visible">';
		
			$html .= '<div style="background-image: url(' . $slide['thumbnail'] . ');"></div>';
                    
        $html .= '</li>';
		
		return $html;
		
	} // end get_slideshow_thumbnail
	
	
	protected function get_slideshow_slide( $slide , $active = false ){
		
		if ( $active ){
			
			$class = 'tre-active';
			$src = $slide['full'];
			
		} else {
			
			$class = 'tre-unloaded';
			$src = $slide['thumbnail'];
			
		} // end if
		
		$html = '<li class="' . $class . '">';
		
			$html .= '<img class="tre-image" src="' . $src . '" data-src="' . $slide['full'] . '" />';
			
		$html .= '</li>';
		
		return $html;
		
	} // end get_slideshow_slide
	
	
	public function get_property_slideshow_window( $images ){
		
		$i = 0;
		
		$slides_html = '';
		
		foreach( $images as $image ){
			
			$active = ( $i == 0 ) ? true : false;
			
			$slides_html .= $this->get_slideshow_slide( $image , $active );
			
			$i++;
			
		} // end foreach
		
		$html = '<div class="tre-slideshow-window-wrapper"><ul>';
			$html .= $slides_html;
		$html .= '</ul></div>';
		
		return $html;
		
	} // end get_property_slideshow_window
	
	
	public function get_property_slideshow_nav( $images ){
		
		$i = 0;
		
		$thumbnail_html = '';
		
		foreach( $images as $image ){
			
			$active = ( $i == 0 ) ? true : false;
			
			$thumbnail_html .= $this->get_slideshow_thumbnail( $image , $active );
			
			$i++;
			
		} // end foreach
		
		$html = '<div class="tre-slideshow-nav"><button class="tre-slideshow-control-prev"><i class="fa fa-caret-left" aria-hidden="true"></i></button><div class="tre-slideshow-thumbnails"><ul>';
				$html .= $thumbnail_html;
		$html .= '</ul></div><button name="next"><i class="fa fa-caret-right" aria-hidden="true"></i></button></div>';
		
		return $html;
		
	} // end get_property_slideshow_window
	
	
} // end Tremaine_Slideshow