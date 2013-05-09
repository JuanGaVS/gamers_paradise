function login(){
    request = $.ajax({
        
        type: "POST",
        url: "calls.php",
        data: {
            username:document.getElementById('username').value,
            password:document.getElementById('password').value},
        success: function(data){
            alert("ffff");
            var response = data;
            alert(response.toString());
            if(response === '1'){
                alert('succesful');
                windows.location('admin.php');
            }else{
                document.getElementById('error').html(response);
            }
            
        },
        error: function(jqXHR, textStatus, errorThrown ){
            alert("errorrrr "+errorThrown.toString());
        }
        
        });
}

$(document).ready(function() {
    
    $('#login-submit').on('click', function(){
        
        alert('jqeuryrr');
        login();
        
        
    });
    
});