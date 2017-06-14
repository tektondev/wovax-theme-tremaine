<?php

class Tremaine_Site_Header {
	
	
	public function init(){
		
		// Adds custom header support to customizer
		//add_action( 'customize_register', array( $this , 'add_customizer_settings' ) );
		
		add_action( 'tremaine_wp_head_style' , array( $this , 'add_logo_css' ) );
		
		add_action( 'genesis_header_right' , array( $this , 'add_header_right' ) );
		
		add_action( 'genesis_after_header' , array( $this , 'add_secondary_nav' ) , 80 );
		
	} // end init
	
	public function add_secondary_nav(){
		
		if ( is_active_sidebar( 'tremaine_secondary_nav') ) {
		
			echo '<div class="tre-secondary-nav"><div class="wrap">';
			
			ob_start();
			
			dynamic_sidebar( 'tremaine_secondary_nav' );
			
			$html = ob_get_clean();
			
			echo apply_filters( 'do_modal_windows', $html );
			
			echo '</div></div>';
			
		} // end if
		
		if ( is_active_sidebar( 'tremaine_mobile') ) {
		
			echo '<div class="site-nav-secondary-mobile"><div class="wrap">';
			
			ob_start();
			
			dynamic_sidebar( 'tremaine_mobile' );
			
			$html = ob_get_clean();
			
			echo apply_filters( 'do_modal_windows', $html );
			
			echo '</div></div>';
			
		} // end if
		
	} // end add_secondary_nav
	
	
	public function add_logo_css(){
		
		$logo_img = get_theme_mod( 'tremaine_header_logo_image' , false );
		
		if ( $logo_img ){
			
			echo '.header-image .site-title > a {background-image:url(' . $logo_img . ') }'; 
			
		} // end if
		
	} // end 
	
	
	public function add_header_right(){
		
		$html = '<div class="tremaine-header-right">';
		
		if ( is_active_sidebar( 'header_nav_before' ) ){
			
			ob_start();
			
			echo '<div class="header-before-nav-widgets">';
			
			dynamic_sidebar( 'header_nav_before' );
			
			echo '</div>';
			
			$html .= ob_get_clean();
			
		} // end if
		
		$html .='</div>';
		
		echo $html;
		
	} // end 
	
	
	
	public function add_customizer_settings( $wp_customize ){
		
		$wp_customize->add_setting( 'tremaine_header_logo_image' , array(
			'default'     => '',
			'transport'   => 'refresh',
		) );
		
		$wp_customize->add_section( 'tremaine_header' , array(
			'title'     => 'Site Header',
			'priority'  => 30,
			'panel' 	=> 'tremaine_panel'
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

	
	}
	
} // end Tremaine_Site_Header