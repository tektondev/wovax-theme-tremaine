<?php

global $post;

$code = get_post_meta( $post->ID, '_frame_code', true );

$code = htmlspecialchars_decode( $code );

$code = str_replace( '</head>', '<base target="_top" /></head>', $code );

echo $code;
