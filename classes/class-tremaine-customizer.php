<?php
class Tremaine_Customizer {
	
	public function init(){
		
		// Adds custom header support to customizer
		add_action( 'customize_register', array( $this , 'add_customizer_sections' ) );
		
	} // end do_init
	
	
	public function add_customizer_sections( $wp_customize ){
		
		$panel = 'tremaine_theme';
		
		$wp_customize->add_panel( $panel, array(
		  'title' 		=> 'Tremaine Theme Options',
		  'description' => 'Options for the Tremaine theme',
		  'priority' 	=> 10, // Mixed with top-level-section hierarchy.
		) );
		
		
		$this->add_header( $wp_customize  , $panel );
		
		//$this->add_frontpage( $wp_customize  , $panel );
		
		//$this->add_profile( $wp_customize  , $panel );
		
	} // end do_add_customizer
	
	
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
		
		/*$wp_customize->add_setting( 'wovax_header_bg_color' , array(
			'default'     => '',
			'transport'   => 'refresh',
		) );
		
		$wp_customize->add_setting( 'wovax_header_text_color' , array(
			'default'     => '',
			'transport'   => 'refresh',
		) );
		
		$wp_customize->add_setting( 'wovax_header_menu_text_color' , array(
			'default'     => '',
			'transport'   => 'refresh',
		) );
		
		$wp_customize->add_setting( 'wovax_header_menu_text_color_active' , array(
			'default'     => '',
			'transport'   => 'refresh',
		) );
		
		
		
		// Section
		
		$wp_customize->add_section( 'wovax_wovax_header' , array(
			'title'     => 'Site Header',
			'priority'  => 30,
			'panel' 	=> $panel
		) );
		
		
		// Controls
		
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
				$wp_customize, 
				'wovax_header_bg_color_control', 
				array(
					'label'      => 'Header Background Color',
					'section'    => 'wovax_wovax_header',
					'settings'   => 'wovax_header_bg_color',
				) 
			) 
		);
		
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
				$wp_customize, 
				'wovax_header_text_color_control', 
				array(
					'label'      => 'Header Text Color',
					'section'    => 'wovax_wovax_header',
					'settings'   => 'wovax_header_text_color',
				) 
			) 
		);
		
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
				$wp_customize, 
				'wovax_header_menu_text_color_control', 
				array(
					'label'      => 'Menu Text Color',
					'section'    => 'wovax_wovax_header',
					'settings'   => 'wovax_header_menu_text_color',
				) 
			) 
		);
		
		$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
				$wp_customize, 
				'wovax_header_menu_text_color_active_control', 
				array(
					'label'      => 'Menu Text Color (Active)',
					'section'    => 'wovax_wovax_header',
					'settings'   => 'wovax_header_menu_text_color_active',
				) 
			) 
		);
		
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
			   $wp_customize,
			   'wovax_header_logo_image_control',
			   array(
				   'label'      => 'Upload Header Logo',
				   'section'    => 'wovax_wovax_header',
				   'settings'   => 'wovax_header_logo_image',
			   )
		   )
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
			   $wp_customize,
			   'wovax_header_widget_control','Widget Areas'
		   )
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
			   $wp_customize,
			   'wovax_header_widget_before_control',
			   array(
				   'label'      => 'Widget Area Above Header',
				   'section'    => 'wovax_wovax_header',
				   'settings'   => 'wovax_header_widget_before',
				   'type'       => 'checkbox',
			   )
		   )
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
			   $wp_customize,
			   'wovax_header_widget_after_control',
			   array(
				   'label'      => 'Widget Area Below Header',
				   'section'    => 'wovax_wovax_header',
				   'settings'   => 'wovax_header_widget_after',
				   'type'       => 'checkbox',
			   )
		   )
		);*/
		
		
	} // end add_header
	
} // end WT_Tremaine_Customizer