//Define Global Variables:
var loadHtml;
var preLoadHtml;
var stepCount;
var stepLoaded = false;

function sleep(milliseconds) {
	var start = new Date().getTime();
		while (true) {
			if ((new Date().getTime() - start) > milliseconds){
				break;
				}
	    }
}
xmlhttp.open("GET", window.clientRoot + "/static/js/jquery.js",true);
             xmlhttp.onreadystatechange=function() {
              if (xmlhttp.readyState==4) {
                   eval(xmlhttp.responseText);
                   sleep(500);
                   initialize();
              }
             };
             xmlhttp.send(null);
//Stop the user from submitting the form with the "submit" button (Instead click the next button)
             function stopRKey(evt) { 
            	  var evt = (evt) ? evt : ((event) ? event : null); 
            	  if ((evt.keyCode == 13)&&(stepLoaded))  {
            		  loadStep("next");
            		  }
        		  if (evt.keyCode == 13)
        			  return false;
            	} 

            	document.onkeypress = stopRKey;
             
             
             
function initialize(){
	
	preLoadHtml = $("body").html();
	$.getScript(window.clientRoot + "/static/js/jquery-ui.js", function(){
		
		$("h4").fadeOut("slow", function(){
			$("h4").html("Checking for Updates...");
			$("h4").fadeIn("slow",checkForUpdates);
		});	
	});
}
function checkForUpdates (){
	
	$.get("index.php?Step=next",function(data){
		
		if (data == "yes"){
			
			$("h4").fadeOut("slow", function(){
				
				$("h4").html("Update Avaliable, Please Wait; Updating...");
				$("h4").fadeIn("slow",updateTSEP);
				
			});
		}
		else
			{
				$("h4").fadeOut("slow", function(){
				
				$("h4").html("No Update Avaliable, Loading Setup...");
				$("h4").fadeIn("slow",selectLang);
			});
			
			}
			
		
	});
	
}

function selectLang () {
	
	$.get("index.php?Step=next", function(data){
		
		$("body").fadeOut("slow", function(){
			
			$("body").html(data);
			
			$("td[class]").each(function(){
				
				$(this).css("color","blue");
				$(this).click(function (){
					
					setLang($(this).attr("class"));
				});
				$(this).hover(function (){
					
					$(this).css("cursor","pointer");
				}, function (){
					
					$(this).css("cursor","auto");
				});
			});
			
			
			$("body").fadeIn("slow");
		});
		
	});
	
}

function setLang(lang){
	
	$("body").fadeOut("slow", function(){
		
		$("body").html(preLoadHtml);
		$("h4").html("Loading...");
		$("body").fadeIn("slow");
		loadSetup(lang);
		
	});
}


function loadSetup(lang) {
	
	stepCount = 1;
	
	$.get("index.php?Step=next&Language="+lang, function (data){

			$.get(window.clientRoot + "/static/css/setup.css", function (CSSdata){

				$("body").fadeOut("slow", function (){
					
					$("body").html(data);
					$("#sidebar").hide();
					$("<style />").attr("type","text/css").html(CSSdata).appendTo("head");
					loadHtml = $("#step").html();
					$("body").fadeIn("slow", function(){
						$("#sidebar").show("slide");
						loadScreen("next");
					});
				});
		});
		
	});
}


function loadScreen (step) {
	
	
	
	$.get("index.php?Step="+step, function(data){
		
		$("#step").fadeOut("slow", function (){
			currentStep = step;
			$("#step").html(data);
			if($("#stepNumber").length != 0)
				stepCount = $("#stepNumber").val();			
			$("#step").fadeIn();
			$("#step_"+stepCount).addClass("activeStep","normal");
			stepLoaded = true;
		});
		
	});
	
}

function viewError() {
	
	var error = $("#ErrorDetails").val();
	alert(error);
	
}

function submitForm (form) {
	
		var key;
		var value;
		var params = {};
		$(form)
		.find("input:checked, input:text, input:hidden, input:password, input:submit, option:selected, textarea")
		.filter(":enabled")
		.each(function() {
			key = this.name;
			value = $(this).val();
			params[key] = value;
		});
		
		$.post($(form).attr("action"), params, function(xml){
			$("#step").fadeOut("slow", function (){
				currentStep = step;
				$("#step").html(xml);
				
				if($("#stepNumber").length != 0)
					stepCount = $("#stepNumber").val();
				
				$("#step").fadeIn();
				$("#step_"+stepCount).addClass("activeStep","normal");
				stepLoaded = true;
			});
		});
		return false;

}

function loadStep(step) {
	
	$("a,input,select,submit").attr("disabled","true");
	stepLoaded = false;
	
	$("#step_"+(stepCount)).removeClass("activeStep","normal");
	
	//Removed for Security Reasons
	//if(step == "back")
		//stepCount--;
	if(step == "next")
		stepCount++;
	
	
	if (($("#mf").length != 0)&&(step == "next")){
		$("#step").fadeOut("slow", function (){
			
			$("#is").hide();
			$("a,input,select,submit").removeAttr("disabled");
			
			$("#step").append($("<div />").html(loadHtml));
			$("#step").fadeIn("slow", function (){
				
				submitForm($("#mf"));
			});
		});
	}
	else {
		$("#step").fadeOut("slow", function (){
			
			$("#step").html(loadHtml);
			$("#step").fadeIn("slow", function (){
				
				loadScreen(step);
			});
		});
	}
}


function updateTSEP() {
	
	$.get("index.php?Step=next", function(data){
		
		if (data == "done"){
			
			$("h4").fadeOut("slow", function(){
				
				$("h4").html("TSEP Updated Successfully, Reloading Page");
				$("h4").fadeIn("slow", function(){
					
					sleep(2000);
					location.reload();
				});
				
			});
		}
		else {
			
			$("h4").fadeOut("slow", function(){
				
				$("h4").html("Error occured while updating TSEP, setup will now close");
				$("h4").fadeIn("slow", function(){
					
					sleep(2000);
					window.close();
				});
				
			});
		}
		
	});
	
	
}
