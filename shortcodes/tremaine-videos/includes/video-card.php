<div class="tremaine-video-card">
	<div class="image-wrapper bg-image-wrapper" style="background-image:url(<?php echo $video['img'];?>);">
    <a href="<?php echo $video['link'];?>"class="show-modal"  data-modaltype="youtube"></a>
    </div>
    <div class="caption-wrapper">
        <h3><a href="<?php echo $video['link'];?>" class="show-modal" data-modaltype="youtube"><?php echo $video['title'];?></a></h3>
        <ul class="details">
            <li class="summary">
            	<?php echo $video['content'];?>
            </li>
           <li class="learn-more"><a href="<?php echo $video['link'];?>" class="show-modal" data-modaltype="youtube">Watch Now <i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
        </ul>
    </div>
    <a href="<?php echo $video['link'];?>" class="show-modal video-cover-link" data-modaltype="youtube"></a>
</div>