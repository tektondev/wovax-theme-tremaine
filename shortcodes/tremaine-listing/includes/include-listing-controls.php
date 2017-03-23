<header class="wx-post-gallery-results-header">
    <h2>
        Agents
    </h2>
    <fieldset class="wx-gallery-controls">
    	<div class="wx-gallery-field wx-sort-field">
        	<label>Sort By</label>
            <select name="company">
                <?php 
					$sort_options = get_option('wovax_sort_fields');
				
					foreach($sort_options as $key => $values) : ?>
					<option value="<?php echo $values['value'];?>"><?php echo $values['display_name'];?></option>
					<?php endforeach;?>
            </select>
        </div>

        <div class="wx-gallery-field wx-desc-field">
            Showing <?php echo $showing_start;?> - <?php echo $showing_end;?> of <?php echo $total_results;?>
        </div>
        <div class="wx-gallery-field wx-gallery-paged">
            <div class="wx-gallery-field wx-arrow-button">
                <input<?php if( $prev_page == 'na' ) { echo ' disabled';}?> type="submit" name="cpage" value="<?php echo $prev_page;?>"  style="background-image:url(<?php echo WCRESTPLUGINURL;?>images/arrow-left-blue.png)" />
            </div>
            <div class="wx-gallery-field wx-page-numbers">
            	<?php for( $i = $start_set; $i < ( $start_set + 4 ); $i++ ):?>
                <input type="submit" name="cpage" value="<?php echo $i;?>" <?php if( $i == $page ) { echo 'class="wx-active"'; } ?> />
                <?php endfor;?>
                <div>&nbsp;.....</div>
                <input type="submit" name="cpage" value="<?php echo $total_pages;?>" />
            </div>
            <div class="wx-gallery-field wx-arrow-button">
                <input<?php if( $next_page == 'na' ) { echo ' disabled';}?> type="submit" name="cpage" value="<?php echo $next_page;?>"  style="background-image:url(<?php echo WCRESTPLUGINURL;?>images/arrow-right-blue.png)" />
            </div>
        </div>
    </fieldset>
</header>