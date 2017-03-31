var tre_modal = {
	
	modal: {
		
		bg:false,
		
		frame:false,
		
		init:function(){
			
			tre_modal.modal.events();
			
		},
		
		events:function(){
			
			/*jQuery('#import-content').load( function(){ 
			
				jQuery('#import-content').contents().on(
					'click',
					'.show-modal',
					function( e ){
						e.preventDefault();
						e.stopPropagation();
						tre_modal.modal.show( jQuery( this ) , e );
						return false;
					}
				);
			
			
			} );*/
			
			jQuery('body').on(
				'click',
				'.show-modal',
				function( e ){
					tre_modal.modal.show( jQuery( this ) , e );
				}
			);
			
			
			
			jQuery('body').on(
				'click',
				'.tre-close-modal',
				function( e ){
					e.preventDefault();
					tre_modal.modal.hide();
				}
			);
			
		},
		
		hide: function(){
			
			jQuery('.tre-modal-frame').css('top', '-9999rem');
			
			jQuery('.tre-modal-frame.video-frame').removeClass('video-frame').find( '.tre-modal-window-content' ).html('');
			
			//tre_modal.modal.frame.fadeOut('fast' , function(){
				//tre_modal.modal.frame.find( '.tre-modal-window-content' ).html( '' );
			//});
			
			tre_modal.modal.bg.fadeOut('fast');
			
		},
		
		show:function( item_clicked , ev ){
			
			var type = item_clicked.data('modaltype');
			
			if ( typeof type !== typeof undefined && type !== false ){
				
				ev.preventDefault();
				
				var type = item_clicked.data('modaltype');
				
				switch ( type ){
					
					case 'youtube':
						tre_modal.modal.show_youtube( item_clicked, ev );
						break;
					
				} // end switch
				
				tre_modal.modal.show_bg();
				
			} else {
			
				var modal_id = item_clicked.data('modalid');
				
				var modal_content_wrap = tre_modal.modal.get_modal_content_wrapper( modal_id );
				
				if ( modal_content_wrap ){
					
					//var modal_content = modal_content_wrap.html();
				
					var modal_width = item_clicked.data('modalwidth');
					
					ev.preventDefault();
					
					tre_modal.modal.show_bg();
					
					tre_modal.modal.show_frame( modal_content_wrap, modal_width );
					
				} // end if
			
			} // end if
			
		},
		
		show_youtube:function( item_clicked, ev ){
			
			if ( ! tre_modal.modal.frame ){
				
				tre_modal.modal.add_frame();
				
			} // end if
			
			var src = item_clicked.attr('href');
			
			var vid_id = tre_modal.modal.get_vid_id( src );
			
			var html = '<iframe src="https://www.youtube.com/embed/' + vid_id + '?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>';
			

			var modal = tre_modal.modal.frame.find( '.tre-modal-window-content' );
			
			tre_modal.modal.frame.addClass('video-frame');			
			
			modal.html( html );
			
			tre_modal.modal.show_frame( modal, 850 );
			
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
			
			if ( ! tre_modal.modal.bg ){
				
				tre_modal.modal.add_bg();
				
			} // end if
			
			tre_modal.modal.bg.fadeIn('fast');
			
		},
		
		add_bg:function(){
			
			jQuery( 'body' ).append( '<div id="tre-modal-bg" class="tre-close-modal"></div>' );
			
			tre_modal.modal.bg = jQuery( '#tre-modal-bg');
			
		},
		
		show_frame:function( modal_content_wrap, width ){
			
			//if ( ! tre_modal.modal.frame ){
				
				//tre_modal.modal.add_frame();
				
			//} // end if
			
			//tre_modal.modal.frame.find( '.tre-modal-window-content' ).html( content );
			
			console.log( modal_content_wrap );
			
			var frame = modal_content_wrap.closest('.tre-modal-window');
			
			console.log( frame );
			
			tre_modal.modal.set_height( frame.parent() );
			
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
			
			tre_modal.modal.frame = jQuery( '.tre-modal-frame.dynamic-modal');
			
		},
		
		set_height:function( frame ){
			
			frame.css( 'top' , ( jQuery(window).scrollTop() + 100 ) );
			
		}
		
	}, // end modal
	
}

tre_modal.modal.init();