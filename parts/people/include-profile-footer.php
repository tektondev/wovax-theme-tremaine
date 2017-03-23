 <section class="tre-profile-tabs">
	<div class="wrap">
        <div class="tre-tabs">
        	<nav><?php if( $shortcode_1 ):?><a href="#" class="tre-active"><?php echo get_theme_mod('crest_profile_shortcode_1_label', '');?></a><?php endif;?><?php if( $shortcode_2 ):?><a href="#"><?php echo get_theme_mod('crest_profile_shortcode_2_label', '');?></a><?php endif;?></nav>
        	<div class="tre-tabs-wrapper">
            	<?php if( $shortcode_1 ):?><div class="tremaine-shortcode-item tab-section tre-active">
                	<textarea><?php echo $shortcode_1;?></textarea> 
                	<?php //echo do_shortcode( $shortcode_1 );?>
                </div><?php endif;?>
                <?php if( $shortcode_2 ):?><div class="tremaine-shortcode-item tab-section">
                	<textarea><?php echo $shortcode_1;?></textarea>
                	<?php //echo do_shortcode( $shortcode_2 );?>
                </div><?php endif;?>
            </div>
        </div>
    </div>
</section>