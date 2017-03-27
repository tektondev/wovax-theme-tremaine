<div class="wx-pagination-field wx-desc-field">
    Showing <?php echo number_format( $showing_start );?> - <?php echo number_format( $showing_end );?> of <?php echo number_format( $total_results );?>
</div>
<?php if( $end_set != 1 ):?><div class="wx-pagination-field wx-pagination-paged">
    <div class="wx-pagination-field wx-arrow-button">
        <input<?php if( $prev_page == 'na' ) { echo ' disabled';}?> type="submit" name="cpage" value="<?php echo $prev_page;?>"  style="background-image:url(<?php echo WOVAXTREMAINEURL;?>images/arrow-left-blue.png)" />
    </div>
    <div class="wx-pagination-field wx-page-numbers">
        <?php for( $i = $start_set; $i < ( $end_set ); $i++ ):?>
        <input type="submit" name="cpage" value="<?php echo $i;?>" <?php if( $i == $page ) { echo 'class="wx-active"'; } ?> />
        <?php endfor;?>
        <div>&nbsp;.....</div>
        <input type="submit" name="cpage" value="<?php echo $total_pages;?>" <?php if( $total_pages == $page ) { echo 'class="wx-active"'; } ?> />
    </div>
    <div class="wx-pagination-field wx-arrow-button">
        <input<?php if( $next_page == 'na' ) { echo ' disabled';}?> type="submit" name="cpage" value="<?php echo $next_page;?>"  style="background-image:url(<?php echo WOVAXTREMAINEURL;?>images/arrow-right-blue.png)" />
    </div>
</div><?php endif;?>