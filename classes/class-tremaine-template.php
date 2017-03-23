<?php

abstract class Tremaine_Template {
	
	protected $title = true;
	protected $title_meta = true;
	
	public function __construct(){
		
		add_action( 'loop_start', array( $this, 'loop_actions' ) );
		
		$this->add_actions();
		
	}
	
	
	public function loop_actions(){
		
		if ( ! $this->title ) remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
		
		if ( ! $this->title_meta ) remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
		
	} // end loop_actions
	
	
	protected function add_actions(){
		
		if ( method_exists( $this , 'edit_template' ) ) add_action( 'pre_get_posts', array( $this , 'edit_template' ), 99 );
		
		if ( method_exists( $this , 'genesis_before_content' ) ) add_action( 'genesis_before_content', array( $this , 'genesis_before_content' ), 99 );
		
		if ( method_exists( $this , 'body_class' ) ) add_filter('body_class', array( $this , 'body_class') );
		
	} // ed add_actions
	
	
} // end Tremaine_Template