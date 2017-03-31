// JavaScript Document

var tremaine = {
	
	init:function(){

		tremaine.modal.init();
		tremaine.tabs.init();
		tremaine.layout.init();
		tremaine.demo.init();
		tremaine.slideshow.init();
		tremaine.accordion.init();
		tremaine.share_modal.init();
		tremaine.form.init();
		tremaine.favorite.init();
		tremaine.menu.init();
		jQuery( document ).ready(function(e) { tremaine.lazy_load.preload(); });	
	},
	
	menu:{
		
		init:function(){
			
			tremaine.menu.events();
			jQuery( window ).trigger('resize');
			
		},
		events:function(){
			
			jQuery('.genesis-nav-menu .menu-item').on( 'click', 'a', function(e){ tremaine.menu.toggle_menu( e, jQuery( this ) );});
			
			jQuery(window).resize( function(){
				
				if ( jQuery( document ).width() < 1023 ){
					
					jQuery('.genesis-nav-menu').addClass('mobile-menu');
					
				} else {
					
					jQuery('.genesis-nav-menu').removeClass('mobile-menu');
					
				}
				
			});
			
		},
		
		toggle_menu:function( e, ic ){
			
			if ( jQuery( document ).width() < 1023 &&  ic.siblings('ul').length != 0 ){
				
				e.preventDefault();
				e.stopPropagation()
				
				ic.siblings('ul').slideToggle();
				
			} // end if
			
		},
		
	},
	
	demo:{
		
		init:function(){
			jQuery('body').hover(
				function(){ jQuery('.comp-overlay-wrap').fadeOut('fast') },
				function(){ jQuery('.comp-overlay-wrap').fadeIn('fast') }
			);
		}
		
	},  
	
	form: {
		
		init:function(){
			
			tremaine.form.events();
			
		},
		
		events:function(){
			
			jQuery('body').on(
				'change',
				'.tremaine-submit-on-change',
				function( e ){
					jQuery( this ).closest('form').trigger( 'submit' );
				}
			);
			
		},
		
	},
	
	layout: {
		
		init:function(){
			
			//tremaine.layout.events();
			
			//tremaine.layout.equal_columns();
			
		},
		
		events:function(){
			
			jQuery( window ).resize( function(){ tremaine.layout.equal_columns() });
			
		},
		
		equal_columns:function(){
			
			jQuery( '.trerow').each(
				function( index, element) {
                	var h = 0;
					var columns = jQuery( this ).children().children('.trecolumn');
					columns.each( 
						function(){
							
							var c_h = jQuery( this ).outerHeight();
							
							if ( c_h > h ) h = c_h;
							
						} 
					);
					
					columns.css('min-height', h + 'px');
					
            	}
			);
			
			
			
		},
		
	},
	
	tabs: {
		
		init:function(){
			
			tremaine.tabs.events();
			
		},
		
		events:function(){
			
			jQuery('body').on(
				'click',
				'.tre-tabs > nav > a',
				function( e ){
					console.log( jQuery( this ) );
					tremaine.tabs.change_tab( jQuery( this ) , e );
				}
			);
			
		},
		
		change_tab:function( item_clicked , e ){
			e.preventDefault();
			
			if ( item_clicked.hasClass('tre-active') ) return;
			
			item_clicked.addClass('tre-active').siblings().removeClass('tre-active');
			
			var content = item_clicked.closest('.tre-tabs').find( '.tre-tabs-wrapper').children().eq( item_clicked.index() );
			
			content.addClass('tre-active');
			
			content.siblings().removeClass('tre-active');
			
		} 
		
	},
	
	modal: {
		
		//bg:false,
		
		//frame:false,
		
		init:function(){
			
			tremaine.modal.events();
			
		},
		
		events:function(){
			
			jQuery('#import-content').load( function(){ 
			
				jQuery('#import-content').contents().on(
					'click',
					'.show-modal',
					function( e ){
						e.preventDefault();
						e.stopPropagation();
						tremaine.modal.show( jQuery( this ) , e );
						return false;
					}
				);
			
			
			} );
			
			jQuery('body').on(
				'click',
				'.show-modal',
				function( e ){
					tremaine.modal.show( jQuery( this ) , e );
				}
			);
			
			
			
			jQuery('body').on(
				'click',
				'.tre-close-modal',
				function( e ){
					e.preventDefault();
					tremaine.modal.hide();
				}
			);
			
		},
		
		hide: function(){
			
			jQuery('.tre-modal-frame').css('top', '-9999rem');
			
			jQuery('.tre-modal-frame.video-frame').removeClass('video-frame').find( '.tre-modal-window-content' ).html('');
			
			//tremaine.modal.frame.fadeOut('fast' , function(){
				//tremaine.modal.frame.find( '.tre-modal-window-content' ).html( '' );
			//});
			
			tremaine.modal.bg.fadeOut('fast');
			
		},
		
		show:function( item_clicked , ev ){
			
			var type = item_clicked.data('modaltype');
			
			if ( typeof type !== typeof undefined && type !== false ){
				
				ev.preventDefault();
				
				var type = item_clicked.data('modaltype');
				
				switch ( type ){
					
					case 'youtube':
						tremaine.modal.show_youtube( item_clicked, ev );
						break;
					
				} // end switch
				
				tremaine.modal.show_bg();
				
			} else {
			
				var modal_id = item_clicked.data('modalid');
				
				var modal_content_wrap = tremaine.modal.get_modal_content_wrapper( modal_id );
				
				if ( modal_content_wrap ){
					
					//var modal_content = modal_content_wrap.html();
				
					var modal_width = item_clicked.data('modalwidth');
					
					ev.preventDefault();
					
					tremaine.modal.show_bg();
					
					tremaine.modal.show_frame( modal_content_wrap, modal_width );
					
				} // end if
			
			} // end if
			
		},
		
		show_youtube:function( item_clicked, ev ){
			
			if ( ! tremaine.modal.frame ){
				
				tremaine.modal.add_frame();
				
			} // end if
			
			var src = item_clicked.attr('href');
			
			var vid_id = tremaine.modal.get_vid_id( src );
			
			var html = '<iframe src="https://www.youtube.com/embed/' + vid_id + '?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>';
			

			var modal = tremaine.modal.frame.find( '.tre-modal-window-content' );
			
			tremaine.modal.frame.addClass('video-frame');			
			
			modal.html( html );
			
			tremaine.modal.show_frame( modal, 850 );
			
		}, // end show_youtube
		
		get_vid_id:function( href ){
			
			var vid_id = false;
			
			var base = href.split('v=');
			
			if ( base.length > 1 ){
				
				base_id = base[1].split('?');
				
				vid_id = base_id[0];
				
			} // end if
			
			return vid_id;
			
		}, // end get_vid_id
		
		get_modal_content:function( modal_id ){
			
			if ( ! modal_id ) return false;
			
			var modal = jQuery( '#' + modal_id );
			
			if ( ! modal.length ) return false;
			
			return modal.html();
			
		},
		
		get_modal_content_wrapper:function( modal_id ){
			
			if ( ! modal_id ) return false;
			
			var modal = jQuery( '#' + modal_id );
			
			if ( ! modal.length ) return false;
			
			return modal;
			
		},
		
		show_bg:function(){
			
			if ( ! tremaine.modal.bg ){
				
				tremaine.modal.add_bg();
				
			} // end if
			
			tremaine.modal.bg.fadeIn('fast');
			
		},
		
		add_bg:function(){
			
			jQuery( 'body' ).append( '<div id="tre-modal-bg" class="tre-close-modal"></div>' );
			
			tremaine.modal.bg = jQuery( '#tre-modal-bg');
			
		},
		
		show_frame:function( modal_content_wrap, width ){
			
			//if ( ! tremaine.modal.frame ){
				
				//tremaine.modal.add_frame();
				
			//} // end if
			
			//tremaine.modal.frame.find( '.tre-modal-window-content' ).html( content );
			
			console.log( modal_content_wrap );
			
			var frame = modal_content_wrap.closest('.tre-modal-window');
			
			console.log( frame );
			
			tremaine.lazy_load.load( frame );
			
			tremaine.modal.set_height( frame.parent() );
			
			if ( width ){
				
				frame.css('max-width', width + 'px' );
				
			} else {
				
				frame.css('max-width', '850px' );
				
			}// end if
			
			//frame.parent().fadeIn('fast');
			
		},
		
		add_frame:function(){
			
			var frame = '<div class="tre-modal-frame dynamic-modal" style="top: -9999rem;"><div class="tre-modal-window"><a href="#" class="tre-close-modal"><i class="fa fa-times" aria-hidden="true"></i></a><div class="tre-modal-window-content"></div></div></div>';
			
			jQuery( 'body' ).append( frame );
			
			tremaine.modal.frame = jQuery( '.tre-modal-frame.dynamic-modal');
			
		},
		
		set_height:function( frame ){
			
			frame.css( 'top' , ( jQuery(window).scrollTop() + 100 ) );
			
		}
		
	}, // end modal
	
	lazy_load:{
		
		preload:function(){
			
			tremaine.lazy_load.load( jQuery( 'body' ) );
			
		}, 
		
		load:function( wrap ){
			
			wrap.find('.not-loaded').each( function(){
				
				var t = jQuery( this );
				
				var img_url = t.data('imageurl');
				
				if ( t.is( 'img' ) ){
					
					t.attr( 'src', img_url );
					
				} else {
					
					t.css('background-image', 'url(' + img_url + ')' );
					
				} // end if
				
			});
		},
		
	}, // end lazy_load
	
	share_modal:{
		
		init: function() { 
			
			tremaine.share_modal.events();
			
		}, // end init
		
		events:function(){
			
			jQuery('body').on( 
				'click',
				'.show-share-modal',
				function( e ){
					
					e.preventDefault();
					tremaine.share_modal.show_modal( jQuery( this ) );
				} 
			);
			
			jQuery('body').on( 
				'click',
				'.close-share-modal',
				function( e ){
					
					e.preventDefault();
					tremaine.share_modal.close_modal();
				} 
			);
			
			jQuery( window ).on(
				'resize',
				function( e ){
					tremaine.share_modal.position();
				}
			);
			
		}, // end events
		
		show_modal:function( ic ){
			
			var m = jQuery('#tremaine-share-modal');
			
			var b = jQuery('#tremaine-share-modal-bg');
			
			b.show();
			
			m.fadeIn('fast');
			
			ic.addClass('active-social-modal');
			
			tremaine.share_modal.position();

		},
		
		close_modal:function( ic ){
			
			var m = jQuery('#tremaine-share-modal');
			
			var b = jQuery('#tremaine-share-modal-bg');
			
			b.hide();
			
			m.fadeOut('fast');
			
			jQuery('.active-social-modal').removeClass('.active-social-modal');
			
			tremaine.share_modal.position();

		},
		
		position:function(){
			
			ic = jQuery('.active-social-modal').first();
			
			if ( ic.length > 0 ){
			
				var modal = jQuery('#tremaine-share-modal');
				
				var w_width = jQuery( window ).width();
				
				var e_off = ic.offset();
				
				var m_l  = modal.width();	
				
				var m_top = e_off.top - modal.outerHeight() - 30;
				
				console.log( m_top + ' ' + e_off.top + ' ' + modal.outerHeight() );
				
				if ( ( e_off.left + m_l + 10 ) < w_width ){
					
					modal.css( {left: e_off.left + 'px',top: m_top + 'px'} );
					
				} else {
				
				} // end if
				
				modal.css( 'top', modal.offset().top + 'px' );
			
			} // end if
			
		}
		
	}, // end share_modal
	
	favorite:{
		
		init:function(){
			
			jQuery(window).load( function(){ tremaine.favorite.check_favorite(); });
			
		},
		
		check_favorite:function(){
			
			var url = window.location.href;
			
			if ( url.indexOf('save-favorite') !== -1){
				
				setTimeout( function(){ jQuery('.simplefavorite-button').not('.active').trigger( 'click' ); }, 2000 );
				
			} else if ( url.indexOf('create-account') !== -1 ){
				
				jQuery('.wovax-header-modal .section-header-wovax').eq(1).trigger( 'click' );
				
				jQuery('.wovax-search-tab li').eq(2).find('a').trigger( 'click' );
				
			}// end if
			
		},
		
	}, // end favorite 
	
	slideshow:{
		
		init:function(){
			
			tremaine.slideshow.events();
			
		},
		
		events:function(){
			
			jQuery( 'body' ).on( 
				'click', 
				'.property-slideshow-nav nav > a', 
				function( e ){
					e.preventDefault();
					tremaine.slideshow.change_slide_nav( jQuery( this ) );
				}
			);
			
			
			jQuery( 'body' ).on( 
				'click', 
				'.property-slideshow-nav .property-thumbnail', 
				function( e ){
					e.preventDefault();
					tremaine.slideshow.show_slide( jQuery( this ) );
				}
			);
			
		},
		
		show_slide:function( ic ){
			
			ic.closest( '.property-slideshow-nav').find('.property-thumbnail').removeClass('is-active');
			
			ic.addClass('is-active')
			
			var nav_wrap = ic.closest( '.property-slideshow-nav');
			
			var showid = ic.closest( '.property-slideshow-nav').data('showid');
			
			var is_modal = ( ic.closest('.tre-modal-window').length ) ? true : false;
			
			var nav_index = tremaine.slideshow.get_nav_index( ic );	
			
			tremaine.slideshow.change_slide( showid, nav_index, is_modal );		
			
		},
		
		get_nav_index:function( ic ){
			
			var i = ic.index();
			
			var pi = ic.closest('.property-nav-slide').index();
			
			var idx = ( i + ( pi * 4 ) );
			
			return idx;
		},
		
		change_slide_nav:function( ic ){
			
			var slides = jQuery( ic ).closest( '.property-slideshow-nav').find('.property-nav-slide');
			
			if ( slides.length < 2 ) return;
			
			var dir = ( ic.hasClass('next') ) ? 1 : -1;
			
			var c_slide = slides.filter('.is-active').first();
			
			var n_slide_index = c_slide.index() + dir;
			
			if ( n_slide_index >= slides.length ) n_slide_index = 0;
			
			if ( n_slide_index < 0 ) n_slide_index = slides.length - 1;
			
			var n_slide = slides.eq( n_slide_index );
			
			var left = ( dir > 0 ) ? '100%':'-100%';
			
			var ani = ( dir > 0 ) ? '-100%':'100%';
			
			n_slide.css( { left:left,top:'0' } );
			
			n_slide.animate( {left : 0}, 1000 );
			c_slide.animate( { left : ani }, 1000, function(){
				n_slide.addClass('is-active').siblings().removeClass('is-active');
				} );
			
		}, // end change_slide_nav
		
		change_slide:function( showid, index, is_modal ){
			
			if ( is_modal ) {
				
				var show = jQuery( '.tre-modal-window .' + showid + '.property-slideshow-slides' );
				
			} else {
				
				var show = jQuery( '.' + showid + '.property-slideshow-slides' );
				
			};
			
			console.log( show );
			
			var c_slide = show.find('.property-slide.is-active').first();
			
			var n_slide = show.find('.property-slide').eq( index );
			
			var dir = ( c_slide.index() > n_slide.index() ) ? -1 : 1;
			
			var left = ( dir > 0 ) ? '100%':'-100%';
			
			var ani = ( dir > 0 ) ? '-100%':'100%';
			
			n_slide.css( { left:left,top:'0' } );
			
			n_slide.animate( {left : 0}, 1000 );
			c_slide.animate( { left : ani }, 1000, function(){
				n_slide.addClass('is-active').siblings().removeClass('is-active');
				} );
			
		}, // end change_slide
		
		
		
	}, // end slideshow
	
	accordion: {
		
		init:function(){
			
			tremaine.accordion.events();
			
		},
		
		events:function(){
			
			jQuery('body').on(
				'click',
				'.tre-accordion',
				function(){
					tremaine.accordion.do_accordion( jQuery( this ) );
				});
		},
		
		do_accordion:function( ic ){
			
			var ct = ic.next('.tre-accordion-content');
			
			if ( ic.hasClass('tre-active') ){
				
				ct.slideUp('fast');
				ic.removeClass('tre-active');
				
			} else {
				
				ct.slideDown('fast');
				ic.addClass('tre-active');
				
			} // end if
			
		} 
		
	}, // end accordion
	
}

tremaine.init();