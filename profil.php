<?php
$profilInfo = select_user_by_email($mysqli, $_SESSION['email']);
?>
<div id="contentContainer">
<form id="updateProfile" method="post">
<h1>Profil bearbeiten</h1>
<h2 name="email"><?php echo $profilInfo[0]['email']; ?>:</h2></br>
<input name="password" type="password" placeholder="neues Passwort" onkeyup="passwordCheck(document.forms['updateProfile']['password'].value); activateSubmit(document.forms['updateProfile']['password'].value, document.forms['updateProfile']['passwordRepetition'].value);"/>
<a class="validationError" id="updatePasswordError"></br>Das Passwort muss zwischen 8 und 20 Zeichen lang
                    sein, Gross-, Kleinbuchstaben, Zeichen(?!$%&/=<>_) und Zahlen enthalten.</a>
<input name="passwordRepetition" type="password" placeholder="neues Passwort wiederholen" onkeyup="passwordRepetitionCheck(document.forms['updateProfile']['password'].value, document.forms['updateProfile']['passwordRepetition'].value); activateSubmit(document.forms['updateProfile']['password'].value, document.forms['updateProfile']['passwordRepetition'].value);"/></br>
                <a class="validationError" id="updatePassword2Error"></br>Die Passwörter stimmen nicht Überein!</a></br>

        <button name="btnDeleteProfile">
        Lösche Profil
        </button>
        <button name="btnSaveProfile" id="btnSaveProfile" disabled>
            Speichern
        </button>
        </form>
        </div>
        <?php
if (isset($_POST['btnSaveProfile'])) {
    $id = $_SESSION['uid'];
    $password = md5($_POST['password']);
    $password2 = md5($_POST['passwordRepetition']);

        if ($password == $password2) {
            update_user($mysqli, $id, $password);
            header ('Location: index.php');
        }
        else{
            echo("<a class=\"validationError\" style='display: inline'></br>Es gibt bereits ein Benutzerkonto mit der von ihnen angegebenen Email Adresse</a></br>");
        }

}
if (isset($_POST['btnDeleteProfile'])) {
    $uid = $_SESSION['uid'];
    delete_user($mysqli, $uid);
    session_destroy();
    header('Location: index.php');
    die();
}
?>