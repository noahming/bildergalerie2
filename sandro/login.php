<?php
    include 'config.php';
    if(isset($_SESSION['UID'])){header('Location: index.php?error=1');}
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="CSS/mycss2.css" />

    </head>
    <body>
        <div>
            <?php
            if(isset($_GET['error'])){
                switch ($_GET['error']){
                    case "1":
                        printError("Der Benutzername / Das Passwort is falsch");
                        break;
                    case "2":
                        printError("Bitte Loggen Sie sich zuerst ein.");
                        break;
                    default:
                        printError("Eine Fehlermeldung mit dieser Nummer existiet nicht. Sorry");
                }
            }
            ?>
        <form id="form" action="index.php" method="POST">
                <table class="horizontal-center">
                    <tr>
                        <td id="formular">
                            <h1>Einlogen</h1>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Username:</h4>
                            <input class="form-control btn-default" type="text" name="username" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Passwort:</h4>
                            <input type="password" id="pw" name='password' required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="register.php">Sie haben noch keinen Account?</a>
                            <table id="proceedBtn" style="width:100%">
                                <tr>
                                    <div>
                                        <td><input style="width:100%" class=" right" type="submit" name='action' id='action' value="Einlogen"></td>
                                        <td><input style="width:100%" class=" right" type="submit" onclick="location = 'index.php';return false;" id="action" name='action' value="Zur&uuml;ck"></td>
                                    </div>
                                </tr>
                            </table>
                        </td>
                        <td>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

