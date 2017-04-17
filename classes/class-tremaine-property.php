<?php 

class Tremaine_Property {
	
	protected $slideshow;
	
	protected $post = false;
	protected $id = false;
	
	protected $description = '';
	protected $link = '';
	protected $title = '';
	protected $title_rendered = '';
	protected $address = '';
	protected $city = '';
	protected $state = '';
	protected $state_abb = '';
	protected $zip = '';
	protected $price = '';
	protected $price_rendered = '';
	protected $beds = '';
	protected $bath_full = '';
	protected $bath_half = '';
	protected $images = array();
	protected $status = '';
	protected $mls = '';
	protected $sub_type = '';
	protected $square_footage = '';
	protected $ppsf = '';
	protected $type = '';
	protected $email = '';
	protected $fields = array(
		'Garage_Details' 	=> '',
		'Year_Built' 		=> '',
		'Lot_Size' 			=> '',
		'Annual_Taxes' 		=> '',
		'Tax_Year' 			=> '',
		'Lot_Description' 	=> '',
		'Tax_Exemptions' 	=> '',
		'Cooling_Details' 	=> '',
		'Parking_Details' 	=> '',
		'Cooling_Details' 	=> '',
		'Parking_Details' 	=> '',
		'geo_enabled'	 	=> '',
		'geo_latitude' 		=> '',
		'geo_longitude' 	=> '',
		'geo_public' 		=> '',
		'Agent_Email'		=> '',
		'Listing_Agent'		=> '',
		'Video_URL'			=> '',
	);
	protected $features = array();
	
	
	public function get_id() { return $this->id; }
	public function get_post() { return $this->post; }
	public function get_title() { return $this->title; }
	public function get_title_rendered() { return $this->title_rendered; }
	public function get_description(){ return $this->description; }
	public function get_link() { return $this->link; }
	public function get_address() { return $this->address; }
	public function get_city() { return $this->city; }
	public function get_state() { return $this->state; }
	public function get_state_abb() { return $this->state_abb; }
	public function get_zip() { return $this->zip; }
	public function get_price() { return $this->price; }
	public function get_price_rendered() { return $this->price_rendered; }
	public function get_beds() { return $this->beds; }
	public function get_bath_full() { return $this->bath_full; }
	public function get_bath_half() { return $this->bath_half; }
	public function get_images() { return $this->images; }
	public function get_status(){ return $this->status; }
	public function get_mls() { return $this->mls; }
	public function get_sub_type() { return $this->sub_type; }
	public function get_square_footage() { return $this->square_footage; }
	public function get_ppsf() { return $this->ppsf; }
	public function get_type(){ return $this->type; }
	public function get_field( $key ){ return ( array_key_exists( $key, $this->fields ) ) ?  $this->fields[ $key ] : ''; } // end get_field
	public function get_features(){ return $this->features; }
	public function get_email() { return $this->email; }
	
	public function __construct(){
		
		require_once 'class-tremaine-slideshow.php';
		$this->slideshow = new Tremaine_Slideshow();
		
	} // end __construct
	
	
	
	public function get_bath_text(){
		
		$txt = '';
		
		if ( $this->get_bath_full() ) {
			
			$txt .= $this->get_bath_full() . ' Full';
			
			if ( $this->get_bath_half() ) {
				
				$txt .= ' & ';
				
			} // end if
			
		} // end if
		
		if ( $this->get_bath_half() ) {
			
			$txt .= $this->get_bath_half();
			
			$txt .= ' Half';
			
		} // end if
		
		if ( $txt ) {
			
			$txt .= ' Bath';
			
			if ( $this->get_bath_half() && $this->get_bath_full() ){
				
				$txt .= 's';
				
			} else if  ( ( $this->get_bath_half() || $this->get_bath_full() ) && ( ( $this->get_bath_half() > 1 ) || ( $this->get_bath_full() > 1 ) ) ){
				
				$txt .= 's';
				
			} // end if

			
		}
		
		return $txt;
				
	} // end get_bath_text
	
	
	public function get_bed_text( $add_separator = false ){
		
		$txt = '';
		
		if ( $this->get_beds() ) {
			
			$txt .= $this->get_beds() . ' Bed';
									
			if ( $this->get_beds() > 1 ) $txt .= 's';
									
			if ( ! empty( $this->get_bath_text() ) ) $txt .= ' &nbsp;|&nbsp; ';
			
			
		} // end if
		
		return $txt;
		
	} // end get_bed_text
	
	
	public function get_featured_image( $attr = 'src' ){
		
		$images = $this->get_images();
		
		if ( ! empty( $images ) ){
			
			$image = reset( $images );
			
			if ( ! empty( $image ) ){
			
				  switch( $attr ){
					  
					  default:
						  return $image['full'];
						  break;
					  
				  } // end switch
				  
			 } // end if 
			
		} // end if
		
		return false;
		
	} // end get_featured_image
	
	
	public function set_property( $post ){
		
		$this->post = $post;
		$this->id = $post->ID;
		
		$this->title = ucwords( strtolower( $post->post_title ) );
		$this->description = $post->post_content;
		
		$this->address = ucwords( strtolower( get_post_meta( $this->get_id() , 'Address' , true ) ) );
		$this->city = ucwords( strtolower( get_post_meta( $this->get_id() , 'City' , true ) ) );
		$this->state = get_post_meta( $this->get_id() , 'State' , true );
		$this->state_abb = $this->get_abbr( $this->state );
		$this->zip = get_post_meta( $this->get_id() , 'Zip_Code' , true ); 
		$this->price = get_post_meta( $this->get_id() , 'Price' , true ); 
		$this->price_rendered = money_format( '%.0n' , (int) $this->price );
		$this->beds = get_post_meta( $this->get_id() , 'Bedrooms' , true );
		$this->link = get_post_permalink( $this->get_id() );
		$this->images = $this->get_image_meta();
		$this->title_rendered = $this->address . '<br />' . $this->city . ', ' . $this->state_abb . ' ' . $this->zip;
		$this->status = get_post_meta( $this->get_id() , 'Status' , true );
		$this->mls = get_post_meta( $this->get_id() , 'MLS_No' , true );
		$this->sub_type = get_post_meta( $this->get_id() , 'Sub-type' , true );
		$this->square_footage = get_post_meta( $this->get_id() , 'Square_Footage' , true );
		$this->type = get_post_meta( get_the_ID() , 'Property_Type' , true );
		
		$this->set_features( $post->ID );
		
		if ( $this->square_footage && $this->price ){
			
			$this->ppsf = money_format( '%.0n' , (int) round( ( $this->price / $this->square_footage ) ) );
			
		} // end if
		
		$bathrooms = explode( '.' , get_post_meta( $this->get_id() , 'Bathrooms' , true ) );
		$this->bath_full = $bathrooms[0];
		$this->bath_half = ( ! empty( $bathrooms[1] ) ) ? $bathrooms[1] : '';
		
		foreach( $this->fields as $key => $value ){
			
			$this->fields[ $key ] = get_post_meta( $this->get_id(), $key, true );
			
		} // end foreach
		
		if ( $this->get_field( 'Agent_Email' ) ){
			
			$email_array = explode( ';', $this->get_field( 'Agent_Email' ) );
			
			$this->email = $email_array[0]; 
			
		} // end if
		
	} // end set_property
	
	
	protected function set_features( $post_id ){
		
		$features_str = get_post_meta( $post_id , 'Property_Features', true );
		
		$features = array();
		
		if ( strpos( $features_str, 'A/C' ) !== false ) $features['Air Conditioning'] = 'air-conditioning';
		if ( strpos( $features_str, 'Dryer' ) !== false  ) $features['Dryer'] = 'dryer';
		if ( strpos( $features_str, 'Exercise Room' ) !== false  ) $features['Exercise Room'] = 'gym';
		if ( strpos( $features_str, 'Storage' ) !== false  ) $features['Storage'] = 'storage';
		if ( strpos( $features_str, 'Balcony' ) !== false  ) $features['Balcony'] = 'balcony';
		if ( strpos( $features_str, 'Fireplace' ) !== false  ) $features['Fireplace'] = 'fireplace';
		if ( strpos( $features_str, 'Heating' ) !== false  ) $features['Heating'] = 'heating';
		if ( strpos( $features_str, 'Washer' ) !== false  ) $features['Washer'] = 'washer';
		if ( strpos( $features_str, 'Kitchen' ) !== false  ) $features['Built-In Kitchen'] = 'kitchen';
		if ( strpos( $features_str, 'Pool' ) !== false  ) $features['Pool'] = 'pool';
		if ( strpos( $features_str, 'Yard' ) !== false  ) $features['Yard'] = 'yard';
		if ( strpos( $features_str, 'Golf' ) !== false  ) $features['Golf'] = 'golf';
		if ( strpos( $features_str, 'Playground' ) !== false  ) $features['Playground'] = 'playground';
		if ( strpos( $features_str, 'Dock' ) !== false  ) $features['Water/Boating'] = 'water';
		if ( strpos( $features_str, 'Boat' ) !== false  ) $features['Water/Boating'] = 'water';
		if ( strpos( $features_str, 'Pond') !== false  ) $features['Water/Boating'] = 'water';
		if ( strpos( $features_str, 'Lake' ) !== false  ) $features['Water/Boating'] = 'water';
		if ( strpos( $features_str, 'Gated Entry' ) !== false  ) $features['Gated Entry'] = 'gated';
		if ( strpos( $features_str, 'Tennis' ) !== false  ) $features['Tennis Court'] = 'tennis';
		if ( strpos( $features_str, 'Dishwasher' ) !== false  ) $features['Dishwasher'] = 'dishwasher';
		if ( strpos( $features_str, 'Horse' ) !== false  ) $features['Horse Friendly'] = 'horse';
		if ( strpos( $features_str, 'Bike Trails' ) !== false  ) $features['Bike Trails'] = 'bike';
		
		$this->features = $features;
		
	} // end set_features
	
	
	public function get_image_meta(){
		
		$images = array();
		
		$img_meta = get_attached_media( 'image' , $this->get_id() );
		
		if ( has_post_thumbnail( $this->get_id() ) ){
			
			$img_id =  get_post_thumbnail_id( $this->get_id() );
			
			$images['img-' . $img_id ] = $this->get_image_array( $img_id );
			
		} // end if
		
		foreach( $img_meta as $img ){
			
			$key = 'img-' . $img->ID;
			
			if ( ! array_key_exists( $key , $images ) ){
			
				$images[ $key ] = $this->get_image_array( $img->ID );
			
			} // end if
			
		} // end foreach
		
		return $images;
		
	} // end get_image_meta
	
	
	public function get_detail_page(){
		
		$accepted_emails = array( 'jamesonsir', 'sothebysrealty' );
		
		$agent_contact = array();
		
		foreach( $accepted_emails as $email ){
			
			$set_email = $this->get_field( 'Agent_Email' );
			
			if ( strpos( $this->get_field( 'Agent_Email' ),  $email ) !== false ){
				
				$agent_contact['name'] = $this->get_field( 'Listing_Agent' );
				
				$agent_contact['email'] = $this->get_field( 'Agent_Email' );
				
				$agent_contact['phone'] = $this->get_field( 'Phone' );
				
				break;
				
			} // end if
			
		} // end foreach
		
		
		
		//var_dump( $this->get_field( 'Agent_Email' ) );
		
		
		ob_start();
		
		include WOVAXTREMAINEPATH . 'includes/include-property-detail.php';
		
		return ob_get_clean();
		
	} // end get_detail_page
	
	
	public function get_image_array( $img_id ){
		
		$image = array();
			
		$thumb = wp_get_attachment_image_src( $img_id, 'thumbnail' );
		
		$feat = wp_get_attachment_image_src( $img_id, 'large' );
		
		$image['thumbnail'] = $thumb[0];
		
		$image['full'] = $feat[0];
		
		return $image;
		
	}
	
	public function get_slideshow( $lazy_load = true ){
		
		$slide_window = $this->get_slide_window( $lazy_load );
		
		$slide_nav = $this->get_slide_nav( $lazy_load );
		
		return $slide_window . $slide_nav;
		
	} // end get_slideshow
	
	
	
	public function get_slide_window( $lazy_load = true ){
		
		$images = $this->get_images();
		
		ob_start();
		
		include WOVAXTREMAINEPATH . 'includes/include-property-slideshow-slides.php';
		
		return ob_get_clean();
		
	} // end get_slides
	
	
	
	public function get_slide_nav( $lazy_load = true ){
		
		$images = $this->get_images();
		
		$image_sets = array_chunk( $images, 4 );
		
		ob_start();
		
		include WOVAXTREMAINEPATH . 'includes/include-property-slideshow-nav.php';
		
		return ob_get_clean();
		
	} // end get_slides
	
	
	public function get_abbr( $state ){
		
		$state_list = array(
			'AL'=>"Alabama",  
			'AK'=>"Alaska",  
			'AZ'=>"Arizona",  
			'AR'=>"Arkansas",  
			'CA'=>"California",  
			'CO'=>"Colorado",  
			'CT'=>"Connecticut",  
			'DE'=>"Delaware",  
			'DC'=>"District Of Columbia",  
			'FL'=>"Florida",  
			'GA'=>"Georgia",  
			'HI'=>"Hawaii",  
			'ID'=>"Idaho",  
			'IL'=>"Illinois",  
			'IN'=>"Indiana",  
			'IA'=>"Iowa",  
			'KS'=>"Kansas",  
			'KY'=>"Kentucky",  
			'LA'=>"Louisiana",  
			'ME'=>"Maine",  
			'MD'=>"Maryland",  
			'MA'=>"Massachusetts",  
			'MI'=>"Michigan",  
			'MN'=>"Minnesota",  
			'MS'=>"Mississippi",  
			'MO'=>"Missouri",  
			'MT'=>"Montana",
			'NE'=>"Nebraska",
			'NV'=>"Nevada",
			'NH'=>"New Hampshire",
			'NJ'=>"New Jersey",
			'NM'=>"New Mexico",
			'NY'=>"New York",
			'NC'=>"North Carolina",
			'ND'=>"North Dakota",
			'OH'=>"Ohio",  
			'OK'=>"Oklahoma",  
			'OR'=>"Oregon",  
			'PA'=>"Pennsylvania",  
			'RI'=>"Rhode Island",  
			'SC'=>"South Carolina",  
			'SD'=>"South Dakota",
			'TN'=>"Tennessee",  
			'TX'=>"Texas",  
			'UT'=>"Utah",  
			'VT'=>"Vermont",  
			'VA'=>"Virginia",  
			'WA'=>"Washington",  
			'WV'=>"West Virginia",  
			'WI'=>"Wisconsin",  
			'WY'=>"Wyoming");
			
		return array_search( $state, $state_list );
			
	}
	
	
	public function get_modal(){
		
		ob_start();
		
		include locate_template( 'includes/include-modal-property.php' );
		
		$html = ob_get_clean();
		
		return $html;
		
	} // end  get_modal
	
	
	public function display_comma( $value ){
		
		return str_replace( ',',', ', $value );
		
	} // end display_comma
	
	
	public function display_money( $value ){
		
		return money_format( '%.0n' , (int) round( $value ) );
		
	} // end display_comma
	
}