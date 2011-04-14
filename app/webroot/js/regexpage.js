//File for the regular expression page


$(document).ready(function () {
var o = window.opener;


$('<form />').attr('id', 'mainform')
             .submit(function () {
            	 
            	 o.$('#regex').val(window.regularExpression);
            	 
            	 window.close();
            	 
            	 return false;
             })
             .appendTo('body');

$('<input />').attr('type', 'submit')
          .val('Submit Result')
          .appendTo('#mainform');

});
