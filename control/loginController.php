<script type='text/javascript' src='scripts/login.js'></script>
<?php
include_once 'view/login.php';
require_once 'model/connection.php';
require_once 'model/user.php';

if (isset($_POST['btnLogin'])){
    $controllerObject = new LoginController();
    $controllerObject->login();
}
if (isset($_POST['btnRegist'])){
    $controllerObject = new LoginController();
    $controllerObject->regist();
}
class LoginController{

    function regist(){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $password2 = md5($_POST['password2']);
        $mysqli = makeConnection();
        $userExists = userExist($mysqli, $email);
        if (!$userExists) {
            if(!$password == ""){
                if ($password == $password2) {
                    userInsert($mysqli, $email, $password);
                }
            }
        } else {
            echo("<a class=\"validationError\" style='display: inline'></br>Es gibt bereits ein Benutzerkonto mit der von ihnen angegebenen Email Adresse</a>
                              <script type='text/javascript'>btnHideLogin();</script>");
        }
    }

    function login(){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $mysqli = makeConnection();
        $emailCorrect = userExist($mysqli,$email);
        $passwordCorrect = pwCorrect($mysqli, $email, $password);
        if($emailCorrect){
            if ($passwordCorrect){
                echo 'hii';
                $_SESSION['email'] = $email;
                $user = userByEmail($mysqli,$email);
                $_SESSION['uid'] = $user[0]['id'];
                echo $_SESSION['uid'];
                header( 'Location: index.php');
            }
            else{
                header('Location: meldung.php?m=1');
            }
        }
        else{
            header('Location: meldung.php?m=1');

        }
    }

    function logout(){
        session_destroy();
        die();
        header('Location: index.php');
    }
}
?>