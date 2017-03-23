<div class="property-slideshow-nav slideshow-<?php echo $this->get_id();?>" data-showid="slideshow-<?php echo $this->get_id();?>">
	<nav>
    	<a href="#" class="prev"><span><i class="fa fa-caret-left" aria-hidden="true"></i></span></a>
        <div>
        	<?php foreach( $image_sets as $index => $image_set ):?>
            <ul class="property-nav-slide <?php if( $index == 0 ) echo 'is-active';?>">
                <?php $i = 0; foreach( $image_set as $image ):?>
                <li class="property-thumbnail <?php if ( $i == 0 && $index == 0 ) echo ' is-active';?>" style="background-image:url(<?php echo $image['full'];?>)"><img src="<?php echo $image['thumbnail'];?>" style="display:none;width: 100%;"/></li>
                <?php $i++; endforeach;?>
            </ul>
            <?php endforeach;?>
        </div>
        <a href="#" class="next"><span><i class="fa fa-caret-right" aria-hidden="true"></i></span></a>
    </nav>
</div>