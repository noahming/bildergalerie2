@@ -21,27 +21,31 @@ function connection_ok($mysqli) {
    }
}

//*************************************************************************//
//                        Tabelle benutzer                                 //
//*************************************************************************//

// Überprüft das Passwort eines Benutzers in der Datenbank
function is_auth($mysqli, $email, $pass) {
function is_auth($mysqli, $email, $password) {

    if($result = $mysqli->query("SELECT benutzer.passwort FROM user WHERE benutzer.email = '$email' LIMIT 1;")) {
        $row = mysqli_fetch_array($result);
        if (password_verify($pass, $row['passwort'])) {
            return true;
    if($result = $mysqli->query("SELECT passwort FROM benutzer WHERE email = '$email' LIMIT 1;")) {

        while ($row = mysqli_fetch_array($result)) {
            if($row[0] == $password){
                return true;
            }
        }
        else {
            return false;
        }
    }
    else {
        return false;
    else{
          return false;
  
    }
    return false;
}

function userExist($mysqli)
//prüft ob user bereits in der db existiert
function userExist($mysqli, $email)
{
    $email = $_POST['email'];
    $dbEmail = select_users($mysqli);
    foreach ($dbEmail as $emailRow) {
        if ($email == $emailRow[0]) {
@@ -51,10 +55,51 @@ function userExist($mysqli)
    return false;
}

//ändert das Passwort nach belieben
function update_user($mysqli, $id, $password) {
    $mysqli->query("UPDATE benutzer SET passwort='$password' where id=$id");
    
}
//neuer Benutzer wird erstellt
function insert_user($mysqli, $email, $passwd) {
    $mysqli->query("INSERT INTO benutzer(email, passwort) VALUES ('$email', '$passwd');");  
}

//gibt die Namen der existierenden User aus
function select_users($mysqli) {

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
function select_user_by_email($mysqli, $email) {

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
//*************************************************************************//
//                        Tabelle bilder                                   //
//*************************************************************************//
// Gibt ein Array der neuesten Einträge zurück.
function select_images($mysqli) {

@@ -72,8 +117,13 @@ function select_images($mysqli) {
    }
}

function insert_image($mysqli, $gid, $name, $endung ,$type, $descr) {
    $mysqli->query("INSERT INTO bilder(gid, pfad, endung, bildtyp, beschreibung) VALUES ($gid, '$name', '$endung', '$type', '$descr');");
    
}

// Gibt ein Array der neuesten Einträge zurück.

// Gibt ein Array der eigenen neuesten Einträge zurück.
function select_images_by_gid($mysqli, $gid) {

    if ($result = $mysqli->query("SELECT * FROM bilder WHERE gid = $gid")) {
@@ -97,41 +147,13 @@ function delete_entry($mysqli, $id)
}


//*************************************************************************//
//                        Tabelle galerien                                 //
//*************************************************************************//



//gibt die Namen der existierenden User aus
function select_users($mysqli) {

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

function select_user_by_email($mysqli, $email) {

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
//gibt alle galeries eines users aus

function select_galeries_by_user($mysqli, $uid) {

@@ -149,6 +171,7 @@ function select_galeries_by_user($mysqli, $uid) {
                }
}

<<<<<<< HEAD
function select_public_galeries_by_user($mysqli, $uid) {

    if ($result = $mysqli->query("SELECT * FROM galerie WHERE uid = $uid and istPublik = 1")) {
@@ -186,6 +209,8 @@ function insert_image($mysqli, $gid, $name, $endung ,$type, $descr) {
    
}

=======
>>>>>>> origin/master
function insert_galery($mysqli, $name, $uid, $public) {
    $mysqli->query("INSERT INTO galerie(name, uid, istPublik) VALUES ('$name', $uid, $public)");
    
@@ -205,13 +230,4 @@ function delete_galery($mysqli, $id) {
    $mysqli->query("DELETE FROM galerie where id = $id;"); 
    
}

function insert_user($mysqli, $email, $passwd) {
    $mysqli->query("INSERT INTO benutzer(email, passwort) VALUES ('$email', '$passwd');");

    
}



?>