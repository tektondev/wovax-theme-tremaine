<?

class Tremaine_Theme_Templates {
	
	
	public function init(){
		
		add_filter( 'genesis_pre_get_option_site_layout', array( $this , 'set_full_width_layout_posts' ) );
		
		add_action( 'wp_header', array( $this , 'edit_template' ), 99 );
		
		add_action( 'genesis_meta', array( $this, 'add_viewport_meta_tag' ) );
		
	} // end init
	
	function add_viewport_meta_tag() {
		
 		echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
		
 	} // end add_viewport_meta_tag
	
	
	public function set_full_width_layout_posts( $opt ){
		
		//global $post;
		
		if ( 'post' == get_post_type() ){
			
			//var_dump( $post );
			
			$opt = 'content-sidebar';
			
		} // end if
		
		return $opt;
		
	} // end set_full_width_layout_posts
	
	
	public function edit_template(){
				
		if ( is_post_type_archive( 'post' ) ){
			
			add_action( 'genesis_after_header' , array( $this , 'the_blog_header' ), 999 );
			
		} // end if
		
	} // end edit_template
	
	
	public function the_blog_header(){
		
		echo '<h1>Luxury Lifestyle Blog</h1>';
		
	} // end the_blog_header
		
	
}