<?php

class Tremaine_Site_Footer {
	
	public function init(){ 
	
		add_action( 'init',  array( $this , 'replace_footer' ), 99 );
		
		add_action( 'genesis_before_footer' , array( $this , 'add_before_footer' ), 999 );
		
		add_action( 'genesis_after_footer' , array( $this , 'add_after_footer' ), 1 );
		
	} // end init
	
	
	public function add_before_footer(){
		
		if ( is_active_sidebar( 'tremaine_footer_nav') ) {
		
			echo '<nav class="footer-nav"><div class="wrap">';
			
			dynamic_sidebar( 'tremaine_footer_nav' );
			
			echo '</div></nav>';
			
		} // end if
		
		if ( is_active_sidebar( 'tremaine_footer_before') ) {
		
			echo '<section class="footer-before"><div class="wrap">';
			
			dynamic_sidebar( 'tremaine_footer_before' );
			
			echo '</div></section>';
			
		} // end if
		
	} // end add_before_footer
	
	
	public function replace_footer(){
		
		remove_action( 'genesis_footer', 'genesis_do_footer' );
		
		add_action( 'genesis_footer', array( $this , 'add_genesis_footer')  );
		
	} // end replace_footer
	
	
	public function add_genesis_footer(){
		
		if ( is_active_sidebar( 'tremaine_footer') ) {
			
			dynamic_sidebar( 'tremaine_footer' );
			
		} // end if
		
	} // end do_genesis_footer
	
	
	public function add_after_footer(){
		
		if ( is_active_sidebar( 'tremaine_footer_after') ) {
		
			echo '<section class="footer-after"><div class="wrap">';
			
			dynamic_sidebar( 'tremaine_footer_after' );
			
			echo '</div></section>';
			
			echo do_shortcode('[tremaine_modal id="3738208"][tremaine_modal id="3721891"]');
			
			//include locate_template( 'inc/inc-modal-property-alerts.php' );
			
		} // end if
		
	} // end add_after_footerr
	
} // end Tremaine_Site_Header