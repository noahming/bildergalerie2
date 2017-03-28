<?php
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
