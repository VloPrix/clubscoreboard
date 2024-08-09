/*
	Button Functionality
*/

// Login Window Button functionality
$(function() {
	$("#loginButton").click(function() {
		$("#loginForm").slideDown();
	});
});
$(function() {
	$("#closeLogin").click(function() {
		$("#loginForm").slideUp();
	});
});
$(function() {
	$("#logoutButton").click(function() {
		login.sendLogout(function() {
            setSession();
        });
        
	});
});


/*
	Login Window
*/

//login Form Send and receive function
$('#loginFormForm').on('submit', function( event ) {
	login.sendLogin($("#loginUsername").val(), $("#loginPassword").val(), function( loginReturn ){
		switch (loginReturn) {
			case "success":
				messageBox.displayMessage(1, "Login successful!");
                setSession();
                $("#loginForm").slideUp();
				break;
			case "loginFailed":
				messageBox.displayMessage(3, "Login failed! Please check username and password.");
				break;
			default:
				messageBox.displayMessage(3, "Error in Login Response!");
		}
	});
	event.preventDefault();
});

/*
	Index Page Specific
*/

// Event Placement on change trigger
$("#gameStatisticsList").on("change", setEventStats);

// get all Events and store in selection


function setSelection() {
	events.getAllEvents(function(response) {
		if (response.status == "error") {
			messageBox.displayMessage(3, "Failed getting Events!");
		}
		else {
			$.each(response, function(key, item) 
        	{
        	    $("#gameStatisticsList").html($("#gameStatisticsList").html() + "<option value='" + item.ID +"'>"+ item.name + "</option>");
        	});
        	setEventStats();
		}
	});
}
function setOverallPlacement() {
	events.getTotalPerformance(function(response) {
		if (response.status == "error") {
			messageBox.displayMessage(3, "Failed getting total performance!");
		}
		else {
			let place = 1;
			$.each(response, function(key, item) 
        	{
        	    $("#totalstatisticTable").html($("#totalstatisticTable").html() + "<tr><td style='text-align: center;'>" + place + "</td><td>" + item.name + "</td><td>" + item.totalscore + "</td></tr>");
				place++;
        	});
		}
	});
}
function setEventStats() {
    let eventID = $("#gameStatisticsList").val();

	$("#eventStatisticTable").html("");

    events.getEventStats(eventID, function(response) {
		if (response.status == "error") {
			messageBox.displayMessage(3, "Failed getting event stats!");
		}
		else {
			$.each(response, function(key, item) 
        	{
        	    $("#eventStatisticTable").html($("#eventStatisticTable").html()+"<tr><td style='text-align: center;'>"+item.place+ "</td><td>"+item.personname+"</td><td>"+item.score+"</td></tr>");
        	});
		}
    });
}

function setSession() {
    let isLoggedIn = false;
    login.getSession(function(response) {
        if (response == true) {
            $("#loginButton").hide();
            $("#adminPanelLink").show();
            $("#logoutButton").show();
        }
        else {
            $("#loginButton").show();
            $("#headerUsername").hide();
            $("#adminPanelLink").hide();
            $("#logoutButton").hide();
        }
    });
}

$( document ).ready(function() {
    setSelection();
	setOverallPlacement();
    setSession();
});