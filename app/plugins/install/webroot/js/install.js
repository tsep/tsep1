$(document).ready(function () {
	$('#theform').submit(function () {
		var serial = $(this).serialize();
		$('#theform').children().hide();
		$('.loader').show();
		$.post(window.base + 'install/install', serial, function (data) {
			$('#theform').children(':hidden').remove();			
			$('#theform').append(data);
		});
	    return false;
	});	
	
	$('#server').val('127.0.0.1:3306');
	$('#login').val('root');
	$('#password').val('');
	
	$('#database').val('tsep');
	$('#prefix').val('tsep_');
	
	$('#user').val('admin');
	$('#pass').val('');
});