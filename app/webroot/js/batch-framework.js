function process_batch() {
	
	$.getJSON(window.base + 'admin/core/batch', function (done) {
		
		if(!done) {
			process_batch();
		}
		else {
			
			window.location = window.base + 'admin/';
		}
		
	});
}


$(document).ready(function (){
	
	process_batch();
});
