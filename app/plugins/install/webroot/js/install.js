$(document).ready(function () {
	$('#theform').submit(function () {
	    $(this).html('');
	    $(this).append($('<div />').addClass('loader').html('Loading...'));
		$(this).load(window.base + '/install/install/run', $(this).serialize());
	    return false;
	});
});