<?php

class Tremaine_Options {
	
	
	public function init(){
		
		add_action( 'customize_register', array( $this , 'add_customizer' ) );
		
		add_action( 'wp_head' , array( $this, 'add_to_header' ), 999 );
		
	} // end init
	
	
	public function add_to_header(){
		
		$css = array();
		
		
		if ( is_front_page() ){
			
			$feature_image = get_theme_mod( 'tremaine_frontpage_image', false );
			
			if ( $feature_image ) {
				
				$css[] = '@media screen and (max-width: 1023px) { 
					section.frontpage-feature { background-image: url(' . $feature_image . '); background-repeat: no-repeat; background-position: center; background-size: cover; } 
					section.frontpage-feature video { display: none; } 
					} '; 
				
			} // end if
			
		} // end if
		
		$css = '<style>' . implode( ' ' , $css ) . '</style>';
		
		echo $css;
		
	}
	
	
	public function add_customizer( $wp_customize ){
		
		$panel = 'tremaine_theme';
		
		$wp_customize->add_panel( $panel, array(
		  'title' 		=> 'Tremaine Theme Options',
		  'description' => 'Options for the Tremaine theme',
		  'priority' 	=> 10, // Mixed with top-level-section hierarchy.
		) );
		
		
		$this->add_header( $wp_customize  , $panel );
		
		$this->add_frontpage( $wp_customize , $panel );
		
	} // end add_customizer
	
	
	public function add_frontpage( $wp_customize , $panel ){
		
		$wp_customize->add_setting( 'tremaine_frontpage_image' , array(
			'default'     => '',
			'transport'   => 'refresh',
		) );
		
		$wp_customize->add_setting( 'tremaine_frontpage_video_mp4' , array(
			'default'     => '',
			'transport'   => 'refresh',
		) );
		
		$wp_customize->add_setting( 'tremaine_frontpage_padding' , array(
			'default'     => '',
			'transport'   => 'refresh',
		) );
		
		$wp_customize->add_section( 'tremaine_homepage' , array(
			'title'     => 'Homepage',
			'priority'  => 30,
			'panel' 	=> $panel
		) );
		
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
			   $wp_customize,
			   'tremaine_frontpage_image_control',
			   array(
				   'label'      => 'Feature Background Image',
				   'section'    => 'tremaine_homepage',
				   'settings'   => 'tremaine_frontpage_image',
			   )
		   )
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
			   $wp_customize,
			   'tremaine_frontpage_video_mp4_control',
			   array(
				   'label'      => 'Video link (.mp4)',
				   'section'    => 'tremaine_homepage',
				   'settings'   => 'tremaine_frontpage_video_mp4',
				   'type'       => 'text',
			   )
		   )
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
			   $wp_customize,
			   'tremaine_frontpage_padding_control',
			   array(
				   'label'      => 'Feature Padding',
				   'section'    => 'tremaine_homepage',
				   'settings'   => 'tremaine_frontpage_padding',
				   'type'       => 'text',
			   )
		   )
		);
		
		
	}
	
	
	protected function add_header( $wp_customize  , $panel ){
		
		$section = 'tremaine_header';
		
		$wp_customize->add_setting( 'tremaine_header_logo_image' , array(
			'default'     => '',
			'transport'   => 'refresh',
		) );
		
		$wp_customize->add_setting( 'tremaine_headerfeatured_link_text' , array(
			'default'     => '',
			'transport'   => 'refresh',
		) );
		
		$wp_customize->add_setting( 'tremaine_headerfeatured_link' , array(
			'default'     => '',
			'transport'   => 'refresh',
		) );
		
		$wp_customize->add_setting( 'tremaine_headerfeatured_link_icon' , array(
			'default'     => '',
			'transport'   => 'refresh',
		) );
		
		$wp_customize->add_section( $section , array(
			'title'     => 'Site Header',
			'priority'  => 30,
			'panel' 	=> $panel
		) );
		
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
			   $wp_customize,
			   'tremaine_header_logo_image_control',
			   array(
				   'label'      => 'Upload Header Logo',
				   'section'    => 'tremaine_header',
				   'settings'   => 'tremaine_header_logo_image',
			   )
		   )
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
			   $wp_customize,
			   'tremaine_headerfeatured_link_text_control',
			   array(
				   'label'      => 'Featured Link Title',
				   'section'    => $section,
				   'settings'   => 'tremaine_headerfeatured_link_text',
				   'type'       => 'text',
			   )
		   )
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
			   $wp_customize,
			   'tremaine_headerfeatured_link_control',
			   array(
				   'label'      => 'Featured Link',
				   'section'    => $section,
				   'settings'   => 'tremaine_headerfeatured_link',
				   'type'       => 'text',
			   )
		   )
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
			   $wp_customize,
			   'tremaine_headerfeatured_link_icon_control',
			   array(
				   'label'      => 'Link Icon (FontAwesome Class)',
				   'section'    => $section,
				   'settings'   => 'tremaine_headerfeatured_link_icon',
				   'type'       => 'text',
			   )
		   )
		);
		
	} // end add_header
	
	
}