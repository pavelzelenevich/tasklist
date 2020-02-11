function isValid(id, pat) {
    var value = $(id).val();
    var pattern =  new RegExp("^"+pat+"","i");
    if (pattern.test(value)) {
        console.log('valid id='+id+' value='+value);
        return true;
    }
    else {
        console.log('invalid id='+id+' value='+value);
        return false;
    }
}

var pass = false;
var pass1 = 0;
var pass2 = false;
var pass3 = 0;
var login = false;
var email = false;


$(document).ready(function() {

    $("#login").change( function(){
        login = isValid("#login", '^[a-zA-Z0-9_]+$');
        if(login){
            $('#login').removeClass('bad');
            $('#login').addClass('good');
        }
        else {
            $('#login').removeClass('good');
            $('#login').addClass('bad');
        }
    });

    $("#pass").change( function(){
        pass = isValid("#pass", '^[a-zA-Z0-9]+$');
        if(pass){
            $('#pass').removeClass('bad');
            $('#pass').addClass('good');
            pass1 = $("#pass").val();
        } else {
            $('#pass').removeClass('good');
            $('#pass').addClass('bad');
        }
    });

    $("#passtwice").change( function(){
        pass2 = isValid("#pass2", '^[a-zA-Z0-9]+$');
        if(pass2){
            $('#passtwice').removeClass('bad');
            $('#passtwice').addClass('good');
            pass3 = $("#passtwice").val();
        } else {
            $('#passtwice').removeClass('good');
            $('#passtwice').addClass('bad');
        }
    });

    $("#passtwice").change( function (){
        if (pass1 != pass3){
            $('#passtwice').removeClass('good');
            $('#passtwice').addClass('bad');
        }
        else {
            $("#informationPass11").text ("");

        }
    });
    $("#pass").change( function (){
        if (pass1 != pass3){
            $('#passtwice').removeClass('good');
            $('#passtwice').addClass('bad');
        }
        else {
            $('#passtwice').removeClass('bad');
            $('#passtwice').addClass('good');
        }
    });


    $("#email").change( function(){
        email = isValid("#email", '[a-zA-Zа-яА-ЯёЁ_\\d][-a-zA-Zа-яА-ЯёЁ0-9_\\.\\d]*\\@[a-zA-Zа-яА-ЯёЁ\\d][-a-zA-Zа-яА-ЯёЁ\\.\\d]*\\.[a-zA-Zа-яА-Я]{2,6}$');
        if(email){
            $("#email").keyup(function data () {
                let email = $("#email").val();
                $.ajax ({
                    type: "POST",
                    url: "checkEmail.php",
                    cache: false,
                    data: {"email": email},
                    dataType: "html",
                    success: function (response){
                        if(response == 'failEmail'){
                            $('#email').removeClass('good');
                            $('#email').addClass('bad');
                        } else {
                            $('#email').removeClass('bad');
                            $('#email').addClass('good');
                        }
                    }
                });
            });
        } else {
            $('#email').removeClass('good');
            $('#email').addClass('bad');
        }
    });
});