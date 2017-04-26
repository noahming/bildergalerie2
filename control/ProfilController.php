<?php
include_once 'view/profil.php';
require_once 'model/user.php';
require_once 'model/connection.php';

if (isset($_POST['btnSaveProfile'])){

    $controllerObject = new ProfilController();
    $controllerObject->saveProfile();
}
if (isset($_POST['btnDeleteProfile'])) {
    $controllerObject = new ProfilController();
    $controllerObject->deleteProfile();
}

class ProfilController
{
    function saveProfile()
    {
        $uid = $_SESSION['uid'];
        $password = md5($_POST['password']);
        $password2 = md5($_POST['passwordRepetition']);
        $mysqli = makeConnection();

        if ($password == $password2) {
            pwUpdate($mysqli, $uid, $password);
            header('Location: index.php');
        } else {
            echo("<a class=\"validationError\" style='display: inline'></br>Es gibt bereits ein Benutzerkonto mit der von ihnen angegebenen Email Adresse</a></br>");
        }
    }

    function deleteProfile()
    {
        $mysqli = makeConnection();
        $uid = $_SESSION['uid'];
        userDelete($mysqli, $uid);
        session_destroy();
        die();
        header('Location: index.php');
    }
}
?>
