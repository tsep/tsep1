$(document).ready(function () {
	$('#theform').submit(function () {
		var serial = $(this).serialize();
	    $(this).html('');
	    $(this).append($('<div />').addClass('loader').html('Loading...'));
		$.post(window.base + 'install/install', serial, function (data) {
			$('#theform').html(data);
		});
	    return false;
	});
});