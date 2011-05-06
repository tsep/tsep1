function getParameterByName( name )
{
  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regexS = "[\\?&]"+name+"=([^&#]*)";
  var regex = new RegExp( regexS );
  var results = regex.exec( window.location.href );
  if( results == null )
    return "";
  else
    return decodeURIComponent(results[1].replace(/\+/g, " "));
}

function process_batch() {
	
	$.getJSON(window.base + 'admin/core/batch', function (done) {
		
		if(!done) {
			process_batch();
		}
		else {
			
			var redirect = getParameterByName('redirect');
			
			if(redirect) {
				
				window.location = window.base + redirect;
			}
			else {
			
				window.location =  window.base + 'admin/';
			
			}
		}
		
	});
}


$(document).ready(function (){
	
	$('body').ajaxError(function () {
		
		$('#progress_bar').hide();
				
		setTimeout(function () {
			
			window.location.reload();
			
		}, 10);
	});
	
	process_batch();
});
