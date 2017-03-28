<script type='text/javascript' src='scripts/login.js'></script>
<link rel='stylesheet' href='view/css/login.css'/>
<?php
require_once 'model/user.php';
require_once 'view/login.php';

if (isset($_POST['btnRegistration'])) {
    $email = $_POST['registrationEmail'];
    $password = md5($_POST['password']);
    $password2 = md5($_POST['passwordRepetition']);
    $userExists = userExist($mysqli, $email);
    if (!$userExists) {
        if ($password == $password2) {
            userInsert($mysqli, $email, $password);
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
    $passwordCorrect = pwCorrect($mysqli, $email, $password);
    if($emailCorrect){
        if ($passwordCorrect){
            $_SESSION['email'] = $email;
            $user = userByEmail($mysqli,$email);
            $_SESSION['uid'] = $user[0]['id'];
            $_GET['action'] = "login";

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