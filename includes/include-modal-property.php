<article class="wovax-modal tre-listing-modal">
	<div class="tre-row tre-layout-half  tre-listing-feature">
    	<div class="tre-column tre-column-one">
        <?php echo $this->get_slide_window();?>
            <div class="property-slideshow-nav-mobile tre-slideshow-nav-mobile">
                <?php echo $this->get_slide_nav();?>
            </div>
        </div>
        
        <div class="tre-column tre-column-two">
        	<ul class="tre-data-view">
            	<li class="tre-featured-data">
                    <h2>
                        <?php echo $this->get_title();?><br />
                        <?php echo $this->get_city();?>, <?php echo $this->get_state();?> <?php echo $this->get_zip();?>
                    </h2>
                    <strong>
                        <?php if( $this->get_status() ):?><?php echo $this->get_status();?> &nbsp;|&nbsp; <?php endif;?>MLS Number: <?php if( $this->get_mls() ):?><?php echo $this->get_mls();?><?php else:?>NOT SPECIFIED<?php endif;?> 
                    </strong>
                </li>
                <li><?php echo $this->get_bed_text( true ); echo $this->get_bath_text();?></li>
                <li>
                	<ul class="tre-data-set tre-data-layout-half">
                    	<?php if( $this->get_field('Year_Built') ):?><li><label>Year Built:</label> <?php echo $this->get_field('Year_Built');?></li><?php endif;?>
                        <?php if( $this->get_ppsf() ):?><li><label>Price/ SQ Feet:</label> <?php echo $this->get_ppsf();?></li><?php endif;?>
                        <?php if( $this->get_field('Lot_Size') ):?><li><label>LOT SIZE:</label> <?php echo $this->get_field('Lot_Size');?></li><?php endif;?>
                        <?php if( $this->get_field('Annual_Taxes') ):?><li><label>Annual Taxes:</label> <?php echo $this->display_money( $this->get_field('Annual_Taxes') );?></li><?php endif;?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="tre-row tre-layout-single tre-padd-standard tre-slideshow-part-nav">
    	<div class="property-slideshow-nav-full tre-column tre-column-one">
        	<?php echo $this->get_slide_nav();?>
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
        	<a href="<?php echo $this->get_link();?>" class="tre-button-light tre-button-almost-full tre-icon-after">View More Information</a>
        </div>
    </div>
</article> 