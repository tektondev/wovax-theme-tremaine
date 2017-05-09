<?php

class Shortcode_Tremaine_CREST_People_Gallery extends Tremaine_Shortcode {

	protected $tag = 'crest_people_gallery';
	
	protected $default_atts = array(
		'ids' => false,
		);
	
	
	public function render_shortcode( $atts , $content, $tag, $atts_orig ){
		
		ob_start();
		
			include 'parts/gallery.css';
		
		$css = ob_get_clean();
		
		$offices = $this->get_offices();
		
		$presets = $this->get_presets( $atts );
		
		$query = $this->get_query( $presets );
		
		$content_html = $this->get_form_controls( $presets, $query, $offices );
		
		$content_html .= $this->get_form_results( $presets, $query, $offices );
		
		$content_html .= $this->get_form_controls( $presets, $query, $offices, true );
		
		$html = '<style>' . $css . '</style>' . $this->get_form_wrap( $content_html, $presets, $query );
		
		return $html;
		
	} // end render_shortcode
	
	
	protected function get_form_results( $presets, $query, $offices ){
		
		$html = apply_filters( 'crest_people_form_results_pre', '', $presets, $query );
		
		if ( empty( $html ) ){
			
			$results_html = array();
			
			if ( $query->have_posts() ){
				
				while ( $query->have_posts() ){
					
					$query->the_post();
					$image = get_post_meta( get_the_ID(),  '_primary_photo_url', true );
					if ( empty( $image ) ){
						$image = WOVAXTREMAINEURL . 'shortcodes/tremaine-crest-gallery/images/personplaceholder.gif';
					} // end if
					$office_id = get_post_meta( get_the_ID(),  '_office_id', true );
					$name = get_post_meta( get_the_ID(),  '_display_name', true );
					$position = get_post_meta( get_the_ID(),  '_position', true );
					$email = get_post_meta( get_the_ID(),  '_primary_email', true );
					$phone = get_post_meta( get_the_ID(),  '_primary_phone', true );
					$website = get_post_meta( get_the_ID(),  '_primary_web_url', true );
					$link = get_post_permalink();
					
					if ( empty( $phone ) ){
					
						$phone = get_post_meta( get_the_ID(),  '_phone_additional', true );
						
					} // end if
					
					if ( ! empty( $phone ) ){
				
						$phone_array = str_split( $phone , 3 );
						
						$phone = $phone_array[0];
						
						if ( isset( $phone_array[1] ) ) $phone .= '.' .  $phone_array[1];
						if ( isset( $phone_array[2] ) ) $phone .= '.' .  $phone_array[2];
						if ( isset( $phone_array[3] ) ) $phone .= $phone_array[3];
					
					} // end if
					
					ob_start();
			
					include 'parts/form-result.php';
					
					$result_html = ob_get_clean();
					
					$results_html[] = $result_html;
					
				} // end while
				
				wp_reset_postdata();
				
			} // end if
			
			ob_start();
			
			include 'parts/form-results.php';
			
			$html = ob_get_clean();
			
		} // end if
		
		$html = apply_filters( 'crest_people_form_results', $html, $presets, $query );
		
		return $html;
		
	} // end get_form_controls
	
	
	protected function get_form_wrap( $content_html, $presets, $query ){
		
		ob_start();
			
		include 'parts/form-wrapper.php';
		
		$html = ob_get_clean();
		
		return $html;
		
	} // end get_form_wrap
	
	
	protected function get_offices(){
		
		$offices = array();
		
		$args = array(
			'post_type' => 'office',
			'status'	=> 'publish',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC',
		);
		
		$office_query = new WP_Query( $args );
		
		if ( $office_query->have_posts() ){
			
			while( $office_query->have_posts() ){
				
				$office_query->the_post();
				
				$id = get_post_meta( get_the_ID(), '_office_id', true );
				
				$office = array(
					'name' => get_the_title(),
					'link' => get_post_permalink(),
				);
				
				$offices[ $id ] = $office;
				
			} // end while
			
			wp_reset_postdata();
			
		} // end if
		
		return $offices;
		
	} // end get_offices
	
	
	protected function get_presets( $atts ){
		
		$defaults = array(
			'paged' => 1,
			'posts_per_page' => 12,
			'display_as' => 'gallery',
			'show_photo' => 1,
			'show_name' => 1,
			'show_title' => 1,
			'show_email' => 1,
			'show_website' => 1,
			'link_to_profile' => 1,
			'role' => 'sales-associate',
			'keyword' => '',
			'orderby' => 'title',
			'sort_by' => false,
			'company-filter' => '',
			'agent-keyword' => '',
		);
		
		if ( isset( $_GET['cpage'] ) ) $atts['paged'] = sanitize_text_field( $_GET['cpage'] );
		
		if ( isset( $_GET['agent-keyword'] ) ) $atts['agent-keyword'] = sanitize_text_field( $_GET['agent-keyword'] );
		
		if ( isset( $_GET['sort_by'] ) ) $atts['sort_by'] = sanitize_text_field( $_GET['sort_by'] );
		
		if ( isset( $_GET['company-filter'] ) ) $atts['company-filter'] = sanitize_text_field( $_GET['company-filter'] );
		
		$presets = shortcode_atts( $defaults , $atts );
		
		return $presets;
		
	} // end get_presets
	
	
	protected function get_query( $presets ) {
		
		$args = array(
			'post_type' => 'people',
			'status'	=> 'publish',
			'posts_per_page' => 12,
			'orderby' => 'title',
			'order' => 'ASC',
		);
		
		if ( ! empty( $presets['sort_by'] ) ) $this->add_sort_args( $args, $presets );
		
		if ( ! empty( $presets['posts_per_page'] ) ) $args['posts_per_page'] = $presets['posts_per_page'];
		
		if ( ! empty( $presets['paged'] ) ) $args['paged'] = $presets['paged']; 
		
		if ( ! empty( $presets['role'] ) ) {
			
			$roles_tax = array( 'relation' => 'AND',);
			
			$roles = explode( ',', $presets['role'] );
			
			foreach( $roles as $role ){
				
				$roles_tax[] = array(
					'taxonomy' => 'people_position',
					'field'    => 'slug',
					'terms'    =>  $role,
				);
				
			} // end foreach
			
			$args['tax_query'] = $roles_tax;
			
		} // end if
		
		if ( isset( $_GET['test'] ) ) var_dump( $presets['agent-keyword'] );
		
		if ( $presets['agent-keyword'] ){
			
			$the_query = $this->get_search_query( $presets, $args );
				
		} else {
			
			if ( ! empty( $presets['company-filter'] ) ){
			
				$args['meta_query'] = array(
					 array(
						'key'     => '_office_id',
						'value'   => $presets['company-filter'],
					)
				);
				
			} // end if
		
			$the_query = new WP_Query( $args );
		
		} // end if
		
		
		return $the_query;
		
	} // end get_query
	
	
	protected function get_search_query( $presets, $args ){
		
		$args['posts_per_page'] = -1;
		
		$post_ids = array();
		
		$s_query_args = $args;
		/*$meta_query_args = $args;
		$meta_query = array();
		
		$meta_fields = array(
		//'_primary_web_url',
		//'_office_staff_id',
		'_primary_email',
		//'_office_location',
		'_primary_phone',
		'_position',
		//'_languages',
		//'_rfg_office_staff_id',
		'_office_name',
		'_display_name',
		'_familiar_name',
		);
		
		foreach( $meta_fields as $meta_field ){
			
			$meta_query[] = array(
				'key'     => $meta_field,
				'value'   => $presets['agent-keyword'],
				'compare' => 'LIKE',
			);
			
		} // end foreach
		
		$meta_query_args['meta_query'] = $meta_query;
		
		//var_dump( $meta_query_args );
		
		$m_query = new WP_Query( $meta_query_args );
		
		if ( $m_query->have_posts() ){
			
			while( $m_query->have_posts() ){
				
				$m_query->the_post();
				
				if( ! in_array( $m_query->post->ID, $post_ids ) ){
					
					$post_ids[] = $m_query->post->ID;
					
				} // end if
				
			} // end while
			
			wp_reset_postdata();
			
		} // end if
		
		//var_dump( $post_ids );
		
		//return $m_query;
		
		*/
		
		$s_query_args['s'] = $presets['agent-keyword'];
		
		//if ( ! empty( $_GET['test'] ) ) var_dump( $s_query_args );
		
		$s_query = new WP_Query( $s_query_args );
		
		if ( $s_query->have_posts() ){
			
			while( $s_query->have_posts() ){
				
				$s_query->the_post();
				
				if( ! in_array( $s_query->post->ID, $post_ids ) ){
					
					$post_ids[] = $s_query->post->ID;
					
				} // end if
				
			} // end while
			
			wp_reset_postdata();
			
		} // end if
		
		$args['posts_per_page'] = 12;
		
		$args['post__in'] = $post_ids;
		
		if ( ! empty( $presets['company-filter'] ) ){
			
			$args['meta_query'] = array(
				 array(
					'key'     => '_office_id',
					'value'   => $presets['company-filter'],
				)
			);
			
		} // end if
		
		$f_query = new WP_Query( $args );
		
		return $f_query;
		
	} // end  get_search_query
	
	
	protected function get_form_controls( $presets, $query, $offices, $is_footer = false ){
		$page = $presets['paged'];
		$total_results = $query->found_posts;
		$total_pages = $query->max_num_pages;
		$next_page = ( ( $page + 1 ) < $total_results ) ? ( $page + 1 ) : 'na';
		$prev_page = ( ( $page - 1 ) > 0 ) ? ( $page - 1 ) : 'na';
		$start_set = ( $page == 1 ) ? 1 : ( $page - 1 );
		$end_set = ( ( $start_set + 4 ) > $total_pages ) ? $total_pages : $start_set + 4;
		$showing_start = ( $page == 1 ) ? 1 : ( $page - 1 ) * $presets['posts_per_page'];
		$showing_end = ( $query->post_count < $presets['posts_per_page'] ) ? $query->post_count : $showing_start + ( $presets['posts_per_page'] - 1 ) ;
		
		$html = apply_filters( 'crest_people_form_controls_pre', '', $presets, $query );
		
		if ( empty( $html ) ){
			
			ob_start();
			
			if ( $is_footer ){ 
			
				include 'parts/form-footer.php';
			
			} else {
				
				include 'parts/agents-form.php';
				
				include 'parts/form-control.php';
				
			} // end if
			
			$html = ob_get_clean();
			
		} // end if
		
		$html = apply_filters( 'crest_people_form_controls', $html, $presets, $query );
		
		return $html;
		
	} // end get_form_controls
	
	
	public function add_sort_args( &$args, $presets ){
		
		switch( $presets['sort_by'] ){
			
			case 'f_name':
				$args['orderby'] = 'meta_value';
				$args['meta_key']  = '_first_name';
				break;
			case 'office':
				$args['orderby'] = 'meta_value';
				$args['meta_key']  = '_office_name';
				break;
			
		} // end switch
		
	} // end add_sort_args
	
	
} // end Shortcode_Tremaine_people