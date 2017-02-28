<div class="property-slideshow-slides slideshow-<?php echo $this->get_id();?>" data-showid="slideshow-<?php echo $this->get_id();?>">
	<ul>
    	<?php $i = 0; foreach( $images as $image ):?>
        <li class="property-slide <?php if ( $i == 0 ) echo ' is-active';?>">
        	<img src="<?php echo $image['full'];?>" />
        </li>
        <?php $i++;endforeach;?>
    </ul>
</div>