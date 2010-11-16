ddaccordion.init({
    headerclass: "submenuheader", //Shared CSS class name of headers group
    contentclass: "submenu", //Shared CSS class name of contents group
    revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
    mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
    collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
    defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
    onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
    animatedefault: false, //Should contents open by default be animated into view?
    persiststate: true, //persist state of opened contents within browser session?
    toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
    togglehtml: ["suffix", "<img src='<?php echo TSEP_CLIENT_ROOT?>/static/img/plus.gif' class='statusicon' />", "<img src='<?php echo TSEP_CLIENT_ROOT?>/static/img/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
    animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
    oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
        //do nothing
    },
    onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
        //do nothing
    }
});

$(document).ready(function() {
    $('.ask').jConfirmAction();
    $('.jclock').jclock();
});

$(document).ready(function () {

	$.get("../updater.php", function(data){
		   if (data == "yes") {
            $("#updatePanel").html("<a href=\"#\" onClick=\"runUpdate();\">Click to Update</a>");
        } else {
             $("#updatePanel").html("Up to date");
         }         
	});
	change();
	
});

function change () {
	$(".button").each(function () {
    	var img = $(new Image());

		$(img)	.css("margin-top", "24px")
				.css("margin-bottom", "10px");

    	img.attr("src","../../static/img/ajax-loader.gif");
    	img.hide();

    	img.insertAfter(this);

    	$(this).click(function () {
    	    var form = $(this).parents('form:first');
			form.find(":input").attr("disabled","disabled");

			$(this).hide();
			
			img.show();
			form.submit();
	    });
	});
	
}

function runUpdate () {

	$("#updatePanel").html("Updating...");
	$.get("../updater.php?Update=yes", function(data){
		if (data == "done") {
			window.reload();
		} else {
			$("#updatePanel").html("Update Failed");
		}  
	});


}