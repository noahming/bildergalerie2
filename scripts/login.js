/*
window.onload = function () {
        var emailok = false;
     var pwok = false;
     var pwwdhok = false;
    'use strict';
    if (QueryString.goto === "reg") {
        btn_registrieren_onclick();
    }
};
*/
function QueryString() { //Diese Funktion ist von http://stackoverflow.com/questions/979975/how-to-get-the-value-from-the-get-parameters kopiert.
    var query_string = {};
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (typeof query_string[pair[0]] === "undefined") {
            query_string[pair[0]] = decodeURIComponent(pair[1]);
        } else if (typeof query_string[pair[0]] === "string") {
            var arr = [query_string[pair[0]], decodeURIComponent(pair[1])];
            query_string[pair[0]] = arr;
        } else {
            query_string[pair[0]].push(decodeURIComponent(pair[1]));
        }
    }
    return query_string;
}

/*window.onload = function load(){
    if(QueryString()['registrieren']){
       
    }  
}*/

function btnHideLogin() {
    //Zusätzliche Elemente für Registrierung einblenden und Design anpassen
    document.getElementById("loginForm").style.display = "none";
    document.getElementById("registerForm").style.display = "block";
    document.getElementById('contentContainer').style.background = "lightblue";

};

function btnHideRegistration() {
    //Elemente für Registrierung ausblenden und Design anpassen
    document.getElementById("registerForm").style.display = "none";
    document.getElementById("loginForm").style.display = "block";
    document.getElementById('contentContainer').style.background = "#eae672";
};
/*
function emailCheck() {
    var email;
    var regexEmail = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;

    if (document.getElementById("registerForm").style.display == "none" || document.getElementById("registerForm").style.display == "") {
        email = document.forms["loginForm"]["email"].value;
    }
    else {
        email = document.forms["registerForm"]["email"].value;
    }

    // email korrekt ausgefüllt?
    if (email == "" | email == null | regexEmail.test(email) != true) {
        document.getElementById('emailError').style.display = "inline";
        return false;
    }
    else {
        document.getElementById('emailError').style.display = "none";
        return true;
    }
}
function passwordCheck(password) {
    //wenn man sich auch dem Registrations FOrmular befindet
    var passwordvalid = false;
/*    if (document.getElementById("registerForm").style.display == "none" || document.getElementById("registerForm").style.display == "") {
        password = document.forms["loginForm"]["password"].value;
    }
    else {
        password = document.forms["registerForm"]["password"].value;
    }

    //Kleinbuchstaben enthalten?
    if (password.match(/[a-z]/)) {
        //Grossbuchstaben enthalten?
        if (password.match(/[A-Z]/)) {
            //Nummer enthalten?
            if (password.match(/[0-9]/)) {
                //Sonderzeichen enthalten?
                if (password.match(/[?!$%&/=<>_]/)) {
                    //Lang genug?
                    if (password.length >= 8) {
                        passwordvalid = true;
                    }
                }
            }
        }
    }

    var pwError = document.getElementById('passwordError');
    var pwUpdateError = document.getElementById('updatePasswordError');
//entspricht Passwort den Vorgaben?
    if (passwordvalid == true) {
        if (pwError != null) {
            pwError.style.display = "none";
        }
        if (pwUpdateError != null){
            pwUpdateError.style.display = "none";
        }
        return true;
    }
    else {
         if (pwError != null) {
            pwError.style.display = "inline";
        }
        if (pwUpdateError != null){
            pwUpdateError.style.display = "inline";
        }
        return false;
    }
}

function passwordRepetitionCheck(password1,password2) {
    var pwUpdateError = document.getElementById('updatePasswordError');

    if (password1 == password2) {
        if (pwUpdateError == null){
            document.getElementById('password2Error').style.display = "none";

        }else{
          document.getElementById('updatePassword2Error').style.display = "none";
  
}
        return true;
    }
    else {
        if (pwUpdateError == null){
            document.getElementById('password2Error').style.display = "inline";

        }else{
                   document.getElementById('updatePassword2Error').style.display = "inline"; 
        }
        return false;
    }
}

function activateSubmit(password1,password2) {
var btnRegistration = document.getElementById('btnRegistration');
if(btnRegistration != null){
    if (emailCheck() && passwordCheck(password1) && passwordRepetitionCheck(password1,password2)) {
        document.getElementById('btnLogin').disabled = false;
        document.getElementById('btnLogin').style.cursor = "pointer"
        }

    }
else{
    if (passwordCheck(password1) && passwordRepetitionCheck(password1,password2)) {

        document.getElementById('btnSaveProfile').disabled = false;
        document.getElementById('btnSaveProfile').style.cursor = "pointer";
        }


    }
}
*/
