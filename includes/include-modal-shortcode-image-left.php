<div class="tre-modal-content" id="<?php echo $modal_id;?>">
    <div class="tremaine-modal-image-left<?php if( $img_url ) { echo ' has-image';}?>">
        <div class="tremaine-modal-bg-image-wrapper" style="background-image:url(<?php echo $img_url;?>)" >
        </div>
        <div class="tremaine-modal-content">
            <?php echo wpautop( do_shortcode( $post->post_content ) );?>
        </div>
    </div>
</div>