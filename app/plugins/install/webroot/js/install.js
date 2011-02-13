$(document).ready(function () {
	$.get(window.base + 'install/install/install', function () {
		
		window.location = window.base + 'install/install/finish';
	});
});