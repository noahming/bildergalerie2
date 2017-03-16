<?php 
    include "config.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $galery = select_galery_by_id($mysqli, $_GET['id']);
                            if($galery[0]['uid'] != $_SESSION['uid']){
                        echo '<script type="text/javascript">window.onload = function onload(){
                            alert("Kein Zugriff");
                            window.location.href = \'index.php\'
                            }</script>';
                        }
        else{
        
        delete_galery($mysqli, $id);
        echo '<script type="text/javascript">window.onload = function onload(){
        alert("erfolgreich gelöscht");
        window.location.href = \'index.php\'
        }</script>';
    }
    }
    else {
          echo '<script type="text/javascript">window.onload = function onload(){
                alert("Löschen fehlgeschlagen");
                window.location.href = \'index.php\'
                }</script>';
                
    
    }

?>