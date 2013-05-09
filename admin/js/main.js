function login(){
    request = $.ajax({
        
        type: "POST",
        url: "login.php",
        data: {
            username:document.getElementById('username').value,
            password:document.getElementById('password').value},
        success: function(data){
            alert("success");
            
            
        },
        error: function(data){
            alert("errorrrr ");
        }
        
        });
}

$(document).ready(function() {
    
    $('#login-submit').on('click', function(){
        
        login();
        
        
    });
    
});