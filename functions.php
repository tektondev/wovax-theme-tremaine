<?php


class Tremaine {
	
	private static $instance;
	
	public static $version = '0.1.0';
	
	
	public static function get_instance(){
		
		if ( null == self::$instance ){
			
			self::$instance = new self;
			
			self::$instance->init();
			
		} // end if
		
		return self::$instance;
		
	} // end get_instance
	
	
	private function init(){
		
		define( 'WOVAXTREMAINEPATH' , get_stylesheet_directory() . '/' );
		define( 'WOVAXTREMAINEURL' , get_stylesheet_directory_uri() . '/' );
		
		require_once 'classes/class-tremaine-shortcode.php'; // abstract class
		require_once 'classes/class-tremaine-template.php'; // abstract class
		require_once 'classes/class-tremaine-posttype.php'; // abstract class
		 
		require_once 'classes/class-tremaine-import-page.php'; 
		require_once 'classes/class-tremaine-post-type-modal.php'; 
		require_once 'classes/class-tremaine-property-factory.php';
		
		$post_type_modal = new Tremaine_Post_Type_Modal();
		$post_type_modal->init();
		
		$import_page = new Tremaine_Import_Page();
		$import_page->init();
		
		require_once 'classes/class-tremaine-customizer.php'; 
		$customizer = new Tremaine_Customizer();
		$customizer->init();
		
		require_once 'classes/class-tremaine-setup.php'; 
		$setup = new Tremaine_Setup();
		$setup->init();
		
		require_once 'classes/class-tremaine-posttype-neighborhoods.php';
		$neighborhoods = new Tremaine_Posttype_Neighborhoods();
		$neighborhoods->init();
		
		
		require_once 'classes/class-tremaine-posttype-developments.php';
		$developments = new Tremaine_Posttype_Developments();
		$developments->init();
		
		
		
		require_once 'classes/class-tremaine-demo.php';
		$setup = new Tremaine_Demo();
		$setup->init();
		
		require_once 'classes/class-tremaine-site-header.php';
		$site_header = new Tremaine_Site_Header();
		$site_header->init();
		
		require_once 'classes/class-tremaine-site-footer.php';
		$site_footer = new Tremaine_Site_Footer();
		$site_footer->init();
		
		require_once 'classes/class-tremaine-shortcode-agents.php';
		$agents_shortcode = new Tremaine_Shortcode_Agents();
		$agents_shortcode->register();
		
		//require_once 'classes/class-tremaine-shortcode-listing.php';
		//$listing_shortcode = new Tremaine_Shortcode_Listing();
		//$listing_shortcode->register();
		
		require_once 'shortcodes/tremaine-listing/shortcode-tremaine-listing.php';
		$listing_shortcode = new Shortcode_Tremaine_Listing();
		$listing_shortcode->register();
		
		require_once 'updated-classes/class-share-modal.php';
		$share_modal = new Tremaine_Share_Modal();
		$share_modal->init();
		
		
		add_action( 'widgets_init', array( $this, 'register_widgets') );
		
		
	} // end init
	
	
	public function register_widgets(){
		
		require_once 'classes/class-tremaine-widget-menu-link.php'; // abstract class
		
		register_widget( 'Tremaine_Widget_Menu_Link' );
		
	} // end register_widgets
	
	
} // end Tremaine

$tremaine = Tremaine::get_instance();