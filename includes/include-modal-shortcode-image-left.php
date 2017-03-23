<div class="tre-modal-content" id="<?php echo $modal_id;?>">
    <div class="tremaine-modal-image-left<?php if( $img_url ) { echo ' has-image';}?>">
        <?php if ( $img_url ):?><div class="tremaine-modal-bg-image-wrapper" style="background-image:url(<?php echo $img_url;?>)" >
        </div><?php endif;?>
        <div class="tremaine-modal-content">
            <?php echo do_shortcode( wpautop( $post->post_content ) );?>
        </div>
    </div>
</div>