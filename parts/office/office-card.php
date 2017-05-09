<div class="tremaine-office-card">
	<div class="image-wrapper bg-image-wrapper" style="background-image:url(<?php echo $settings['featured_image'];?>);">
    <a href="<?php echo $atts['agents_url'] . '?company-filter=' . $settings['_office_id'];?>" ></a>
    </div>
    <div class="caption-wrapper">
        <h3><a href="<?php echo $atts['agents_url'] . '?company-filter=' . $settings['_office_id'];?>"><?php echo $settings['_title'];?></a></h3>
        <ul class="details">
            <li class="address">
            	<?php if ( $settings['_map_link'] ) { echo '<a href="' . $settings['_map_link'] . '">';} ?>
                <?php echo $settings['_address1'];?><br/>
                <?php if ( $settings['_address2'] ):?><?php echo $settings['_address2'];?><br/><?php endif;?>
                <?php echo $settings['_city'];?>, <?php echo $settings['_state'];?> <?php echo $settings['_zip'];?>
                <?php if ( $settings['_map_link'] ) { echo '</a>';} ?>
            </li>
            <?php if ( $settings['_email'] ):?><li class="email"><a href="mailto:<?php echo $settings['_email'];?>"><?php echo $settings['_email'];?></a></li><?php endif;?>
           <?php if ( $settings['_phone'] ):?><li class="phone"><a href="tel:<?php echo $settings['_phone'];?>"><?php echo $settings['_phone'];?></a></li><?php endif;?>
           <?php if ( $settings['_website'] ):?><li class="website"><a href="<?php echo $settings['_website'];?>" target="_blank"><?php echo $settings['_website'];?></a></li><?php endif;?>
           <?php switch( $atts['link_type'] ){
			   
			   	case 'detail':
					echo '<li class="learn-more"><a href="' . $settings['link'] . '">Learn More <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>';
			   		break;
				case 'agents':
					echo '<li class="learn-more"><a href="' . $atts['agents_url'] . '?company-filter=' . $settings['_office_id'] . '">Browse Agents <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>';
					break;
		   } ;?>
        </ul>
    </div>
</div>