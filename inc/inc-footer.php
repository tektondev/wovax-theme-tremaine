
<?php if ( is_active_sidebar( 'tremaine_footer') ):?>
<div class="wrap">
	<?php ob_start(); dynamic_sidebar( 'tremaine_footer' ); $html_nav = ob_get_clean(); echo apply_filters( 'do_modal_windows', $html_nav ); ?>
</div>
<?php endif;?>

<?php if ( is_active_sidebar( 'tremaine_footer_after') ):?>
<section class="footer-after"><div class="wrap"><?php ob_start(); dynamic_sidebar( 'tremaine_footer_after' ); $html_nav2 = ob_get_clean(); echo apply_filters( 'do_modal_windows', $html_nav2 ); ?></div></section>
<?php endif;?>