<?php

class Tremaine_404_Template extends Tremaine_Template{
	
	protected $remove_loop = true;
	
	
	public function __construct(){
		
		parent::__construct();
		
	} // end __construct
	
	
	public function edit_template(){
		
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		
		add_action( 'genesis_loop' , array( $this , 'the_content' ) );
		
	}
	
	
	public function the_content(){
		
		$post = get_page_by_path('page-not-found', OBJECT, 'page');
		
		if ( $post ){
			
			//var_dump( $post );
		
			echo apply_filters( 'the_content' , $post->post_content );
		
		} else {
			
			echo '<p style="margin-top: 100px">Please create a page called 404 in WordPress to add content</p>';
			
		}// end if
		
	} // end render_property	
	
} // end Tremaine_Property_Template

$template_404 = new Tremaine_404_Template();

genesis();