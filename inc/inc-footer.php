
<?php if ( is_active_sidebar( 'tremaine_footer') ):?>
<div class="wrap">
	<?php dynamic_sidebar( 'tremaine_footer' ); ?>
</div>
<?php endif;?>

<?php if ( is_active_sidebar( 'tremaine_footer_after') ):?>
<section class="footer-after"><div class="wrap"><?php dynamic_sidebar( 'tremaine_footer_after' ); ?></div></section>
<?php endif;?>