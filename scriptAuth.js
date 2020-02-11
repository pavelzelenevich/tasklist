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
var email = false;

$(document).ready(function() {

    $("#email").change( function(){
        email = isValid("#email", '[a-zA-Zа-яА-ЯёЁ_\\d][-a-zA-Zа-яА-ЯёЁ0-9_\\.\\d]*\\@[a-zA-Zа-яА-ЯёЁ\\d][-a-zA-Zа-яА-ЯёЁ\\.\\d]*\\.[a-zA-Zа-яА-Я]{2,6}$');
        if(email){
            $('#email').removeClass('bad');
            $('#email').addClass('good');
        } else {
            $('#email').removeClass('good');
            $('#email').addClass('bad');
        }
    });

    $("#pass").change( function(){
        pass = isValid("#pass", '^[a-zA-Z0-9]+$');
        if(pass){
            $('#pass').removeClass('bad');
            $('#pass').addClass('good');
        } else {
            $('#pass').removeClass('good');
            $('#pass').addClass('bad');
        }
    });
});