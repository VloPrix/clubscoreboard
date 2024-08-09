class member {
    static getAllMember(callback) {
        $.post("assets/php/public/main.php",
        {
            type: "getAllMember"
        }, function(response){
            callback(response);
        }, 'json')
        .fail(function(jqXHR, type, error){
            messageBox.displayBackendError(type, error);
        });
    }
    static createMember(formdiv, callback) {
        let postargs = "type=createMember&"+formdiv.serialize();
        $.post("assets/php/public/main.php", postargs, callback)
        .fail(function(jqXHR, type, error){
            messageBox.displayBackendError(type, error);
        });
    }
    static deleteMember(id, callback) {
        $.post("assets/php/public/main.php",
            {
                type: "deleteMember",
                memberid: id
            }, function(response){
                callback(response);
            }, 'json')
            .fail(function(jqXHR, type, error){
                messageBox.displayBackendError(type, error);
            });
    }
}