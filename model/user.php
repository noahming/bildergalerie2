<?php

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
?>