<?php

class Tremaine_Setup {
	
	
	public function init(){
		
		setlocale(LC_MONETARY, 'en_US.utf8');
		
		//* Add html 5 support
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		
		add_action( 'wp_head' , array( $this , 'tremaine_wp_head'), 99 );
		
		add_action( 'init' , array( $this , 'register_sidebars' ) );
		
		add_action( 'wp_enqueue_scripts' , array( $this , 'add_custom_scripts' ), 99 );
		
		add_action( 'wp' , array( $this , 'tekton_builder_overrides' ), 10 );
		
		add_filter( 'tkd_builder_item_content' , array( $this , 'filter_tkd_builder_item_content' ), 10 , 3 );
		
		add_filter( 'tkd_builder_item_style' , array( $this , 'filter_tkd_builder_item_style' ), 10 , 3 );
		
		add_action( 'init', array( $this , 'custom_rewrite' ) );
		
		add_filter( 'query_vars', array( $this , 'filter_query_vars' ) );
		
		add_action( 'template_redirect', array( $this , 'userpage_rewrite_catch' ) );
		
		add_action( 'genesis_before_footer' , array( $this , 'add_before_footer' ), 1 );
		
		add_filter( 'get_the_archive_title', array( $this, 'filter_get_the_archive_title') );
		
		add_filter( 'posts_where', array( $this, 'title_filter' ), 10, 2 );
		
	} // end __construct
	
	
	public function title_filter( $where, $wp_query ){
		
		global $wpdb;
		
		if( empty( $_GET['agent-keyword'] ) ) return $where;
	
		if ( $search_term = $wp_query->get( 's' ) ){
			
			/*using the esc_like() in here instead of other esc_sql()*/
			
			$search_term = $wpdb->esc_like( $search_term );
			
			$terms = explode( ' ', $search_term );
			
			foreach( $terms as $term ){
				
				$term_regex = '\'%' . $term . '%\'';
				
				$where .= ' AND ' . $wpdb->posts . '.post_title LIKE '.$term_regex;
				
			} // end foreach
			
			//$search_term = '\'%' . $search_term . '%\'';
			
			
			
			//$search_term = str_replace( ' ', '%', $search_term );
			
			//$where .= ' AND ' . $wpdb->posts . '.post_title LIKE '.$search_term;
			
			//if ( ! empty( $_GET['test'] ) ) var_dump( $where );
			
		} // end if
	
		return $where;
		
	} // end title_filter
	
	
	public function wpse_11826_search_by_title( $search, $wp_query ) {
		
		//if( ! empty( $_GET['test'] ) ) var_dump( $wp_query );
		
		if( empty( $_GET['agent-keyword'] ) ) return $search;
		
		//if( ! empty( $_GET['test'] ) ) var_dump( $wp_query );
		
		
		if ( ! empty( $search ) && ! empty( $wp_query->query_vars['search_terms'] ) ) {
			
			global $wpdb;
	
			$q = $wp_query->query_vars;
			
			$n = ! empty( $q['exact'] ) ? '' : '%';
	
			$search = array();
	
			foreach ( ( array ) $q['search_terms'] as $term )
			
				$search[] = $wpdb->prepare( "$wpdb->posts.post_title LIKE %s", $n . $wpdb->esc_like( $term ) . $n );
	
			if ( ! is_user_logged_in() )
				$search[] = "$wpdb->posts.post_password = ''";
	
			$search = ' AND ' . implode( ' AND ', $search );
			
		}
	
		return $search;
		
	} // end wpse_11826_search_by_title
	
	
	public function filter_get_the_archive_title( $title ){
		
		 if ( is_category() ) {

            $title = single_cat_title( '', false );

        } else if ( is_tag() ) {

            $title = single_tag_title( '', false );

        } else if ( is_author() ) {

            $title = get_the_author();

        } // end if

    	return $title;
		
	} // end filter_get_the_archive_title
	
	
	public function add_before_footer(){
		if ( is_singular( 'page' ) && ! is_front_page() ){
			
			if ( is_active_sidebar( 'tremaine_page_after') ) {
		
				echo '<section class="tre-page-after"><div class="wrap">';
				
				ob_start();
				
					dynamic_sidebar( 'tremaine_page_after' ); 
				
				$html = ob_get_clean();
				
				echo apply_filters( 'do_modal_windows', $html );
				
				echo '</div></section>';
				
			} // end if
			
			if ( is_active_sidebar( 'tremaine_page_footer_before') ) {
			
				echo '<nav class="tre-page-after-nav"><div class="wrap">';
				
				ob_start();
				
					dynamic_sidebar( 'tremaine_page_footer_before' );
				
				$html = ob_get_clean();
				
				echo apply_filters( 'do_modal_windows', $html );
				
				echo '</div></nav>';
				
			} // end if
			
		} // end if
	}
	
	
	public function custom_rewrite(){
		
		 add_rewrite_tag( '%agent%', '([^&]+)' );
		 
		 add_rewrite_rule(
			  '^agent/([^/]*)/?',
			  'index.php?agent=$matches[1]',
			  'top'
		  );
		
	}
	
	
	public function filter_query_vars( $vars ){
		
		$vars[] = 'agent';
		
		return $vars;
		
	} // end do_custom_rewrite
	
	
	public function userpage_rewrite_catch(){
		
		global $wp_query;

		if ( array_key_exists( 'agent', $wp_query->query_vars ) ) {
			
			include  get_stylesheet_directory() . '/single-userprofile.php';
			
			exit;
			
		} // end if
		
	} // end do_userpage_rewrite_catch
	
	
	public function filter_tkd_builder_item_style( $style , $item , $settings ){
		
		if ( 'tkdrow' == $item->get_slug() ){
			
			if ( array_key_exists( 'max-width' , $style ) ){
				
				unset( $style[ 'max-width' ] );
				
			} // end if
			
		} // end if
		
		return $style;
		
	}
	
	public function filter_tkd_builder_item_content( $html, $item , $settings ){
		
		if ( 'tkdrow' == $item->get_slug() ){
			
			$style = $item->get_item_style( $settings , $exclude = array() , $include = array('max-width') );
			
			$html = '<div class="wrap content-wrap" style="' . implode( ' ' , $style ) . '">' . $html . '</div>';
			
		}
		
		return $html;
		
	} // end filter_tkd_item_class
	
	
	public function tekton_builder_overrides(){
		
		if ( is_singular( 'page' ) ){
			
			global $post;
			
			if ( has_shortcode( $post->post_content , 'tkdrow'  ) ){
				
				add_action( 'genesis_before', array( $this, 'remove_entry_header' ) );
			
				//remove_action( 'genesis_loop', 'genesis_do_loop' );
				
				//add_action( 'genesis_after_header' , array( $this , 'add_builder_content' ), 99999 );
				add_filter( 'genesis_markup_site-inner', '__return_null' );
				add_filter( 'genesis_markup_content-sidebar-wrap_output', '__return_false' );
				add_filter( 'genesis_markup_content', '__return_null' );
			
			} // end if
			
		} // end if
		
	} // end tekton_builder_overrides
	
	public function remove_entry_header(){
		
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
		remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
	
		//* Remove the entry title (requires HTML5 theme support)
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	
		//* Remove the entry meta in the entry header (requires HTML5 theme support)
		remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
	
		//* Remove the post format image (requires HTML5 theme support)
		remove_action( 'genesis_entry_header', 'genesis_do_post_format_image', 4 );
	}
	
	
	public function filter_site_inne( $wrap ){
		return '';
	}
	
	
	public function add_builder_content(){
		
		global $post;
		
		echo '<main>' . apply_filters( 'the_content', $post->post_content ) . '</main>';
		
	}
	
	
	public function add_custom_scripts(){
		
		
		wp_enqueue_style( 'font-awesome' , get_stylesheet_directory_uri() . '/font-awesome/css/font-awesome.min.css' , array(), Tremaine::$version );
		
		wp_enqueue_style( 'agents_shortcode' , get_stylesheet_directory_uri() . '/css/agents-shortcode.css' , array(), Tremaine::$version );
		
		wp_enqueue_script( 'Tremaine_public' , get_stylesheet_directory_uri() . '/js/script.js' , array('jquery'), Tremaine::$version, true );
		
		wp_enqueue_style( 'new-child-theme-updated' , get_stylesheet_directory_uri() . '/css/style-updated.css' , array(), Tremaine::$version );
		
		if ( isset( $_GET['css'] ) ){
			
			//wp_enqueue_style( 'child-theme' , get_stylesheet_directory_uri() . '/css/style.css' , array(), Tremaine::$version );
			
			wp_dequeue_style('child-theme');
			
			wp_dequeue_style('agents_shortcode');
			
			wp_enqueue_style( 'new-child-theme' , get_stylesheet_directory_uri() . '/css/style.css' , array(), Tremaine::$version );
			wp_enqueue_style( 'new-child-theme-updated' , get_stylesheet_directory_uri() . '/css/style-updated.css' , array(), Tremaine::$version ); 
			
		} // end if
		
		//wp_enqueue_script( 'TypeKit' , 'https://use.typekit.net/unt2lfr.js' , array(), Wovax_Theme_Tremaine::$version );
		
	} // end do_add_custom_scripts
	
	
	public function tremaine_wp_head() {
		
		// Add custom action for style
		echo '<style>';
		do_action( 'tremaine_wp_head_style' );
		echo '</style>';
		echo '<script src="https://use.typekit.net/hbu1iry.js"></script>';
		echo '<script>try{Typekit.load({ async: true });}catch(e){}</script>';
		
	} // end tremaine_wp_head
	
	
	public function register_sidebars(){
		
		register_sidebar( array( 
			'id' 			=> 'header_nav_before', 
			'name' 			=> 'Header Nav Before',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>', 
			) 
		);
		
		register_sidebar( array( 
			'id' 			=> 'tremaine_secondary_nav', 
			'name' 			=> 'Secondary Nav',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>', 
			) 
		);
		
		register_sidebar( array( 
			'id' 			=> 'tremaine_frontpage_before', 
			'name' 			=> 'Homepage Feature Before',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>', 
			) 
		);
		
		register_sidebar( array( 
			'id' 			=> 'tremaine_frontpage', 
			'name' 			=> 'Homepage Feature',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>', 
			)
		);
		
		register_sidebar( array( 
			'id' 			=> 'tremaine_frontpage_after' , 
			'name'			=> 'Homepage Feature After',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>', 
			)
		);
		
		register_sidebar( array( 
			'id' 			=> 'tremaine_page_before', 
			'name' 			=> 'Page Before',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>', 
			) 
		);
		register_sidebar( array( 
			'id' 			=> 'tremaine_mobile', 
			'name' 			=> 'Mobile Secondary Nav',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>', 
			) 
		);
		
		register_sidebar( array( 
			'id' 			=> 'tremaine_page_after', 
			'name' 			=> 'Page After',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>', 
			) 
		);
		
		register_sidebar( array( 
			'id' 			=> 'tremaine_page_footer_before',
			'name' 			=> 'Page After Nav Area',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>', 
			) 
		);
		
		register_sidebar( array( 
			'id' 			=> 'tremaine_footer_nav' , 
			'name' 			=> 'Footer Navigation',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>', 
			)
		);
		
		register_sidebar( array( 
			'id' 			=> 'tremaine_footer_before' , 
			'name' 			=> 'Footer Before',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>', 
			)
		);
		
		register_sidebar( array( 
			'id' => 'tremaine_footer' , 'name' => 'Footer',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>', 
			)
		);
		
		register_sidebar( array( 
			'id' => 'tremaine_footer_after' , 
			'name' => 'Footer After',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>', 
			)
		);
		
	} // end register_sidebars
	
	
}