<?php
        session_start();
        /*if (!isset($_GET['m'])){
            header("Location: logbuch.php");
        }*/
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"> <!-- Definition des Charsets -->
    <link rel="stylesheet" href="view/css/meldung.css"><!-- Einbinden der CSS Datei -->
    <!-- <link rel="icon" href="icon.png">--><!-- Icon der Seite -->
    <title>Login</title><!-- Titel der Seite -->
    
</head>

<body>

    <div id="div_wrappper_content"  style="width:600px;"    ><!-- umschliesst alle Inhalte des Logins / der Registrierung -->
        <div id="div_formular"><!-- umschliesst das Formular -->
            <form id="form" action="auth.php" style="width:600px;" method="post"><!-- anfang Formular -->
                <div id="div_titel">
                    <?php 
                        if (isset($_GET['m'])) {
                            if ($_GET['m'] == "1"){
                                echo '<h1 id=titel>Login fehlgeschlagen</h1>';
                            }
                            if ($_GET['m'] == "2"){                                         
                                echo '<h1 id=titel>Registrierung erfolgreich!</h1>';
                            }
                        
                            if ($_GET['m'] == "3"){                                        
                                echo '<h1 id=titel>Löschung erfolgreich!</h1>';
                            }
                            
                            if ($_GET['m'] == "4"){                                        
                                echo '<h1 id=titel>Unerlaubter Dateityp</h1>';
                            }
                        }
                    
                            else {
                                echo "keine meldung";
                                //header("Location: login_logbuch.php");
                                //exit(1);
 
                            }
                        ?>    
                </div>   
                    <?php 
                        if (isset($_GET['m'])) {
                            if ($_GET['m'] == "1"){

                                echo '<a id="message">Überprüfen sie ihre Angaben</a>' ;
                                echo '<div id="message2" class="div_message note" style="width:200px; height: 30px; background-color: lightgreen;" ><a class="txt_message" href="/ ">Nochmal versuchen</a></div>';
                            }
                            if ($_GET['m'] == "2"){
                                echo '<a id="message">Sie wurden erfolgreich registriert!</a>' ;
                                echo '<div id="message2" class="div_message note" style="width:200px; height: 30px; background-color: lightgreen;"><a class="txt_message" href="../?login'. $_GET['email'] . '">Login</a></div>';
                            }
                            if ($_GET['m'] == "3"){

                                echo '<a id="message">Ihr account wurde erfolgreich gelöscht</a>' ;
                            } 
                            
                            if ($_GET['m'] == "4"){

                                echo '<a id="message">Nur .jpg Dateien sind erlaubt</a>' ;
                            } 
                    }
                    ?>
                
                
                    <?php 
                        if (isset($_GET['m'])) {
                            if ($_GET['m'] == "1"){

                                echo '<a id="message3" style="display: inline;     ">Noch kein Mitglied?</a>' ;
                                echo '<div id="message4"  style="width: 130px; background-color: lightblue; margin-top: 10px;" class="div_message note" ><a class="txt_message" href="?registrieren">Registrieren</a></div>';
                            } 
                            
                             if ($_GET['m'] == "4"){

                               echo '<div id="message4"  style="width: 80px; background-color: lightblue; margin-top: 10px;" class="div_message note" ><a class="txt_message" href="?images">OK</a></div>';
                               
                            }   
                             
                            
                    }
                    ?>
                

            </form> <!-- Ende Formular -->
        </div>
    </div>


</body>
</html>