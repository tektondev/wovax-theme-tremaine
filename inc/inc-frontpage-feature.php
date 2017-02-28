<?php if ( is_active_sidebar( 'tremaine_frontpage_before') ):?>
<section class="frontpage-feature-before"><div class="wrap"><?php dynamic_sidebar( 'tremaine_frontpage_before' ); ?></div></section>
<?php endif;?>
<?php if ( is_active_sidebar( 'tremaine_frontpage') ):?>
<section class="frontpage-feature" style="padding-top: 305px;padding-bottom: 325px;">
	<?php if ( ! empty( $video_mp4 ) || ! empty( $video_ogg ) ):?>
	<video autoplay loop>
      <?php if ( ! empty( $video_mp4 ) ):?><source src="<?php echo $video_mp4 ;?>"><?php endif;?>
      <?php if ( ! empty( $video_ogg ) ):?><source src="<?php echo $video_ogg ;?>" type="video/ogg"><?php endif;?>
    </video>
    <?php endif;?>
	<div class="wrap">
    	<?php dynamic_sidebar( 'tremaine_frontpage' ); ?>
    </div>
</section>
<?php endif;?>
<?php if ( is_active_sidebar( 'tremaine_frontpage_after') ):?>
<section class="frontpage-feature-after"><div class="wrap"><?php dynamic_sidebar( 'tremaine_frontpage_after' ); ?></div></section>
<?php endif;?>