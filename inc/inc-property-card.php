<li class="property-listing-card <?php if ( isset( $class ) ) echo $class;?>">
<a href="#" class="tre-modal show-modal"  data-modalid="tre-property-<?php echo $property->get_id();?>" ><img class="tre-image" style="background-image:url(<?php echo $property->get_featured_image();?>)" src="<?php echo get_stylesheet_directory_uri();?>/images/property-spacer.gif" /></a>
<ul class="tre-gallery-card-info property-info">
    <li class="tre-gallery-card-titles tre-gallery-card-titles-small tre-gallery-side-left property-listing-header">
        <div class="tre-col-two tre-listings-cost">
        	<span class="tre-emphasis"><?php echo money_format( '%.2n' , (int) $property->get_price() );?></span>
        </div>
        <h5 class="tre-col-one"><?php echo $property->get_title();?><br/>
		<?php echo $property->get_city();?>, <?php echo $property->get_state();?> <?php echo $property->get_zip();?></h5>
    </li>
    <li class="tre-gallery-card-details">
        <ul class="tre-gallery-side-left">
            <li class="tre-col-two"><a href="<?php echo $property->get_link();?>" class="property-quick-view tre-light-link tre-icon-after tre-modal show-modal" data-modalid="tre-property-<?php echo $property->get_id();?>">Quick View <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
            <li class="tre-col-one"><?php echo $property->get_bed_text( true ); echo $property->get_bath_text();?>&nbsp;</li>
        </ul> 
    </li>
</ul>
<?php $tremaine_modals['modal-' . $property->get_id() ] = '<div id="tre-property-' . $property->get_id() . '" class="tre-modal-content">' . $property->get_modal() . '</div>';?>
<a href="<?php echo $property->get_link();?>" class="tre-full-link tre-modal show-modal" data-modalid="tre-property-<?php echo $property->get_id();?>"></a>
</li>