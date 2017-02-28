<?php 

$vid_id = uniqid ( 'video_' );?>
<section id="profile-video" class="tre-profile-video">
	<div class="wrap">
    	<div class="wovax-video-wrapper" id="<?php echo $vid_id;?>">
        	<div class="wovax-video-window">
            	<div class="wovax-video-window-content">
                	<a href="#" title="play video"><span class="wovax-play-button"></span></a>
                </div>
            	<img src="<?php echo get_stylesheet_directory_uri();?>/images/spacer16x9.gif" />
            </div>
            <script>
				var <?php echo $vid_id;?> = '<?php echo $embed;?>';
			</script>
        </div>
    </div>
</section>