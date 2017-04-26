<?php
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
function imagesByGalery($mysqli, $gid) {

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
?>