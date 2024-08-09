class login {
    static sendLogin(loginUsername, loginPassword, callback) { 
        let loginResponse = null; 
        $.post("assets/php/public/main.php",
        {
            type: "login",
            username: loginUsername,
            password: loginPassword
        }, function(response){
            callback(response.status);
        }, 'json')
        .fail(function(jqXHR, type, error){
            messageBox.displayBackendError(type, error);
        });
    }
    static getSession(callback) {
        $.post("assets/php/public/main.php",
        {
            type: "session"
        }, function(response){
            callback(response.loggedIn);
        }, 'json')
        .fail(function(jqXHR, type, error){
            messageBox.displayBackendError(type, error);
        });
    }
    static sendLogout(callback) {
        $.post("assets/php/public/main.php",
        {
            type: "logOut"
        }, function() {
            callback();
        })
        .fail(function(jqXHR, type, error){
            messageBox.displayBackendError(type, error);
        });
    }
}