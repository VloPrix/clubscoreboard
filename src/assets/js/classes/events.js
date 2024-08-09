class events {
	static getAllEvents(callback) {
		$.post("assets/php/public/main.php",
        {
            type: "getAllEvents"
        }, function(response){
            callback(response);
        }, 'json')
        .fail(function(jqXHR, type, error){
            messageBox.displayMessage(3, "There was an error connecting with the backend! Error: "+type+", "+error);
        });
	}
    static getTotalPerformance(callback) {
        $.post("assets/php/public/main.php",
        {
            type: "getTotalPerformance"
        }, function(response){
            callback(response);
        }, 'json')
        .fail(function(jqXHR, type, error){
            messageBox.displayBackendError(type, error);
        });
    }
    static getEventStats(eventID,callback) {
        $.post("assets/php/public/main.php", {type: "getEventStats", eventid: eventID}, function (response) {
            callback(response);
        })
        .fail(function(jqXHR, type, error){
            messageBox.displayBackendError(type, error);
        });
    }
    static createEvent(formdiv, callback) {
        let postargs = "type=createEvent&"+formdiv.serialize();
        $.post("assets/php/public/main.php", postargs, callback)
        .fail(function(jqXHR, type, error){
            messageBox.displayBackendError(type, error);
        });
    }
    static editEvent(formdiv, callback) {
        let postargs = "type=editEvent&"+formdiv.serialize();
        $.post("assets/php/public/main.php", postargs, callback)
        .fail(function(jqXHR, type, error){
            messageBox.displayBackendError(type, error);
        });
    }
    static getEventInfo(id, callback) {
        $.post("assets/php/public/main.php",
            {
                type: "getEventInfo",
                eventid: id
            }, function(response){
                callback(response);
            }, 'json')
            .fail(function(jqXHR, type, error){
                messageBox.displayBackendError(type, error);
            });
    }
    static deleteEvent(id, callback) {
        $.post("assets/php/public/main.php",
            {
                type: "deleteEvent",
                eventid: id
            }, function(response){
                callback(response);
            }, 'json')
            .fail(function(jqXHR, type, error){
                messageBox.displayBackendError(type, error);
            });
    }
}