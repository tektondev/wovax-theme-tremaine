<form method="get" class="wx-post-gallery">
	<div class="tre-gallery property-listing-gallery">
		<?php if ( ! empty( $presets['show_controls'] ) ):?><header class="wx-post-gallery-results-header">
            <h2>
                <?php echo number_format( $total_results );?> Listings Found
            </h2>
            <fieldset class="wx-gallery-controls">
                <div class="wx-gallery-field wx-sort-field">
                    <label>Sort By</label>
                    <select class="wovax-listings-sort" name="sort_by">
                    	<?php foreach( $sort_options as $key => $values ) : ?>
						<option value="<?php echo $values['value'];?>" <?php selected( $values['value'], $presets['sort_by'] );?>><?php echo $values['display_name'];?></option>
						<?php endforeach;?>
                    </select>
                </div>
        
                <div class="wx-gallery-field wx-desc-field">
                    Showing <?php echo number_format( $showing_start );?> - <?php echo number_format( $showing_end );?> of <?php echo number_format( $total_results );?>
                </div>
                <?php if( $end_set != 1 ):?><div class="wx-gallery-field wx-gallery-paged">
                    <div class="wx-gallery-field wx-arrow-button">
                        <input<?php if( $prev_page == 'na' ) { echo ' disabled';}?> type="submit" name="cpage" value="<?php echo $prev_page;?>"  style="background-image:url(<?php echo WOVAXTREMAINEURL;?>images/arrow-left-blue.png)" />
                    </div>
                    <div class="wx-gallery-field wx-page-numbers">
                        <?php for( $i = $start_set; $i < ( $end_set ); $i++ ):?>
                        <input type="submit" name="cpage" value="<?php echo $i;?>" <?php if( $i == $page ) { echo 'class="wx-active"'; } ?> />
                        <?php endfor;?>
                        <div>&nbsp;.....</div>
                        <input type="submit" name="cpage" value="<?php echo $total_pages;?>" />
                    </div>
                    <div class="wx-gallery-field wx-arrow-button">
                        <input<?php if( $next_page == 'na' ) { echo ' disabled';}?> type="submit" name="cpage" value="<?php echo $next_page;?>"  style="background-image:url(<?php echo WOVAXTREMAINEURL;?>images/arrow-right-blue.png)" />
                    </div>
                </div><?php endif;?>
            </fieldset>
        </header><?php endif ?>
		<ul class="tre-gallery-results results-gallery ">
			<?php $class = 'wovax-gallery-third'; foreach( $properties as $property ) {
				
				include locate_template( 'inc/inc-property-card.php' );
				
			} // end foreach?>
        </ul>
	</div>
    <?php if ( ! empty( $presets['show_controls'] ) ):?><footer class="wx-gallery-footer">
    <?php include WOVAXTREMAINEPATH . 'shortcodes/tremaine-listing/includes/include-form-footer.php';?>
    </footer><?php endif;?>
    <script>
		jQuery('body').on('change','.wovax-listings-sort', function(){ jQuery( this ).closest('form').submit(); } );
	</script>
</form>