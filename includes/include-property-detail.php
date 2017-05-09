<div class="tre-property-single property-listing-detail">
	<header>
    	<h1><?php echo $this->get_title_rendered(); ?></h1>
		<div class="tre-property-price">
        <?php echo $this->get_price_rendered(); ?>
        </div>
    </header>
	<section class="tre-property-card">
    	<div class="wrap">
    		<div class="trerow">
        		<div class="trecolumn trecolumn-one">
            <?php echo $this->get_slideshow( false );?>
            	</div><div class="trecolumn trecolumn-two">
                	<a href="#" class="tre-button-light show-modal tre-modal" data-modalid="modal-4072008">Ask a Question</a>
                    <ul class="property-data">
                    	<li><?php
							echo $this->get_bed_text( true );
							echo $this->get_bath_text(); 
						?></li>
                        <?php if( ! empty( $this->get_field('Year_Built') ) ):?><li><span>YEAR BUILT:</span> <?php echo $this->get_field('Year_Built');?></li><?php endif;?>
                        <?php if( ! empty( $this->get_field('Lot_Size') ) ):?><li><span>LOT SIZE:</span> <?php echo $this->get_field('Lot_Size');?></li><?php endif;?>
                        <?php if( ! empty( $this->get_ppsf() ) ):?><li><span>PRICE/ SQ FEET:</span> <?php echo $this->get_ppsf();?></li><?php endif;?>
                       <?php if( ! empty( $this->get_field('Annual_Taxes') ) ):?> <li><span>ANNUAL TAXES:</span> <?php echo $this->display_money( $this->get_field('Annual_Taxes') );?></li><?php endif;?>
                       <?php if ( ! empty( $agent_contact ) ):?>
                        	<li><span>AGENT:</span> <?php echo $agent_contact['name'];?></li>
                            <?php if ( ! empty( $agent_contact['phone'] ) ):?><li><span>PHONE:</span> <?php echo $agent_contact['phone'];?></li><?php endif;?>
                            <?php if ( ! empty( $agent_contact['email'] ) ):?><li><span>EMAIL:</span> <a href="mailto:<?php echo $this->get_email();?>" ><?php echo $this->get_email();?></a></li><?php endif;?>
                        <?php endif;?>
                    </ul>
                    <ul class="property-pins">
                    	<li><?php if ( is_user_logged_in() ):?><?php echo do_shortcode( '[favorite_button post_id="' . $this->get_id() . '"]' );?><?php else:?><a href="#" class="show-modal" data-modalid="wx-login" data-modalwidth="500"> <i class="fa fa-star-o" aria-hidden="true"></i>Save to Favorites</a> <div id="wx-login" class="wx-modal-content"><a href="/search-results/?action=create-account" class="tre-button-light">Create Your Account</a><hr /><?php wp_login_form( array( 'redirect' => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '?save-favorite=true', ) );?></div><?php endif;?></li>
                        <li><a href="#" onclick="window.print();return false;"><i class="fa fa-print" aria-hidden="true"></i>Print Listing</a></li>
                        <li><a href="#" class="show-share-modal"><i class="fa fa-share-square-o" aria-hidden="true"></i>Share Listing</a></li>
                    </ul>
                    <a href="#" class="tre-button-light show-modal tre-modal" data-modalid="modal-4072050">request a showing</a>
            	</div>
        	</div>
        </div>
    </section>
    <section class="tre-property-details">
    	<h2 class="tre-accordion tre-active">Property Details</h2>
        <div class="tre-accordion-content">
        	<ul class="property-list-details">
            	<?php if ( $this->get_address() ):?><li>
                	<span>ADDRESS</span>
                    <?php echo  $this->get_address() . ' ' . ucwords( strtolower( $this->get_city() ) ) . ', ' .  $this->get_state() . ' ' . $this->get_zip();?>
                </li><?php endif;?>
                <li>
                	<?php if ( $this->get_mls() ):?><span>MLS NUMBER</span> <?php echo $this->get_mls();?><?php else:?><span>MLS NUMBER:</span> NOT SPECIFIED<?php endif;?>
                </li>
                <li class="property-description">
                	<?php if ( $this->get_description() ):?><span>DESCRIPTION</span> <?php echo $this->get_description();?><?php else:?><span>DESCRIPTION:</span> NOT SPECIFIED<?php endif;?>
                </li>
                <li>
                	<ul class="property-data">
                    	<?php if ( $this->get_beds() ):?><li><span>Bedrooms:</span> <?php echo $this->get_beds();?></li><?php endif;?>
                        <?php if ( $this->get_type() ):?><li><span>Type of Property:</span> <?php echo $this->get_type();?></li><?php endif;?>
                        <?php if ( $this->get_bath_full() ):?><li><span>Bathrooms (full):</span> <?php echo $this->get_bath_full();?></li><?php endif;?>
                        <?php if ( $this->get_sub_type() ):?><li><span>Style:</span> <?php echo $this->get_sub_type();?></li><?php endif;?>
                        <?php if ( $this->get_bath_half() ):?><li><span>Bathrooms (half):</span> <?php echo $this->get_bath_half();?></li><?php endif;?>
                        <?php if ( $this->get_status() ):?><li><span>Status:</span> <?php echo $this->get_status();?></li><?php endif;?>
                        <?php if ( $this->get_square_footage() ):?><li><span>Living Area:</span> <?php echo $this->get_square_footage();?> SF</li><?php endif;?>
                        <?php if ( $this->get_field('Year_Built') ):?><li><span>Year Built:</span> <?php echo $this->get_field('Year_Built');?></li><?php endif;?>
                        <?php if ( $this->get_sub_type() ):?><li><span>Property Class:</span> <?php echo $this->get_sub_type();?></li><?php endif;?>
                    </ul>
                </li>
        	</ul>
            <?php if ( $this->get_field('Video_URL') ):?>
            	<div class="property-video">
            	<?php if ( strpos( $this->get_field('Video_URL'), 'youtube' ) || strpos( $this->get_field('Video_URL'), 'vimeo' ) ):?>
                	<img src="<?php echo WOVAXTREMAINEURL ?>images/spacer16x9.gif" />
                    <?php echo wp_oembed_get( $this->get_field('Video_URL') );?>
                <?php endif;?>
            	</div>
            <?php endif;?>
        </div>
        <?php $p_features = $this->get_features(); if ( ! empty( $p_features ) ):?>
        <h2 class="tre-accordion tre-active">Amenities</h2>
        <div class="tre-accordion-content">
        	<ul class="property-pins">
            	<?php foreach( $p_features as $feature_label => $img_file ):?>
                <li><img src="<?php echo get_stylesheet_directory_uri();?>/images/icons/<?php echo $img_file;?>.png" /><?php echo $feature_label;?></li>
                <?php endforeach;?>
            </ul>
        </div>
        <?php endif;?>
        <h2 class="tre-accordion tre-active">Features</h2>
        <div class="tre-accordion-content">
        	<ul class="property-list-details features-list">
            	<?php if ( $this->get_field('Cooling_Details') ):?><li>
                	<span>cooling</span>
                   <?php echo $this->display_comma( $this->get_field('Cooling_Details') );?>
                </li><?php endif;?>
                <?php if ( $this->get_field('Parking_Details') ):?><li>
                	<span>Parking</span>
                    <?php echo $this->display_comma( $this->get_field('Parking_Details') );?>
                </li><?php endif;?>
                <?php if ( $this->get_field('Garage_Details') ):?><li>
                	<span>Garage</span>
                    <?php echo $this->display_comma( $this->get_field('Garage_Details') );?>
                </li><?php endif;?>
                <li>
                	<?php if ( $this->get_field('Lot_Description') ):?><span>lot description</span><?php echo ' ' . $this->display_comma( $this->get_field('Lot_Description') );?><?php else:?><span>lot description:</span> NOT SPECIFIED<?php endif;?>
                </li>
        	</ul>
        </div>
        <h2 class="tre-accordion tre-active">Fees</h2>
        <div class="tre-accordion-content property-list-details">
        	<ul class="property-data">
            	<?php if ( $this->get_field('Annual_Taxes') ):?>
                	<li><span>Tax Amount:</span> <?php echo $this->display_money($this->get_field('Annual_Taxes') );?><?php if ( $this->get_field('Tax_Year') ):?>/<?php echo $this->get_field('Tax_Year');?><? endif;?></li>
                <?php else:?>
                	<li><span>Tax Amount:</span> NOT SPECIFIED</li>
                <?php endif;?>
                <?php if ( $this->get_field('Tax_Exemptions') ):?><li><span>Tax Info:</span> <?php echo $this->display_comma( $this->get_field('Tax_Exemptions') );?></li><?php endif;?>
            </ul>
        </div>
        <div class="property-action">
        	<a href="#" class="tre-button-light show-modal tre-modal" data-modalid="modal-4072008">Ask a Question</a><a href="#" class="tre-button-light show-modal tre-modal" data-modalid="modal-4072050">request a showing</a>
        </div>
    </section>
    <section class="property-map" style="padding-top: 40px;">
    	<?php if ( $this->get_field('geo_enabled') && $this->get_field('geo_public') ):?>
        <div id="map" style="height: 600px; width: 100%; visibility: visible; position: relative;"></div>
        <script>
			function initMap() {
			  var uluru = {lat: <?php echo $this->get_field('geo_latitude');?>, lng: <?php echo $this->get_field('geo_longitude');?>};
			  var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 14,
				center: uluru,
				scrollwheel:  false
			  });
			  var marker = new google.maps.Marker({
				position: uluru,
				map: map
			  });
			}
			initMap();
		  </script>
		  
        <?php endif;?>
    </section>
    <section id="property-legal">
    	<?php echo wpautop( get_option('wovax_rets_legal_notice') );?>
    </section>
</div>
<?php echo do_shortcode( '[tremaine_modal id="4072008"][tremaine_modal id="4072050"]' );?>