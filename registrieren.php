<?php 
    session_start();
    include "lib_dbfunctions.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"> <!-- Definition des Charsets -->
    
    
    <!-- Icon der Seite -->
    <title>Logbuch</title><!-- Titel der Seite -->
</head>
    <body>
        <?php
        $mysqli = @mysqli_connect("localhost", "logbuch", "gibbiX12345", "logbuch");
        if (!$mysqli) {    
            echo "Datenbank nicht erreich!";
            exit(1);
        }
        else {
            if (!isset($_POST['email']) || $_POST['email'] == "" ) {
                $_SESSION['e'] = 1;
                $_POST['goto'] = "reg";
                echo '<meta http-equiv="refresh" content="0; URL=login_logbuch.php?goto=reg&e=1&email='. $_POST['email'].'" >';
                exit(1);
        }
        else {
            $mysqli = new mysqli("localhost", "logbuch", "gibbiX12345", "logbuch");
            $entries = select_users($mysqli);
            $vorhanden = false;
            foreach ($entries as $entry) {
            if ($entry[0] == $_POST['email']) {
                $vorhanden = true;
            }                  
        }            
            if ($vorhanden == true) {
                $_SESSION['e'] = 5;
                $_SESSION['email'] = $_POST['email'];
                echo '<meta http-equiv="refresh" content="0; URL=login_logbuch.php?goto=reg&e=5&email='. $_POST['email'].'">';
                exit(1);
            }
        }
        $passwd = $_POST['passwort'];
        if ( !preg_match('^\w+([\.\-]?\w+)*@\w+([\.\-]?\w+)*(\.\w{2,3})+$^', $_POST['email']) ) {
            $_SESSION['e'] = 6;
            $_SESSION['email'] = $_POST['email'];
            echo '<meta http-equiv="refresh" content="0; URL=login_logbuch.php?goto=reg&e=6&email='. $_POST['email'].'">';
            exit(1);
        }        
        if (!isset($_POST['passwort']) || $_POST['passwort'] == "") { 
            $_SESSION['e'] = 2;
            $_SESSION['email'] = $_POST['email'];
            echo '<meta http-equiv="refresh" content="0; URL=login_logbuch.php?goto=reg&e=2&email='. $_POST['email'].'">';
            exit(1);
            }
        
        if (strlen($_POST['passwort']) < 8) {
            $_SESSION['e'] = 7;
            $_POST['goto'] = "reg";
            echo '<meta http-equiv="refresh" content="0; URL=login_logbuch.php?goto=reg&e=7&email='. $_POST['email'].'">';
            exit(1);
        } 
        if (strlen($_POST['passwort']) > 20) {
            $_SESSION['e'] = 8;
            $_POST['goto'] = "reg";
            echo '<meta http-equiv="refresh" content="0; URL=login_logbuch.php?goto=reg&e=8&email='. $_POST['email'].'">';
            exit(1);
        }
        if (!preg_match('/^[+\-_,.:!?0-9a-zA-Z]*$/', $passwd)) {
            $_SESSION['e'] = 9;
            $_POST['goto'] = "reg";
            echo '<meta http-equiv="refresh" content="0; URL=login_logbuch.php?goto=reg&e=9&email='. $_POST['email'] .'"/>';
            exit(1);
        }
        if (((!preg_match('^/[0-9]+/^', $_POST['passwort'])) && (!preg_match('/[+\-_,.:!?]+/', $_POST['passwort'])) || (!preg_match('/[0-9]+/', $_POST['passwort'])) && (!preg_match('/[a-zA-Z]+/', $_POST['passwort'])) || (!preg_match('/[a-zA-Z]+/', $_POST['passwort'])) && (!preg_match('/[+\-_,.:!?]+/', $_POST['passwort']))) == false) {
            $_SESSION['e'] = 10;
            $_POST['goto'] = "reg";
            echo '<meta http-equiv="refresh" content="0; URL=login_logbuch.php?goto=reg&e=10&email="'. $_POST['email'] .'>';
            exit(1);
        }
        if (!isset($_POST['passwort_wiederholung']) || $_POST['passwort_wiederholung'] == "") { 
            $_SESSION['e'] = 3;
            $_POST['goto'] = "reg";
            echo '<meta http-equiv="refresh" content="0; URL=login_logbuch.php?goto=reg&e=3&email='. $_POST['email'].'">';
            exit(1);
        }        
        if ($_POST['passwort_wiederholung'] != $_POST['passwort']) { 
            $_SESSION['e'] = 4;
            $_POST['goto'] = "reg";
            echo '<meta http-equiv="refresh" content="0; URL=login_logbuch.php?goto=reg&e=4&email='. $_POST['email'].'">';
            exit(1);
        }
        insert_new_user($mysqli, $_POST['email'], $_POST['passwort']);
        echo '<meta http-equiv="refresh" content="0; URL=login_logbuch.php?email='. $_POST['email'].'">';  
        header("Location: message.php?m=2&email=" . $_POST['email']);
        }  
        
        
        ?>
    </body>
</html>
         