<?php

//stellt die Verbingung mit der DB her
function makeConnection()
{
    $servername = "localhost";
    $username = "bildergalerie";
    $password = "gibbiX12345";
    $dbname = "bildergalerie";
    $mysqli = new mysqli($servername, $username, $password,$dbname);
    if (connectionOk($mysqli)){
        return $mysqli;
    }
    else{
        echo 'Your Db connection is invalid';
    }
}

// Überprüfen ob DB-Verbindung i.O. ist
function connectionOk($mysqli) {
    if ($mysqli->connect_errno) {
        return false;
    }
    else {
        return true;
    }
}
?>