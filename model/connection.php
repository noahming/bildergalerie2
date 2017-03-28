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
?>