<?php 

class Tremaine_Property_Slideshow {
	
	
	public function get_slideshow( $property, $lazy_load = true ){
		
		$show_id = uniqid( 'slideshow-' );
		
		$slide_window = $this->get_slide_window( $show_id, $property, $lazy_load );
		
		$slide_nav = $this->get_slide_nav( $show_id, $property, $lazy_load );
		
		return $slide_window . $slide_nav;
		
	} // end get_slideshow
	
	
	
	public function get_slide_window( $show_id, $property, $lazy_load = true ){
		
		$images = $property->get_images();
		
		ob_start();
		
		include WOVAXTREMAINEPATH . 'includes/include-property-slideshow-slides.php';
		
		return ob_get_clean();
		
	} // end get_slides
	
	
	public function get_slide_nav( $show_id, $property, $lazy_load = true ){
		
		$images = $property->get_images();
		
		ob_start();
		
		include WOVAXTREMAINEPATH . 'includes/include-property-slideshow-nav.php';
		
		return ob_get_clean();
		
	} // end get_slides
	
} // end Tremaine_Property_Slideshow