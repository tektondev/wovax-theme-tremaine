<div class="tre-property-single">
	<header>
    	<h1><?php echo $property->get_title_rendered(); ?></h1>
		<div class="tre-property-price">
        <?php echo $property->get_price_rendered(); ?>
        </div>
    </header>
	<section class="tre-property-card">
    	<div class="wrap">
    		<div class="trerow">
        		<div class="trecolumn trecolumn-one">
                	<!--<div class="tre-slideshow">
                	<div class="tre-slideshow-window-wrapper">
                        <ul>
                            <li class="tre-active">
                                <img class="tre-image" src="<?php echo get_stylesheet_directory_uri();?>/resources/listing-1.jpg" />
                            </li>
                            <li>
                                <img class="tre-image" src="<?php echo get_stylesheet_directory_uri();?>/resources/listing-1.jpg" />
                            </li>
                            <li>
                                <img class="tre-image" src="<?php echo get_stylesheet_directory_uri();?>/resources/listing-1.jpg" />
                            </li>
                            <li>
                                <img class="tre-image" src="<?php echo get_stylesheet_directory_uri();?>/resources/listing-1.jpg" />
                            </li>
                            <li>
                                <img class="tre-image" src="<?php echo get_stylesheet_directory_uri();?>/resources/listing-1.jpg" />
                            </li>
                        </ul>
                    </div>
                    <div class="tre-slideshow-nav">
            	<button class="tre-slideshow-control-prev"><i class="fa fa-caret-left" aria-hidden="true"></i></button>
            	<ul>
                	<li class="tre-active tre-visible">
                    	<div style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/resources/listing-1.jpg);">
                        </div>
                    </li>
                    <li class="tre-visible">
                    	<div style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/resources/listing-1.jpg);">
                        </div>
                    </li>
                    <li class="tre-visible">
                    	<div style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/resources/listing-1.jpg);">
                        </div>
                    </li>
                    <li class="tre-visible">
                    	<div style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/resources/listing-1.jpg);">
                        </div>
                    </li>
                    <li>
                    	<div style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/resources/listing-1.jpg);">
                        </div>
                    </li>
                </ul>
                <button name="next"><i class="fa fa-caret-right" aria-hidden="true"></i></button>
            </div> -->
            <?php echo $slideshow_html;?>
            	</div><div class="trecolumn trecolumn-two">
                	<a href="#" class="tre-button-light">Ask a Question</a>
                    <ul class="property-data">
                    	<li><?php
							if ( $bedrooms ) echo $bedrooms . ' Beds <span>|</span> ';
							if ( ! empty( $bathrooms ) ) {
								echo $bathrooms[0] . ' Full';
								if( ! empty( $bathrooms[1] ) ) echo ' & ' . $bathrooms[1] . ' Half';
								echo ' Baths';
							};
						?></li>
                        <li><span>YEAR BUILT:</span> [2016]</li>
                        <li><span>LOT SQ FEET:</span> [4,000]</li>
                        <?php if( ! empty( $property->get_ppsf() ) ):?><li><span>PRICE/ SQ FEET:</span> <?php echo $property->get_ppsf();?></li><?php endif;?>
                        <li><span>ANNUAL TAXES:</span> [$157,000]</li>
                    </ul>
                    <ul class="property-pins">
                    	<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i>Save to Favorites</a></li>
                        <li><a href="#" onclick="window.print();return false;"><i class="fa fa-print" aria-hidden="true"></i>Print Listing</a></li>
                        <li><a href="#"><i class="fa fa-share-square-o" aria-hidden="true"></i>Share Listing</a></li>
                    </ul>
                    <a href="#" class="tre-button-light">request a showing</a>
            	</div>
        	</div>
        </div>
    </section>
    <section class="tre-property-details">
    	<h2 class="tre-accordion tre-active">Property Details</h2>
        <div class="tre-accordion-content">
        	<ul class="property-list-details">
            	<?php if ( $address ):?><li>
                	<span>ADDRESS</span>
                    <?php echo  $address . ' ' . ucwords( strtolower( $city ) ) . ', ' .  $state . ' ' . $zip;?>
                </li><?php endif;?>
                <li>
                	<span>MLS NUMBER</span>
                    <?php echo $mls;?>
                </li>
                <li class="property-description">
                	<span>DESCRIPTION</span>
                    <?php echo $post->post_content;?>
                </li>
                <li>
                	<ul class="property-data">
                    	<?php /*if ( $bedrooms ):?><li><span>Bedrooms:</span> <?php echo $bedrooms;?></li><?php endif;?>
                        <?php if ( $type ):?><li><span>Type of Property:</span> <?php echo $type;?></li><?php endif;?>
                        <?php if ( $full_baths ):?><li><span>Bathrooms (full):</span> <?php echo $full_baths;?></li><?php endif;?>
                        <?php if ( $style ):?><li><span>Style:</span> <?php echo $style;?></li><?php endif;?>
                        <?php if ( $half_baths ):?><li><span>Bathrooms (half):</span> <?php echo $half_baths;?></li><?php endif;?>
                        <?php if ( $status ):?><li><span>Status:</span> <?php echo $status;?></li><?php endif;?>
                        <?php if ( $property->get_square_footage() ):?><li><span>Living Area:</span> <?php echo $property->get_square_footage();?> SF</li><?php endif;?>
                        <?php if ( $type ):?><li><span>Year Built:</span> [2016]</li><?php endif;?>
                        <?php if ( $property->get_sub_type() ):?><li><span>Property Class:</span> <?php echo $property->get_sub_type();?></li><?php endif;*/?>
                    </ul>
                </li>
        	</ul>
        </div>
        <h2 class="tre-accordion tre-active">Amenities</h2>
        <div class="tre-accordion-content">
        	<ul class="property-pins">
                <li><img src="<?php echo get_stylesheet_directory_uri();?>/images/washer-icon.jpg" />Air Conditioning</li>
                <li><img src="<?php echo get_stylesheet_directory_uri();?>/images/washer-icon.jpg" />Dryer</li>
                <li><img src="<?php echo get_stylesheet_directory_uri();?>/images/washer-icon.jpg" />Gym</li>
                <li><img src="<?php echo get_stylesheet_directory_uri();?>/images/washer-icon.jpg" />Storage</li>
                <li><img src="<?php echo get_stylesheet_directory_uri();?>/images/washer-icon.jpg" />Balcony</li>
                <li><img src="<?php echo get_stylesheet_directory_uri();?>/images/washer-icon.jpg" />Fireplace</li>
                <li><img src="<?php echo get_stylesheet_directory_uri();?>/images/washer-icon.jpg" />Heating</li>
                <li><img src="<?php echo get_stylesheet_directory_uri();?>/images/washer-icon.jpg" />Washer</li>
                <li><img src="<?php echo get_stylesheet_directory_uri();?>/images/washer-icon.jpg" />Built-in Kitchen</li>
                <li><img src="<?php echo get_stylesheet_directory_uri();?>/images/washer-icon.jpg" />Fully Furnished</li>
                <li><img src="<?php echo get_stylesheet_directory_uri();?>/images/washer-icon.jpg" />Pool</li>
                <li><img src="<?php echo get_stylesheet_directory_uri();?>/images/washer-icon.jpg" />Yard</li>
            </ul>
        </div>
        <h2 class="tre-accordion tre-active">Features</h2>
        <div class="tre-accordion-content">
        	<ul class="property-list-details features-list">
            	<li>
                	<span>cooling</span>
                    Ceiling Fan, Central Air Conditioning
                </li>
                <li>
                	<span>Parking</span>
                    Attached Garage, Garage, Garage - Detached, 5 + Car Garage
                </li>
                <li>
                	<span>lot description</span>
                    Bike Paths, Exercise Area, Lake, Pool(s), Scenic View, Water View, Waterfront, Jogging / Biking Path, Access Type Road, Snowmobiling, County Street, City / Town Street
                </li>
                <li>
                	<span>lot description</span>
                    Bike Paths, Exercise Area, Lake, Pool(s), Scenic View, Water View, Waterfront, Jogging / Biking Path, Access Type Road, Snowmobiling, County Street, City / Town Street
                </li>
        	</ul>
        </div>
        <h2 class="tre-accordion tre-active">Fees</h2>
        <div class="tre-accordion-content property-list-details">
        	<ul class="property-data">
                <li><span>Tax Amount:</span> [$93,384/2015]</li>
                <li><span>Tax Info:</span> [Tax Reflects City & County Tax]</li>
            </ul>
        </div>
        <div class="property-action">
        	<a href="#" class="tre-button-light">Ask a Question</a><a href="#" class="tre-button-light">request a showing</a>
        </div>
    </section>
    <section class="property-map" style="padding-top: 40px;">
    	<!--<img src="<?php echo get_stylesheet_directory_uri();?>/resources/gmap.jpg" /> -->
        <?php display_location('');?>
    </section>
</div>