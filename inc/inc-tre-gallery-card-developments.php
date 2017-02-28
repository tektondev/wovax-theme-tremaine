<a href="#"><img class="tre-image" src="<?php echo get_stylesheet_directory_uri();?>/resources/development-2.jpg" /></a>
<ul class="tre-gallery-card-info">
    <li class="tre-gallery-card-titles tre-gallery-card-titles-small">
        <h5>To Be Determined</h5>
        <h6>Chicago</h6>
    </li>
    <li class="tre-gallery-card-details">
        <ul class="tre-gallery-side-left">
            <li class="tre-col-two"><a href="#" class="tre-light-link tre-icon-after tre-modal" data-modalid="tre-property-<?php echo $i;?>">Quick View <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
            <li class="tre-col-one">5 Beds  |  4 Full & 1 Half Baths</li>
        </ul> 
    </li>
</ul>
<div id="tre-property-<?php echo $i;?>" class="tre-modal-content">
	<?php include locate_template( 'inc/inc-tre-modal-listing.php' ); ?> 
</div>