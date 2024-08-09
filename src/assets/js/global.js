const messageBox = new message($("#alertBox"), $("#alertBoxContent"));

// Close Mesage Button 
$(function() {
	$("#messageClose").click(function() {
		messageBox.alert_close();
	});
});

// Loading Animation
$(document).on({
    ajaxStart: function(){
        $("#loaderDiv").show(); 
    },
    ajaxStop: function(){ 
        $("#loaderDiv").hide();  
    }    
});
