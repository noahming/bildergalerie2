<?php 
    include "config.php";
    if(isset($_GET['name'])){
        $name = $_GET['name'];
         if(isset($_GET['isPublic'])){
            $public = 1;
        }
        else {
            $public = 0;
        }
        
        insert_galery($mysqli, $name, $_SESSION['uid'], $public);
         echo '<script type="text/javascript">window.onload = function onload(){
        alert("Galerie wurde hinzugefügt");
        window.location.href = \'index.php\'
        }</script>';
        
    }
    else {
        echo '<script type="text/javascript">window.onload = function onload(){
        alert("Hinzufügen fehlgeschlagen");
        window.location.href = \'index.php\'
        }</script>';
    }

?>