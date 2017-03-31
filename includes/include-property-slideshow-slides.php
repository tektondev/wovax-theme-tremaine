<div class="property-slideshow-slides slideshow-<?php echo $this->get_id();?>" data-showid="slideshow-<?php echo $this->get_id();?>">
	<ul>
    	<?php $i = 0; foreach( $images as $image ):?>
        <li class="property-slide <?php if ( $i == 0 ) echo ' is-active';?>">
        	
        	<?php if ( ! $lazy_load || $i == 0  ):?>  
        	<img src="<?php echo $image['full']?>" />
            <?php else:?>
            <img class="not-loaded" data-imageurl="<?php echo $image['full'];?>" src="" />
            <?php endif?>
        </li>
        <?php $i++;endforeach;?>
    </ul>
</div>