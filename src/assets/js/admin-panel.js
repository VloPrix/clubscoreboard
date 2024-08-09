// New Event Button
$(function() {
  $("#newEventButton").click(function() {
      $("#newEventWindow").slideDown();
      member.getAllMember(function (response) {
        $('#playerScoreInputDiv').html("");
        $.each(response, function(key, item) {
          $('#playerScoreInputDiv').append("<div class='d-flex align-items-center'><p style='color: var(--bs-body-bg);font-weight: bold;margin-bottom: 0px;width:140px;'>"+item.name+"</p><input class='form-control' type='text' style='background: rgba(255,255,255,0.5);width: 100px;' placeholder='Points' pattern='[0-9]+' inputmode='numeric' name='"+item.ID+"' /><input class='form-control' type='text' style='background: rgba(255,255,255,0.5);width: 100px;' placeholder='Placement' inputmode='text' name='"+item.ID+"placement'/></div>");
        });
      });
  });
});
$(function() {
  $("#closeNewEvent").click(function() {
      $("#newEventWindow").slideUp();
  });
});
$("#newEventForm").on('submit', function ( event ) {
  events.createEvent($('#newEventForm'), function (response) {
    if (response.status == "success") {
      messageBox.displayMessage(1, "Event created successfully");
    }
    else {
      messageBox.displayMessage(3, "An error occured: "+response.status);
    }
  });
  event.preventDefault();
});
// Edit Event Button
$(function() {
  $("#editEventButton").click(function() {
      cleanUpEditForm();
      $("#editEventWindow").slideDown();
      disableEditInput();
      events.getAllEvents(function (response) {
        if (response.status == "error") {
          messageBox.displayMessage(3, "Failed getting Events!");
        }
        else {
          $.each(response, function(key, item) 
          {
            $("#editEventEventSelect").append("<option value='"+item.ID+"'>"+item.name+"</option>");
          });
        }
        
      });
  });
});
$(function() {
  $("#closeEditEvent").click(function() {
    $("#editEventWindow").slideUp();
      disableEditInput();
      cleanUpEditForm();
  });
});
$(function() {
  $("#editEventEventSelect").on("change",function() {
    enableEditInput();
    events.getEventInfo($("#editEventEventSelect").find(":selected").val(), function (response) {
      if (response.status == "error") {
        messageBox.displayMessage(3, "Failed getting Eventinfo!");
      }
      else {
        $("#editEventEventName").val(response.name);
        $("#editEventEventDate").val(response.date);
      }
    });
    $("#editEventplayerScoreInputDiv").html("");
    events.getEventStats($("#editEventEventSelect").find(":selected").val(), function (response) {
      if (response.status == "error") {
        messageBox.displayMessage(3, "Failed getting Eventstats!");
      }
      else {
        let place = 1;
        $.each(response, function(key, item) 
        {
          $("#editEventplayerScoreInputDiv").append("<div class='d-flex align-items-center'><p style='color: var(--bs-body-bg);font-weight: bold;margin-bottom: 0px;width:140px;'>"+item.personname+"</p><input class='form-control' type='text' style='background: rgba(255,255,255,0.5);width: 100px;' placeholder='Points' inputmode='numeric' name='"+item.personid+"' id='"+item.personid+"'/><input class='form-control' type='text' style='background: rgba(255,255,255,0.5);width: 100px;' placeholder='Placement' inputmode='text' name='"+item.personid+"placement' id='"+item.personid+"placement'/></div>");
          $("#"+item.personid).val(item.score);
          $("#"+item.personid+"placement").val(item.place);
        });
      }
    });
  });
});
$("#editEventForm").on('submit', function ( event ) {
  events.editEvent($('#editEventForm'), function (response) {
    if (response.status == "success") {
      messageBox.displayMessage(1, "Event edited successfully");
    }
    else {
      messageBox.displayMessage(3, "An error occured: "+response.status);
    }
  });
  event.preventDefault();
});

// delete Event
$(function() {
  $("#deleteEventButton").click(function() {
      $("#deleteEventWindow").slideDown();
      events.getAllEvents(function (response) {
        if (response.status == "error") {
          messageBox.displayMessage(3, "Failed getting Events!");
        }
        else {
          $("#deleteEventSelect").html("");
          $.each(response, function(key, item) 
          {
            $("#deleteEventSelect").append("<option value='"+item.ID+"'>"+item.name+"</option>");
          });
        }
        
      });
  });
});
$(function() {
  $("#closeDeleteEvent").click(function() {
    $("#deleteEventWindow").slideUp();
  });
});
$("#deleteEventForm").on('submit', function ( event ) {
  events.deleteEvent($("#deleteEventSelect").find(":selected").val(), function (response) {
    if (response.status == "error") {
      messageBox.displayMessage(3, "Event deletion Failed!");
    }
    else if (response.status == "success") {
      messageBox.displayMessage(1, "Event deletion successful.");
    }
    else {
      messageBox.displayMessage(3, "An Error occured!");
    }
  });
  event.preventDefault();
});

// new Member
$(function() {
  $("#newMemberButton").click(function() {
      $("#newMemberWindow").slideDown();
  });
});
$(function() {
  $("#closeNewMember").click(function() {
    $("#newMemberWindow").slideUp();
  });
});
$("#newMemberForm").on('submit', function ( event ) {
  member.createMember($("#newMemberForm"), function (response) {
    if (response.status == "error") {
      messageBox.displayMessage(3, "Failed to create Member!");
    }
    else if (response.status == "success") {
      messageBox.displayMessage(1, "Created Member successfully.");
    }
    else {
      messageBox.displayMessage(3, "An Error occured!");
    }
  });
  event.preventDefault();
});

// delete Member
$(function() {
  $("#deleteMemberButton").click(function() {
      $("#deleteMemberWindow").slideDown();
      member.getAllMember(function (response) {
        if (response.status == "error") {
          messageBox.displayMessage(3, "Failed getting Members!");
        }
        else {
          $("#deleteMemberSelect").html("");
          $.each(response, function(key, item) 
          {
            $("#deleteMemberSelect").append("<option value='"+item.ID+"'>"+item.name+"</option>");
          });
        }
        
      });
  });
});
$(function() {
  $("#deleteMemberEvent").click(function() {
    $("#deleteMemberWindow").slideUp();
  });
});
$("#deleteMemberForm").on('submit', function ( event ) {
  member.deleteMember($("#deleteMemberSelect").find(":selected").val(), function (response) {
    if (response.status == "error") {
      messageBox.displayMessage(3, "Member deletion Failed!");
    }
    else if (response.status == "success") {
      messageBox.displayMessage(1, "Member deletion successful.");
    }
    else {
      messageBox.displayMessage(3, "An Error occured!");
    }
  });
  event.preventDefault();
});

function enableEditInput() {
  $("#editEventSubmitButton").prop( "disabled", false );
  $("#editEventEventName").prop( "disabled", false );
  $("#editEventEventDate").prop( "disabled", false );
  $("#editEventEventTypeSelector").prop( "disabled", false );
}
function disableEditInput() {
  $("#editEventSubmitButton").prop( "disabled", true );
  $("#editEventEventName").prop( "disabled", true );
  $("#editEventEventDate").prop( "disabled", true );
  $("#editEventEventTypeSelector").prop( "disabled", true );
}
function cleanUpEditForm() {
  $("#editEventplayerScoreInputDiv").html("");
  $("#editEventEventSelect").html("<option value='null' selected>Select Event</option>");
  $("#editEventEventName").val("");
  $("#editEventEventDate").val("");
}