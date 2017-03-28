<?php

//stellt die Verbingung mit der DB her
function make_connection()
{
	$servername = "localhost";
	$username = "bildergalerie";
	$password = "gibbiX12345";
	$dbname = "bildergalerie";
	$conn = new mysqli($servername, $username, $password,$dbname);
	return $conn;
}

// Überprüfen ob DB-Verbindung i.O. ist
function connection_ok($mysqli) {
    if ($mysqli->connect_errno) {
        return false;
    }
    else {
        return true;
    }
}

//*************************************************************************//
//                        Tabelle benutzer                                 //
//*************************************************************************//

// Überprüft das Passwort eines Benutzers in der Datenbank
function pwCorrect($mysqli, $email, $password) {
        $email = $mysqli->escape_string($email);
        $password = $mysqli->escape_string($password);

    if($result = $mysqli->query("SELECT passwort FROM benutzer WHERE email = '$email' LIMIT 1;")) {
        
        while ($row = mysqli_fetch_array($result)) {
            if($row[0] == $password){
                return true;
            }
        }
            return false;
    }
    else{
          return false;
  
    }
}

//prüft ob user bereits in der db existiert
function userExist($mysqli, $email)
{
    $email = $mysqli->escape_string($email);
    $dbEmail = select_users($mysqli);
    foreach ($dbEmail as $emailRow) {
        if ($email == $emailRow[0]) {
            return true;
        }
    }
    return false;
}

//ändert das Passwort nach belieben
function pwUpdate($mysqli, $id, $password) {
    $password = $mysqli->escape_string($password);
    $mysqli->query("UPDATE benutzer SET passwort='$password' where id=$id");
    
}
//neuer Benutzer wird erstellt
function userInsert($mysqli, $email, $passwd) {
    $email = $mysqli->escape_string($email);
    $passwd = $mysqli->escape_string($passwd);
    $mysqli->query("INSERT INTO benutzer(email, passwort) VALUES ('$email', '$passwd');"); 
    $uid = select_user_by_email($mysqli, $email);
    $uid = $uid[0]['id'];
    insert_galery($mysqli, "Stadard", $uid, 0);
}

//gibt die Namen der existierenden User aus
function allUsers($mysqli) {

    if ($result = $mysqli->query("SELECT email FROM benutzer")) {

        $entries = array();
                       while ($entry = mysqli_fetch_array($result)) {
                        array_push($entries, $entry);
                    }
                    $result->close();
                    return $entries;
                }
                else {
                    return NULL;
                }
}
//gibt user mit bestimmter email adresse aus (brauchen wir das?)
function userByEmail($mysqli, $email) {
    $email = $mysqli->escape_string($email);
    if ($result = $mysqli->query("SELECT * FROM benutzer WHERE email = '$email'")) {

        $entries = array();
                       while ($entry = mysqli_fetch_array($result)) {
                        array_push($entries, $entry);
                    }
                    $result->close();
                    return $entries;
                }
                else {
                    return NULL;
                }
}

//Löscht user anhand von $uid
function userDelete($mysqli, $uid)
{
    $result = $mysqli->query("SELECT id FROM galerie where uid = '$uid' LIMIT 1;");
    $id = mysqli_fetch_array($result);
    $mysqli->query("DELETE FROM bilder where gid = '$id[0]';");

    $mysqli->query("DELETE FROM galerie where uid = '$uid';");
    $mysqli->query("DELETE FROM benutzer WHERE id = '$uid';");
}
//*************************************************************************//
//                        Tabelle bilder                                   //
//*************************************************************************//
// Gibt ein Array der neuesten Einträge zurück.
function newImages($mysqli) {

    if ($result = $mysqli->query("SELECT * FROM bilder")) {

        $entries = array();
        while ($entry = mysqli_fetch_array($result)) {
            array_push($entries, $entry);
        }
        $result->close();
        return $entries;
    }
    else {
        return NULL;
    }
}


function imagesByUser($mysqli, $uid ,$gid) {

    if ($result = $mysqli->query("SELECT * FROM bilder WHERE gid = $gid")) {

        $entries = array();
        while ($entry = mysqli_fetch_array($result)) {
            array_push($entries, $entry);
        }
        $result->close();
        return $entries;
    }
    else {
        return NULL;
    }
}

// Gibt ein Array der Bilder aus einerGalerie zurück.
function imagesByUserGalery($mysqli, $gid) {

    if ($result = $mysqli->query("SELECT * FROM bilder WHERE gid = $gid")) {

        $entries = array();
        while ($entry = mysqli_fetch_array($result)) {
            array_push($entries, $entry);
        }
        $result->close();
        return $entries;
    }
    else {
        return NULL;
    }
}
//gibt bilder anhand von id zurück
function imageById($mysqli, $bid) {

    if ($result = $mysqli->query("SELECT * FROM bilder WHERE id = $bid")) {

        $entries = array();
        while ($entry = mysqli_fetch_array($result)) {
            array_push($entries, $entry);
        }
        $result->close();
        return $entries;
    }
    else {
        return NULL;
    }
}

// zum löschen der Einträge
function deleteImage($mysqli, $id)
{
	$mysqli->query("DELETE FROM bilder WHERE id = '$id'");
}
//ändere Beschreibung eines bildes
function update_image($mysqli,$id,$beschreibung){
        $email = $mysqli->escape_string($email);
        $mysqli->query("UPDATE bilder SET beschreibung='$beschreibung' where id=$id");

}


//*************************************************************************//
//                        Tabelle galerien                                 //
//*************************************************************************//



//gibt alle galeries eines users aus

function select_galeries_by_user($mysqli, $uid) {

    if ($result = $mysqli->query("SELECT * FROM galerie WHERE uid = $uid")) {

        $entries = array();
                       while ($entry = mysqli_fetch_array($result)) {
                        array_push($entries, $entry);
                    }
                    $result->close();
                    return $entries;
                }
                else {
                    return NULL;
                }
}



function select_public_galeries_by_user($mysqli, $uid) {

    if ($result = $mysqli->query("SELECT * FROM galerie WHERE uid = $uid and istPublik = 1")) {

        $entries = array();
                       while ($entry = mysqli_fetch_array($result)) {
                        array_push($entries, $entry);
                    }
                    $result->close();
                    return $entries;
                }
                else {
                    return NULL;
                }
}

function select_galery_by_id($mysqli, $id) {

    if ($result = $mysqli->query("SELECT * FROM galerie WHERE id = $id")) {

        $entries = array();
                       while ($entry = mysqli_fetch_array($result)) {
                        array_push($entries, $entry);
                    }
                    $result->close();
                    return $entries;
                }
                else {
                    return NULL;
                }
}

function insert_image($mysqli, $gid, $name, $endung ,$type, $descr) {
    $descr = $mysqli->escape_string($descr);
    $mysqli->query("INSERT INTO bilder(gid, pfad, endung, bildtyp, beschreibung) VALUES ($gid, '$name', '$endung', '$type', '$descr');");
    
}


function insert_galery($mysqli, $name, $uid, $public) {
    $name = $mysqli->escape_string($name);
    $mysqli->query("INSERT INTO galerie(name, uid, istPublik) VALUES ('$name', $uid, $public)");
    
}

function update_galery($mysqli, $id, $name, $public) {
    $name = $mysqli->escape_string($name);
    $mysqli->query("UPDATE galerie SET name='$name', istPublik= $public where id=$id");
    
}
function update_galery_privat($mysqli, $id, $name) {
    $name = $mysqli->escape_string($name);
    $mysqli->query("UPDATE galerie SET name='$name', istPublik=0 where id=$id");
    
}

function delete_galery($mysqli, $id) {
    $mysqli->query("DELETE FROM bilder where gid = $id;");
    $mysqli->query("DELETE FROM galerie where id = $id;"); 
    
}
?>
