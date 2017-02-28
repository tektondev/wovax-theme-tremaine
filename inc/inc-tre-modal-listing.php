<article class="wovax-modal tre-listing-modal">
	<div class="tre-row tre-layout-half  tre-listing-feature">
    	<div class="tre-column tre-column-one">
        <?php echo $property->get_slide_window();?>
        	<!--<div class="tre-slideshow-window-wrapper">
            	<ul>
                	<li class="tre-active">
                    	<img class="tre-image" src="<?php echo get_stylesheet_directory_uri();?>/resources/listing-temp.jpg" />
                    </li>
                    <li>
                    	<img class="tre-image" src="<?php echo get_stylesheet_directory_uri();?>/resources/listing-temp.jpg" />
                    </li>
                    <li>
                    	<img class="tre-image" src="<?php echo get_stylesheet_directory_uri();?>/resources/listing-temp.jpg" />
                    </li>
                    <li>
                    	<img class="tre-image" src="<?php echo get_stylesheet_directory_uri();?>/resources/listing-temp.jpg" />
                    </li>
                    <li>
                    	<img class="tre-image" src="<?php echo get_stylesheet_directory_uri();?>/resources/listing-temp.jpg" />
                    </li>
                </ul>
            </div>-->
            <div class="property-slideshow-nav-mobile tre-slideshow-nav-mobile">
                <?php echo $property->get_slide_nav();?>
            </div>
        </div>
        
        <div class="tre-column tre-column-two">
        	<ul class="tre-data-view">
            	<li class="tre-featured-data">
                    <h2>
                        <?php echo $property->get_title();?><br />
                        <?php echo $property->get_city();?>, <?php echo $property->get_state();?> <?php echo $property->get_zip();?>
                    </h2>
                    <strong>
                        <?php echo $property->get_status();?> &nbsp;|&nbsp; MLS Number: <?php echo $property->get_mls();?> 
                    </strong>
                </li>
                <li><?php echo $property->get_beds();?> beds | <?php echo $property->get_bath_text();?></li>
                <li>
                	<ul class="tre-data-set tre-data-layout-half">
                    	<li><label>Year Built:</label> [2016]</li>
                        <li><label>Price/ SQ Feet:</label> [$600]</li>
                        <li><label>Lot SQ Feet:</label> [4,000]</li>
                        <li><label>Annual Taxes:</label> [$157,000]</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="tre-row tre-layout-single tre-padd-standard tre-slideshow-part-nav">
    	<div class="property-slideshow-nav-full tre-column tre-column-one">
        	<?php echo $property->get_slide_nav();?>
        	<!--<div class="tre-slideshow-nav">
            	<button class="tre-slideshow-control-prev"><i class="fa fa-caret-left" aria-hidden="true"></i></button>
                <div class="tre-slideshow-thumbnails">
            	<ul>
                	<li class="tre-active tre-visible">
                    	<div style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/resources/listing-temp.jpg);">
                        </div>
                    </li>
                    <li class="tre-visible">
                    	<div style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/resources/listing-temp.jpg);">
                        </div>
                    </li>
                    <li class="tre-visible">
                    	<div style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/resources/listing-temp.jpg);">
                        </div>
                    </li>
                    <li class="tre-visible">
                    	<div style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/resources/listing-temp.jpg);">
                        </div>
                    </li>
                    <li>
                    	<div style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/resources/listing-temp.jpg);">
                        </div>
                    </li>
                </ul>
                </div>
                <button name="next"><i class="fa fa-caret-right" aria-hidden="true"></i></button>
            </div>-->
        </div>
    </div>
     <div class="tre-row tre-layout-single tre-modal-footer">
    	<div class="tre-column tre-column-one">
        	<a href="<?php echo $property->get_link();?>" class="tre-button-light tre-button-almost-full tre-icon-after">View More Information</a>
        </div>
    </div>
</article> 