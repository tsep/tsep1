$(function() {
		var cache = {},
			lastXhr;
		$( "#search-box" ).autocomplete({
			minLength: 2,
			source: function( request, response ) {
				var term = request.term;
				if ( term in cache ) {
					response( cache[ term ] );
					return;
				}

				lastXhr = $.getJSON( window.base + 'searches/get', request, function( data, status, xhr ) {
					
					cache[ term ] = data;
					if ( xhr === lastXhr ) {
						response( data );
					}
				});
			}
		}).keypress(function(e) {

	          if (e.keyCode === 13) 
	          {
	            $(this).closest('form').trigger('submit');
	          }

	     });
	});