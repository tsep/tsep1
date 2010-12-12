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
    togglehtml: ["suffix", '<img src='+window.base + "/img/plus.gif' class='statusicon' />", '<img src=' + window.base + "/img/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
    animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
    oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
        //do nothing
    },
    onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
        //do nothing
    }
});

window.loading = false;

$(document).ready(function() {
    $('.jclock').jclock();
    
    function parseForms() {
    	
    	$('.button').each(function () {
            var form = $(this).parents('form:first');
        	    	
        	$(form).submit(function () {
        		
        		if(window.loading) return false;
        		
        		window.loading = true;
        		
        		$("#loader").show();
        		$("#content").hide();
        		
        		$.post($(this).attr('action'), $(this).serialize(), function (data) {
        			
        			$("#content").html(data);
        			
        			parseLinks();
        			parseForms();
        			
        	        $('.ask').jConfirmAction();
        			
        			$("#content").show();
        			$("#loader").hide();
        			
        			window.loading = false;
        		});
        		
        		return false;
        	});
        });
    	
    }
    
    
    $.get(window.base + 'update/update/check', function (data) {
    	
    	if (data == 'no') {
    		$('#updatePanel').html('No Update');
    	}
    	else {
    		$('#updatePanel').click(function () {
    			
    			$('#updatePanel').html('Preparing to Update...');
    			
    			$(document).load(window.base + 'update/update/template');

    		});
    		$('#updatePanel').html('Click to Update');
    	}
    });
    
    function parseLinks () {
        	
	    $(".menu, #content").find("a").each(function () {
	    		    	
	    	$(this).click(function () {
	    		
	    		if(window.loading) return false;
	    			    		
	    		window.loading = true;
	    		
	    		$("#loader").show();
	    		$("#content").hide();
	    			    		
	    		$("#content").load($(this).attr('href'), function () {
	    			
	    			parseLinks();
	    			parseForms();
	    			
	    	        $('.ask').jConfirmAction();
	    			
	    			$("#content").show();
	    			$("#loader").hide();
	    			
	    			window.loading = false;
	    			
	    		});
	    		
	    		return false;
	    	});
	    });
    }
    
    parseLinks();
    parseForms();
    
    $('.ask').jConfirmAction();

});