function login() {
    request = $.ajax({
        type: "POST",
        url: "login.php",
        data: {
            username: document.getElementById('username').value,
            password: document.getElementById('password').value},
        error: function(data) {
            alert("errorrrr ");
        },
        success: function(data) {
            alert("success");


        }

    });
}

$(document).ready(function() {

    $('#login-submit').on('click', function() {

        login();


    });

});