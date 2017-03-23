<section class="tre-developments primary-page-banner">
    <div class="trerow trelayout-half" style="background-color: #e8e8e8;">    	
    	<div class="trerow-inner">
            <div class="trecolumn trecolumn-one image-spacer-column" style="background-image:url(<?php echo $settings['featured_image'];?>)">
            	<div class="trebg"></div>
                <div class="trecolumn-inner">
                   
            	</div>
                <?php if( $settings['_more_info_modal'] ):?>
                	<a href="#" class="more-link show-modal" data-modalid="modal-<?php echo $settings['_more_info_modal'];?>">More Information <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                <?php elseif( $settings['_more_link'] ):?>
                	<a href="<?php echo $settings['_more_link'];?>" class="more-link">More Information <i class="fa fa-caret-right" aria-hidden="true"></i></a>
				<?php endif;?>
            </div>
            <div class="trecolumn trecolumn-two">
             <h1><?php echo get_the_title( $post->ID );?></h1>
             <h3><?php echo $settings['_subtitle'];?></h3>
             <div class="tre-table">
             	<?php if( $settings['_residences'] ):?><div>
                	<div><i></i>Number of Residences</div>
                    <div><?php echo $settings['_residences'];?></div>
                </div><?php endif;?>
                <?php if( $settings['_unit_mix'] ):?><div>
                	<div><i></i>Unit Mix</div>
                    <div><?php echo $settings['_unit_mix'];?></div>
                </div><?php endif;?>
                <?php if( $settings['_pricing'] ):?><div>
                	<div><i></i>Pricing</div>
                    <div><?php echo $settings['_pricing'];?></div>
                </div><?php endif;?>
                <?php if( $settings['_architect'] ):?><div>
                	<div><i></i>Architect</div>
                    <div><?php echo $settings['_architect'];?></div>
                </div><?php endif;?>
               <?php if( $settings['_developer'] ):?><div>
                	<div><i></i>Developer</div>
                    <div><?php echo $settings['_developer'];?></div>
                </div><?php endif;?>
                <?php if( $settings['_interior_designer'] ):?><div>
                	<div><i></i>Interior Designer</div>
                    <div><?php echo $settings['_interior_designer'];?></div>
                </div><?php endif;?>
            </div>
            <?php if( $settings['_address'] ):?><p class="tre-icon-before-wide"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $settings['_address'];?></p><?php endif;?>
            <p><a href="#" class="tre-button-light tre-modal show-modal" data-modalid="modal-<?php echo $modal_id;?>"><?php if ( $settings['_modal_link_text'] ) { echo $settings['_modal_link_text']; } else { echo 'schedule your free consultation'; }?></a><?php echo do_shortcode('[tremaine_modal id="' . $modal_id . '"]');?></p>
        </div>
        
    </div>
</section>