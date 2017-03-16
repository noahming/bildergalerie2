<?php
    include 'config.php';
    if(isset($_SESSION['UID'])){header('Location: index.php?error=2');}
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="CSS/mycss2.css" />
    </head>
    <body>
        <div>
        <div class='outerErrorDiv' style="padding-top:10px;">
            <div id='errorDiv' style="width:50%;height:50px;background-color:#FF6B6B;border-radius:25px;align-items:center;display:flex;margin-left:auto;margin-right:auto;opacity: 0;">
                <div style="margin-left:auto;margin-right:auto;">Das Passwort erf&uumlllt die Bedingungen nicht.</div>
            </div>
        </div>
        <?php
            if(isset($_GET['error'])){
                switch ($_GET['error']){
                    case "1":
                        printError("Dieser Benutzername ist bereits vergeben");
                        break;
                    case "2":
                        printError("Ein Fehler ist aufgetreten.");
                        break;
                    default:
                        printError("Eine Fehlermeldung mit dieser Nummer existiet nicht. Sorry");
                }
            }
            ?>
            <form id="form" action="index.php" method="POST" onsubmit="return checkForm()" onreset="return resetForm()">
                <table class="horizontal-center">
                    <tr>
                        <td id="formular">
                            <h1>Registrierung</h1>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Benutzername*</h4>
                            <input class="form-control btn-default" type="text" name="username" required/>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Email</h4>
                            <input class="form-control btn-default" type="email" name="email"/>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Geschlecht</h4>
                            <input type="radio" name="geschlecht" value="Mann" checked> Mann
                            <input type="radio" name="geschlecht" value="Frau"> Frau
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Geburtsdatum</h4>
                            <input class="form-control btn-default" type="text" id="geburtsdatum" name="geburtsdatum"/>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Passwort*:</h4>
                            <input type="password" id="pw" name='password' required>
                        </td>
                        <td class="info">
                        <h4>&nbsp</h4>
                            <a id="grossB" class="input-false">Grossbuchstaben </a>| <a id="kleinB" class="input-false">Kleinbuchstaben </a></br>
                            <a id="laenge" class="input-false">9 Zeichen lang </a>| <a title="( ) [ ] { } ? ! $ % & / = * + ~ , . ; : < > - _" id="Sonderzeichen" class="input-false">Ein Sonderzeichen</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Passwort wiederhohlen*:</h4>
                            <input type="password" id="pw2"></br>
                        </td>
                        <td class="info">
                        <h4>&nbsp</h4>
                            <p id="pwMatch" class="single-input input-false">Die Passw&oumlrter stimmen &uumlberein</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="login.php">Sie haben bereits einen Account?</a>
                            <table id="proceedBtn" style="width:100%">
                                <tr>
                                    <div>
                                        <td style="width:50%"><input style="width:90%" class="" type="reset" id="reset" value="Reseten"> </td>
                                        <td style="width:50%"><input style="width:90%" class=" right" type="submit" id="action" name='action' value="Registrieren"></td>
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

