<?php


class Tremaine {
	
	private static $instance;
	
	public static $version = '0.1.1';
	
	
	public static function get_instance(){
		
		if ( null == self::$instance ){
			
			self::$instance = new self;
			
			self::$instance->init();
			
		} // end if
		
		return self::$instance;
		
	} // end get_instance
	
	
	private function init(){
		
		
		//ini_set('display_errors', 1);
		//ini_set('display_startup_errors', 1);
		//error_reporting(E_ALL);
		
		
		define( 'WOVAXTREMAINEPATH' , get_stylesheet_directory() . '/' );
		define( 'WOVAXTREMAINEURL' , get_stylesheet_directory_uri() . '/' );
		
		
		$this->add_shortcodes();
		
		include_once 'updated-classes/class-tremaine-theme.php';
		
		require_once 'classes/class-tremaine-shortcode.php'; // abstract class
		require_once 'classes/class-tremaine-template.php'; // abstract class
		require_once 'classes/class-tremaine-posttype.php'; // abstract class
		require_once 'post-types/class-tremaine-post-type.php'; // abstract class
		 
		require_once 'updated-classes/class-tremaine-theme-templates.php';
		require_once 'updated-classes/class-tremaine-admin.php';
		require_once 'updated-classes/class-tremaine-options.php'; 
		require_once 'classes/class-tremaine-import-page.php'; 
		require_once 'classes/class-tremaine-post-type-modal.php';
		require_once 'classes/class-tremaine-post-type-office.php';  
		require_once 'classes/class-tremaine-property-factory.php';
		require_once 'post-types/video/post-type-video.php';
		
		$theme_templates = new Tremaine_Theme_Templates();
		$theme_templates->init();
		
		$admin = new Tremaine_Admin();
		$admin->init();
		
		$options = new Tremaine_Options();
		$options->init();
		
		$video_post_type = new Tremaine_Videos();
		$video_post_type->init();
		
		$post_type_modal = new Tremaine_Post_Type_Modal();
		$post_type_modal->init();
		
		$post_type_office = new Tremaine_Post_Type_Office();
		$post_type_office->init();
		
		$import_page = new Tremaine_Import_Page();
		$import_page->init();
		
		//require_once 'classes/class-tremaine-customizer.php'; 
		//$customizer = new Tremaine_Customizer();
		//$customizer->init();
		
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
		
		require_once 'shortcodes/tremaine-crest-gallery/shortcode-tremaine-crest-gallery.php';
		$crest_gallery_shortcode = new Shortcode_Tremaine_CREST_People_Gallery();
		$crest_gallery_shortcode->init();
		
		require_once 'updated-classes/class-share-modal.php';
		$share_modal = new Tremaine_Share_Modal();
		$share_modal->init();
		
		add_action( 'widgets_init', array( $this, 'register_widgets') );
		
		add_filter('widget_text','do_shortcode');		
		
	} // end init
	
	
	protected function add_shortcodes(){
		
		require_once 'classes/class-tremaine-shortcode.php'; // abstract class
		require_once 'shortcodes/tremaine-videos/shortcode-tremaine-videos.php';
		require_once 'shortcodes/tremaine-people/shortcode-tremaine-people.php';
		
		$videos = new Shortcode_Tremaine_Video();
		$people = new Shortcode_Tremaine_People();
		
		$videos->init();
		$people->init();
		
	} // end add_shortcodes
	
	
	public function register_widgets(){
		
		require_once 'classes/class-tremaine-widget-menu-link.php'; // abstract class
		
		register_widget( 'Tremaine_Widget_Menu_Link' );
		
	} // end register_widgets
	
	
} // end Tremaine

$tremaine = Tremaine::get_instance();