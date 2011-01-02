$(document).ready(function () {
	$('#theform').submit(function () {
		var serial = $(this).serialize();
		$('#theform').children().hide();
		$('.loader').show();
		$.post(window.base + 'install/install', serial, function (data) {
			$('#theform').append(data);
		});
	    return false;
	});
});