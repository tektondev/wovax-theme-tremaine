<section id="tremaine-office" style="background-image:url()">
	<div class="wrap">
    	<div class="tremaine-row layout-third-left">
        	<div class="tremaine-column image-column tremaine-column-one">
            	<div class="tremaine-image-bg" style="background-image:url(http://allchicagocondos.com/wp-content/uploads/2017/03/barrington-1.png)">
                </div>
            </div>
            <div class="tremaine-column tremaine-column-two">
            	<h1><?php echo $settings['_title'];?></h1>
                <ul class="details">
                	<li class="address">
						<?php echo $settings['_address1'];?><br/>
                        <?php if ( $settings['_address2'] ):?><?php echo $settings['_address2'];?><br/><?php endif;?>
                        <?php echo $settings['_city'];?>, <?php echo $settings['_state'];?> <?php echo $settings['_zip'];?>
                    </li>
                   <?php if ( $settings['_phone'] ):?><li class="phone"><?php echo $settings['_phone'];?></li><?php endif;?>
                   <?php if ( $settings['_website'] ):?><li class="website"><?php echo $settings['_website'];?></li><?php endif;?>
                </ul>
            </div>
        </div>
    </div>
</section>