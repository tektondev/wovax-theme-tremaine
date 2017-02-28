<?php 

class Tremaine_Widget_Menu_Link extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'wovax_menu_link',
			'description' => 'Custom Menu Style Link for Widget Areas',
		);
		parent::__construct( 'wovax_menu_link', 'Wovax Menu Link', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		
		if ( ! empty( $instance['link'] ) ){
			
			$html = '<a href="' . $instance['link'] . '" class="wovax-custom-menu-link ' . $instance['css_hook'] . '">';
			
			if ( ! empty( $instance['link_icon'] ) ){
				
				$html .= '<i class="fa ' . $instance['link_icon'] . '" aria-hidden="true"></i> ';
				
			} // end if
			
			$html .= $instance['link_title'] . '</a>';
			
			echo $html;
			
		}  // end if
		
		// outputs the content of the widget
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		
		$link_title = ! empty( $instance['link_title'] ) ? $instance['link_title'] : '';
		$link = ! empty( $instance['link'] ) ? $instance['link'] : '';
		$link_icon = ! empty( $instance['link_icon'] ) ? $instance['link_icon'] : '';
		$css_hook = ! empty( $instance['css_hook'] ) ? $instance['css_hook'] : '';
		
		include get_stylesheet_directory() . '/includes/include-widget-menu-link-form.php';
		// outputs the options form on admin
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		
		$clean = array();
		
		$settings = array( 'link_title', 'link', 'link_icon', 'css_hook' );
		
		foreach( $settings as $setting ){
			
			$clean[ $setting ] = ! empty( $new_instance[ $setting ] ) ? sanitize_text_field( $new_instance[ $setting ] ) : '';
			
		} // end foreahc
		
		return $clean;
		
	} // end 
}