<?php 
    include "config.php";
    if(isset($_GET['name']) && isset($_GET['id'])){
        $name = $_GET['name'];
        $id = $_GET['id'];
                            $galery = select_galery_by_id($mysqli, $_GET['id']);
                            if($galery[0]['uid'] != $_SESSION['uid']){
                        echo '<script type="text/javascript">window.onload = function onload(){
                            alert("Kein Zugriff");
                            window.location.href = \'index.php\'
                            }</script>';
                        } else {
                        
        if(isset($_GET['isPublic'])){
            $public = 1;
            update_galery($mysqli, $id, $name, $_SESSION['uid'], $public);
        }
        else {
            $public = 0;
            update_galery_privat($mysqli, $id, $name, $_SESSION['uid']);
        }
        echo $public;
        
        
       echo '<script type="text/javascript">window.onload = function onload(){
               alert("Ihre Änderungen wurden gespeichert");
               window.location.href = \'index.php\'
            }</script>';
        
    }}
    else {
        
        echo 'error';
        echo '<script type="text/javascript">window.onload = function onload(){
        alert("Speichern fehlgeschlagen");
        window.location.href = \'index.php\'
        }</script>';
    }
    

?>