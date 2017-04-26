<?php
require_once 'model/connection.php';
require_once 'model/user.php';
require_once 'model/galery.php';
require_once 'model/image.php';
if (isset($_POST['btnAddGalery'])){
    $controllerObject = new GaleryController();
    $controllerObject->galeryUpload();
}
if(isset($_POST['btnAddImage'])){
    $controllerObject = new GaleryController();
    $controllerObject->imageUpload();
}
class GaleryController{
    function allGaleries(){
        $mysqli = makeConnection();
        require_once 'view/allGaleries.php';
    }
    function myGaleries(){
        $mysqli = makeConnection();
        require_once 'view/myGaleries.php';
    }
    function addGalery(){
        $mysqli = makeConnection();
        require_once 'view/new.php';

    }
    function galeryUpload(){
        $mysqli = makeConnection();
        if(isset($_POST['name'])){
            echo'';
            $name = $_POST['name'];
            if(isset($_POST['isPublic'])){
                $public = 1;
            }
            else {
                $public = 0;
            }

            insertGalery($mysqli, $name, $_SESSION['uid'], $public);
            echo '<script type="text/javascript">window.onload = function onload(){
        alert("Hinzufügen erfolgreich");}</script>';
        }
        else {
            echo '<script type="text/javascript">window.onload = function onload(){
        alert("Hinzufügen fehlgeschlagen");
        window.location.href = \'index.php\'
        }</script>';
        }

    }
    function imageUpload(){
        $mysqli = makeConnection();
        if(isset($_POST['descr'])){
            $descr = $_POST['descr'];
        }
        else {
            $descr = "";
        }

        if (array_key_exists('img',$_FILES)) {
            echo 'xx';
            $type = $_FILES['img']['type'];
            $gid = $_POST['gid'];

            $upload_folder = 'images/'; //Das Upload-Verzeichnis
            $filename = pathinfo($_FILES['img']['name'], PATHINFO_FILENAME);
            $extension = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));


            //Überprüfung der Dateiendung
            $allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
            if(!in_array($extension, $allowed_extensions)) {
                echo "extension = $extension";
                die("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
            }

            //Überprüfung der Dateigröße
            $max_size = 5000*1024; //500 KB
            if($_FILES['img']['size'] > $max_size) {
                die("Bitte keine Dateien größer 500kb hochladen");
            }

            //Überprüfung dass das Bild keine Fehler enthält
            if(function_exists('exif_imagetype')) { //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
                $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
                $detected_type = exif_imagetype($_FILES['img']['tmp_name']);
                if(!in_array($detected_type, $allowed_types)) {
                    die("Nur der Upload von Bilddateien ist gestattet");
                }
            }

            //Pfad zum Upload
            $new_path = $upload_folder.$filename.'.'.$extension;

            //Neuer Dateiname falls die Datei bereits existiert
            if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
                $id = 1;
                do {
                    $new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
                    $id++;
                } while(file_exists($new_path));
            }

            //Alles okay, verschiebe Datei an neuen Pfad
            move_uploaded_file($_FILES['img']['tmp_name'], $new_path);
            echo 'Bild erfolgreich hochgeladen: <a href="'.$new_path.'">'.$new_path.'</a>';
            insert_image($mysqli, $gid, $filename, $extension, $type, $descr);
            echo '<script type="text/javascript">
                    window.onload = function onload () {
                    window.location.href=images'.$gid.'
                    }
                </script>';

        }
        else{
            echo 'error for noah';
        }
    }
}
?>