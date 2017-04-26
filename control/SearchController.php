<?php
require_once 'model/connection.php';
require_once 'model/user.php';
require_once 'model/galery.php';
require_once 'model/image.php';
require_once 'view/search.php';

if (isset($_POST['btnSearchUser'])){
    echo 'xx';
    $controllerObject = new SearchController();
    $controllerObject->searchUser();
}
if(isset($_POST['btnSearchGalery'])){
    $controllerObject = new SearchController();
    $controllerObject->searchGalery();
}
class SearchController{
    function searchUser(){
        $mysqli = makeConnection();
        $user = userByEmail($mysqli, $_POST['email']);
        $_GET['uid'] = $user[0]['id'];
    }
    function searchGalery(){
        $mysqli = makeConnection();
        $galery = galeryByName($mysqli, $_POST['email']);
        $_GET['gid'] = $galery['id'];
    }
}
?>