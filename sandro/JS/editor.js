$(document).ready(function(){
    $(document).keydown(function(e) {updateForm();});
});
function exec(ExecCommand){
    document.execCommand(ExecCommand, false);
    updateForm();
}
function formatblock(format){
    {
        document.execCommand('formatBlock', false, format);
        updateForm();
    }
}
function updateForm(){
    console.log("changed");
    $('#contentArea').val($('.editor').html());
}
function createLink() {
    var url = document.getElementById("url").value;
    if(url == ""){
        $('#errorDiv').addClass("errorDiv");
        var el     = $('#errorDiv');
        el.before( el.clone(true) ).remove();
    }
    else{
        if(!(url.substring(0,8)=="https://" || url.substring(0,7)=="http://")){
            url = "https://"+url;
        }
        document.execCommand("CreateLink", false, url);
        updateForm();
    }
}
function unlink(){
    document.execCommand("unlink", false, false);
    updateForm();
}