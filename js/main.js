var choices = [];

function isSurveyFill( ) {
    var selectedCheckbox = 0;

    for (var index = 0; index < choices.length; index++) {
        if (choices[index].idQuestion == 1) {
            selectedCheckbox = selectedCheckbox + 1;
        }//Fin de if
    }//Fin de for.

    if (choices.length == (10 + selectedCheckbox) && choices.length >= 11) {
        return true;
    }//Fin de if.
    return false;
}//Fin de is isSurveyFill.

function addChoices(choice) {
    choices.push(choice);
}//Fin de function addChoices.

function scanChoices(choice) {
    var finded = -1;
    for (var index = 0; index < choices.length; index++) {
        if (choices[index].idQuestion == choice.idQuestion) {
            if (choices[index].idQuestion == 1) {
                if (choices[index].idSelectedChoise == choice.idSelectedChoise) {
                    finded = index;
                }//Fin de if.
            }//Fin de if.
            else {
                finded = index;
            }//Fin de else.
        }//Fin de if.
    }//Fin de for.
    return finded;
}//Fin de function scanChoices.

function sendSurvey() {
    post_to_url('sugerencias.php', parseChoicesToJSON( ), 'post');
}

$('.choice').on('click', function( ) {
    var inputChoice = {idQuestion: $(this).attr('name'), idSelectedChoise: $(this).val( )};
    var isInArray = scanChoices(inputChoice);
    if (isInArray != -1) {
        if (inputChoice.idQuestion == 1) {
            choices.splice(isInArray, 1);
        }//Fin de if.
        else {
            choices[ isInArray ] = inputChoice;
        }//Fin de else.
    }//Fin de if.
    else {
        addChoices(inputChoice);
    }
    if (isSurveyFill( )) {
        $('.buttonSend').show( );
    }//Fin de if.
    else {
        $('.buttonSend').hide( );
    }//Fin d else.
});

$('.buttonSend').on('click', function( ) {
    sendSurvey( );
});

$('.buttonNext').on('click', function( ) {
    if ($('.question').css("display") != 'none') {
        $('.question').hide( );
        $('.question2').show( );
        $(this).val('Atras');
    }
    else {
        $('.question2').hide( );
        $('.question').show( );
        $(this).val('Siguiente');
    }//Fin de else.
});

function post_to_url(path, param, method) {
    method = method || "post"; // Set method to post by default if not specified.

    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", 'answers');
    hiddenField.setAttribute("value", param);

    form.appendChild(hiddenField);


    document.body.appendChild(form);
    form.submit();
}


//DOM is ready
$(document).ready(function() {
});


function parseChoicesToJSON( ) {
    var StringJSON = '{"choices":[';

    for (var index = 0; index < choices.length; index++) {
        StringJSON += '{"idQuestion":"' + choices[index].idQuestion + '",';
        StringJSON += '"idSelectedChoise":"' + choices[index].idSelectedChoise + '"}';
        if (index != choices.length - 1) {
            StringJSON += ',';
        }//Fin de if
    }//Fin de for.
    StringJSON += ']}';
    return StringJSON;
}//Fin de function parseChoicesToJSON.


function login() {

    FB.login(function(response) {
        if (response.authResponse) {
            //console.log('Welcome!  Fetching your information.... ');

            FB.api('/me?fields=id,first_name,last_name,locale,gender,birthday', function(response) {
                //console.log('Good to see you, ' + response.name + '.');
                var Vuid = response.id;
                var Vfirst_name = response.first_name;
                var Vlast_name = response.last_name;
                var Vlocale = response.locale;
                var Vgender = response.gender;
                var Vbirthday = response.birthday;
                request = $.ajax({
                    type: "POST",
                    url: "login.php",
                    data: {
                        uid: Vuid,
                        first_name: Vfirst_name,
                        last_name: Vlast_name,
                        gender: Vgender,
                        locale: Vlocale,
                        birthday: Vbirthday,
                    },
                    success: function(data) {
                        var response = data;
                        window.location = "encuesta.php";
                    }

                });

            });



            //window.location = 'encuesta.php';
        }
    }, {scope: 'user_birthday,user_about_me,user_status'});
//redirect here
}


function postAndChoose() {
alert("js1");
    FB.ui(
            {
                method: 'feed',
                name: 'Gamers Paradise',
                link: 'https://www.facebook.com/pages/Gamers-Paradise/297090210428630',
                picture: 'http://www.flashfusioner.com/gamers_paradise/imagenes/couch-friends.png',
                caption: 'Responde y gana con Gamers Paradise',
                description: 'Hola, recientemente he completado la encuesta de Gamers Paradise. Me ha sugerido juegos que me quiero jugar ya!!! ¿Que estas esperando?'
            },
    function(response) {
        if (response && response.post_id) {
alert("js2");

            FB.api('/me?fields=id', function(response) {
                //console.log('Good to see you, ' + response.name + '.');
                var uid = response.id;
                var gameSelected;
                
                var radios = document.getElementsByName('games');

                for (var i = 0, length = radios.length; i < length; i++) {
                    if (radios[i].checked) {
                        gameSelected = radios[i].value;
                    }
                }
                
                console.log('uid   '+uid);
                
                console.log('game   '+gameSelected);

                var consoleChoosed = document.getElementById('consoles-select').value;

                console.log('console    '+consoleChoosed);
alert("js3");
                request = $.ajax({
                    type: "POST",
                    url: "calls.php",
                    data: {
            
			            method: 'saveContestantGame',
                        uid: uid,
                        game: gameSelected,
                        console: consoleChoosed
                    },
                    success: function(data) {
                        console.log('success');
                        window.location = "exitos.php";
                    }

                });

            });

        }
    }
    );
}


function reloadConsoles() {
                
                console.log('reload consoles');
                
                var gameSelected;
                var radios = document.getElementsByName('games');

                for (var i = 0, length = radios.length;
                        i < length;
                        i++) {
                    if (radios[i].checked) {
                        gameSelected = radios[i].value;
                    }
                }

                request = $.ajax({
                    type: "POST",
                    url: "calls.php",
                    data: {
                        method: 'reloadConsoles',
                        gid: gameSelected
                    },
                    success: function(data) {
                        
                        //console.log('118 reloadConsoles');
                        
                        var response = data.toString();
                
                        $('#consoles-select').empty();
                        var parsedJSON = $.parseJSON(response);
                  
                        for(var i=0; i<parsedJSON.length;i++){

                            $("#consoles-select").append('<option value='+parsedJSON[i].console_id+'>'+parsedJSON[i].name+'</option>');

                          
                        }
                      
                    }

                });


               // $('#choose-console').show();
               // $('#contenedor-boton').show();
               // $('#share-obligation').show();

            }