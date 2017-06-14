<div class="tremaine-people-card">
	<div class="image-wrapper bg-image-wrapper" style="<?php if ( $person['img'] ) :?> background-image:url(<?php echo $person['img'];?>);<?php endif;?>">
    </div>
    <div class="caption-wrapper">
        <h3><?php echo $person['display_name' ];?></h3>
        <h4><?php echo $person['position'];?></h4>
        <ul class="details">
            <li class="summary">
            	<?php echo $person['excerpt'];?>
            </li>
        </ul>
    </div>
    <?php if ( ! empty( $atts['link'] ) ) :?><a class="wrap-link" href="<?php echo $person['link'] ?>"></a><?php endif;?>
</div>