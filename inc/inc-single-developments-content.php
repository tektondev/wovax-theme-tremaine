<section class="tre-developments-content">
	<header class="wrap"><h2 class="tre-regular">Our Exclusive Developments</h2></header>
    <div class="trerow trelayout-single">    	
    	<div class="trerow-inner wrap">
            <div class="trecolumn trecolumn-one">
            	<div class="trebg"></div>
                <div class="trecolumn-inner">
                    <div class="tre-tabs">
                        <nav>
                        	<a href="#" class="tre-active">All Areas</a><?php foreach( $areas as $area ):?><a href="#"><?php echo $area->name;?></a><?php endforeach;?></nav>
                        <ul class="tre-tabs-wrapper">
                        	<li class="tre-active">
                            	<?php echo $this->get_developments_gallery();?>
                            </li>
                            <?php foreach( $areas as $area ):?>
                            <li>
                            	<?php echo $this->get_developments_gallery( $area->term_id );?>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
            	</div>
            </div>
        </div>
    </div>
</section>