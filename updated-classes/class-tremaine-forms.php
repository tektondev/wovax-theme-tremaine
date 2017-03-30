<?php

class Tremaine_Forms {
	
	
	public function get_pagination( $wp_query, $page_number, $per_page ){
		
		$page = $page_number;
		$count = $wp_query->post_count;
		$total_results = $wp_query->found_posts;
		$total_pages = $wp_query->max_num_pages;
		$next_page = ( ( $page + 1 ) < $total_results ) ? ( $page + 1 ) : 'na';
		$prev_page = ( ( $page - 1 ) > 0 ) ? ( $page - 1 ) : 'na';
		$start_set = ( $page == 1 ) ? 1 : ( $page - 1 );
		$end_set = ( ( $start_set + 4 ) > $total_pages ) ? $total_pages : $start_set + 4;
		$showing_start = ( $page == 1 ) ? 1 : ( $page - 1 ) * ( $per_page + 1 );
		$showing_end = ( $total_results < $per_page ) ? $total_results : $showing_start + ( $count - 1 ) ;
		
		ob_start();
		
		include WOVAXTREMAINEPATH . 'parts/forms/pagination.php';
		
		return ob_get_clean();
		
	} // end get_pagination
	
}