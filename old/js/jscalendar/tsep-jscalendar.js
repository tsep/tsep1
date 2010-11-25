// JavaScript Document

//alert(document.documentElement.className); //to see if this is working- uncomment this line

function filterlogviewfrom(cal) {
    var date = cal.date;
    var time = date.getTime()
    
    //both fields get the same value
    time=date;
    var date2 = new Date(time); 
    
    //write hour
    var field = document.getElementById("filterlogviewfromtime");    
    field.value = date2.print("%H:%M:%S");
    // write date
    field = document.getElementById("filterlogviewfromdate");
    field.value = date2.print("%Y-%m-%d");             
        
   
}

Calendar.setup({
    inputField     :    "filterlogviewfromdate",   // id of the input field
    ifFormat       :    "%Y-%m-%d",       // format of the input field
    showsTime      :    true,
    timeFormat     :    "24",
    onUpdate       :    filterlogviewfrom
});
Calendar.setup({
    inputField     :    "filterlogviewfromtime",
    ifFormat       :    "%H:%M:%S",
    showsTime      :    true,
    timeFormat     :    "24",
    onUpdate       :    filterlogviewfrom
});

 
function filterlogviewto(cal) {
    var date = cal.date;
    var time = date.getTime()
    
    //both fields get the same value
    time=date;
    var date2 = new Date(time); 
    
    //write hour
    var field = document.getElementById("filterlogviewtotime");    
    field.value = date2.print("%H:%M:%S");
    // write date
    field = document.getElementById("filterlogviewtodate");
    field.value = date2.print("%Y-%m-%d");             
        
   
}

Calendar.setup({
    inputField     :    "filterlogviewtodate",   // id of the input field
    ifFormat       :    "%Y-%m-%d",       // format of the input field
    showsTime      :    true,
    timeFormat     :    "24",
    onUpdate       :    filterlogviewto
});
Calendar.setup({
    inputField     :    "filterlogviewtotime",
    ifFormat       :    "%H:%M:%S",
    showsTime      :    true,
    timeFormat     :    "24",
    onUpdate       :    filterlogviewto
});
