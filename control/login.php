<?php
require_once 'config.php';

if (isset($_POST['btnRegistration'])) {
    $email = $_POST['registrationEmail'];
    $password = md5($_POST['password']);
    $password2 = md5($_POST['passwordRepetition']);
    $userExists = userExist($mysqli, $email);
    if (!$userExists) {
        if ($password == $password2) {
            insert_user($mysqli, $email, $password);
        }
    } else {
        echo("<a class=\"validationError\" style='display: inline'></br>Es gibt bereits ein Benutzerkonto mit der von ihnen angegebenen Email Adresse</a>
                              <script type='text/javascript'>btnHideLogin();</script>");
    }
}




/*wenn button mit name regist gedrückt wird, wird ausgeführt*/
if (isset($_POST['btnLogin'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $emailCorrect = userExist($mysqli,$email);
    $passwordCorrect = is_auth($mysqli, $email, $password);
    if($emailCorrect){
        if ($passwordCorrect){
            echo 'yeah';
            $_SESSION['email'] = $email;
            $user = select_user_by_email($mysqli,$email);
            $_SESSION['uid'] = $user[0]['id'];
            header('Location: index.php');

        }
        else{
            header('Location: meldung.php?m=1');

        }
    }
    else{
        header('Location: meldung.php?m=1');

    }
}



?>