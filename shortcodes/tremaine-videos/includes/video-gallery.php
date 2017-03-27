<form method="get" class="tremaine-video-shortcode">
	<?php if ( ! empty( $atts[ 'cpage' ] ) ) :?><fieldset class="wovax-form-controls">
	<?php echo $pagination; ?>
    </fieldset><?php endif;?>
    <div class="tremaine-video-gallery">
        <ul class="tremaine-video-gallery-wrapper">
            <?php foreach( $video_cards as $video_card ):?><li class="tremaine-video-card-wrapper"><?php echo $video_card;?></li><?php endforeach;?>
        </ul>
    </div>
    <?php if ( ! empty( $atts[ 'cpage' ] ) ) :?><fieldset class="wovax-form-controls footer-controls">
	<?php echo $pagination; ?>
    </fieldset>
    <?php endif;?>
    <?php if ( ( empty( $atts[ 'cpage' ] ) || $atts[ 'cpage' ] < 2 ) && $the_query->found_posts > $args[ 'posts_per_page' ] ) echo '<a style="margin-top: 24px;" href="?cpage=2" class="tre-button-light">Browse Past Episodes</a>';?>
</form>