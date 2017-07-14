<div id="site-responsive-menu">
	<div class="menu-icon"><i class="fa fa-bars" aria-hidden="true"></i></div>
    <div class="menu-wrapper">
	<?php if ( is_active_sidebar( 'mobile_menu' ) ) : ?>
    <?php dynamic_sidebar( 'mobile_menu' ); ?>
    <?php endif; ?>
    </div>
</div>
<script>
jQuery('body').on(
	'click',
	'#site-responsive-menu .menu-icon',
	function( event ){
		jQuery( this ).siblings( '.menu-wrapper').slideToggle('fast');
	}
);
jQuery('body').on(
	'click',
	'#site-responsive-menu .menu-item-has-children > a',
	function( event ){
		event.preventDefault();
		jQuery( this ).siblings( 'ul').slideToggle('fast');
	}
);
</script>