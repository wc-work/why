(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		(function($){
			
			$(document).ready(function(){
			
				$(function() {

					if($('.cssmenu').length) {

						var menu = $('.cssmenu > ul');

						menu.find('.has-sub > ul').hide();

						$( '#toggle' ).click(function() {
							$( this ).toggleClass( "curves" );
						});
						
						menu.on('click', function(event) {

							var targetParent = $(event.target).parent();
							if (targetParent.hasClass('has-sub')) {
								targetParent.toggleClass('active1');
								targetParent.children('ul').slideToggle(250);
							} 
						})
					}
				});
			});
		})(jQuery);	
	});	
})(jQuery, this);