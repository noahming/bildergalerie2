function resetForm() {
    var reset = confirm("Wollen sie wirklich alles zurücksetzten?", "Nein ", "Ja");
    if (reset) {
        location.reload();
    }
    return reset;
}
function checkForm(){
    var passwordValid = false;
    var passwordMatch = false;
    var chars = ["(",")","[","]","{","}","?","!","$","%","&","/","=","*","+","~",",",".",";",":","<",">","-","_"];
    $.each(chars, function(index, value) {
        if(!($('#pw').val().indexOf(value) === -1)){
            containChar = true;
        }
    });
    if(RegExp('^(?=.*[A-Z])(?=.*[a-z]).{9,}$').test($('#pw').val()) && containChar == true) {
        passwordValid = true;
    }
    if($('#pw2').val() == $('#pw').val() && $('#pw2').val() != "") {
        passwordMatch = true;
    }
    if(passwordValid && passwordMatch){
        return true;
    }
    else{
        $('#errorDiv').addClass("errorDiv");
        var el     = $('#errorDiv');
        el.before( el.clone(true) ).remove();
        return false;
    }
}
function newComment(){
    updateForm();
    return true;
}