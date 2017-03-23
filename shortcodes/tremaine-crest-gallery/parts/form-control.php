<header class="wx-post-gallery-results-header">
    <h2>
        Agents
    </h2>
    <fieldset class="wx-gallery-controls">
    	<div class="wx-gallery-field wx-sort-field">
        	<label>Sort By</label>
            <select name="sort_by" class="tremaine-submit-on-change">
                <option value="l_name" <?php selected( $presets['sort_by'], 'l_name' );?>>Last Name</option>
                <option value="f_name" <?php selected( $presets['sort_by'], 'f_name' );?>>First Name</option>
                <!--<option value="office" <?php selected( $presets['sort_by'], 'office' );?>>Office</option>-->
            </select>
        </div>

        <div class="wx-gallery-field wx-desc-field">
            Showing <?php echo $showing_start;?> - <?php echo $showing_end;?> of <?php echo $total_results;?>
        </div>
        <?php if( $end_set != 1 ):?><div class="wx-gallery-field wx-gallery-paged">
            <div class="wx-gallery-field wx-arrow-button">
                <input<?php if( $prev_page == 'na' ) { echo ' disabled';}?> type="submit" name="cpage" value="<?php echo $prev_page;?>"  style="background-image:url(<?php echo WOVAXTREMAINEURL;?>/shortcodes/tremaine-crest-gallery/images/arrow-left-blue.png)" />
            </div>
            	<div class="wx-gallery-field wx-page-numbers">
            	<?php for( $i = $start_set; $i < ( $end_set ); $i++ ):?>
                <input type="submit" name="cpage" value="<?php echo $i;?>" <?php if( $i == $page ) { echo 'class="wx-active"'; } ?> />
                <?php endfor;?>
                <div>&nbsp;.....</div>
                <input type="submit" name="cpage" value="<?php echo $total_pages;?>" />
            </div>
            <div class="wx-gallery-field wx-arrow-button">
                <input<?php if( $next_page == 'na' ) { echo ' disabled';}?> type="submit" name="cpage" value="<?php echo $next_page;?>"  style="background-image:url(<?php echo WOVAXTREMAINEURL;?>/shortcodes/tremaine-crest-gallery/images/arrow-right-blue.png)" />
            </div>
        </div><?php endif;?>
    </fieldset>
</header>