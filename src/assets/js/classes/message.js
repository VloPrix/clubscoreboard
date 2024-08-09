class message {
	
	constructor(messageBox, messageBoxContent) {
		this.messageBox = messageBox;
		this.messageBoxContent = messageBoxContent;

	}

	displayMessage(alertType, message) {

        const alertTypeClassSuccess = "alert-success";
		const alertTypeClassWarning = "alert-warning";
		const alertTypeClassDanger = "alert-danger";
		const alertTypeClassInfo = "alert-info";
        
		let alertTypeClass;
    	let type;
    
    	switch(alertType) {
    	    case 1:
    	        alertTypeClass = alertTypeClassSuccess;
    	        type = "Success";
    	        break;
    	    case 2:
    	        alertTypeClass = alertTypeClassWarning;
    	        type = "Warning";
    	        break;
    	    case 3:
    	        alertTypeClass = alertTypeClassDanger;
    	        type = "Error";
    	        break;
    	    case 4:
    	        alertTypeClass = alertTypeClassInfo;
    	        type = "Info";
    	        break;
    	}
    	this.alert_close();
    	this.messageBoxContent.html("<strong>"+type+":</strong> " + message);
    	this.messageBox.addClass(alertTypeClass);
    	this.messageBox.slideDown();
        
        const wait = (n) => new Promise((resolve) => setTimeout(resolve, n));
        const hide_alert = async () => {
        // this code will wait for 5 seconds
        await wait(8000);

        this.alert_close();
        };

        // call the async function
        hide_alert();
	}
	alert_close() {
        const alertTypeClassSuccess = "alert-success";
		const alertTypeClassWarning = "alert-warning";
		const alertTypeClassDanger = "alert-danger";
		const alertTypeClassInfo = "alert-info";
        
		this.messageBox.slideUp();
    	this.messageBox.removeClass(alertTypeClassSuccess);
    	this.messageBox.removeClass(alertTypeClassWarning);
    	this.messageBox.removeClass(alertTypeClassDanger);
    	this.messageBox.removeClass(alertTypeClassInfo);
	}
    displayBackendError(type, error) {
        this.displayMessage(3, "There was an error connecting with the server! Errortype: "+type+", Message:"+error);
    }
}