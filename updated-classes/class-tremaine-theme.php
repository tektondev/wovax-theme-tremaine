<?php



class Tremaine_Theme {

	

	

	public function __construct(){

		

		add_filter( 'gform_field_value_agent_email', array( $this, 'populate_agent_email' ) );

		add_filter( 'gform_field_value_listing_agency', array( $this, 'populate_listing_agency' ) );
			
		add_action( 'genesis_before_header' , array( $this, 'add_responsive_menu' ) );



	} // end __construct

	
	public function add_responsive_menu(){
		
		global $post;
		
		include locate_template( 'parts/header/responsive-menu.php', false );
		
	} // End add_responsive_menu

	

	public function populate_agent_email() {

		$agent_email = '';

		$id = get_the_ID();

		if ( $id ){

			$agent_email = get_post_meta( $id, 'Agent_Email', TRUE );

		} // end if

		return $agent_email;

	} // end populate_agent_email



	public function populate_listing_agency() {

		$listing_agency = '';

		$id = get_the_ID();

		if ( $id ){

			$listing_agency = get_post_meta( $id, 'Listing_Agency', TRUE );

		} // end if

		return $listing_agency;

	}


} // end Tremaine_Theme



$tremaine_theme = new Tremaine_Theme();