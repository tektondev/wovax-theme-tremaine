<footer class="wx-gallery-footer">
<fieldset class="wx-gallery-controls">
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
</footer>