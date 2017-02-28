<?php

global $post;

$code = get_post_meta( $post->ID, '_frame_code', true );

echo htmlspecialchars_decode( $code );
