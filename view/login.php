

<div id="contentContainer"><!-- umschliesst alle Inhalte des Logins / der Registrierung -->

    <button id="btnHideRegistration" onmouseup="btnHideRegistration()">
        <!-- Button für die Umschaltung von Registirerung zu Login -->
        Anmelden
    </button>

    <button id="btnHideLogin" onmouseup="btnHideLogin()">
        <!-- Button für die Umschaltugn von Login zu Regisrtierung -->
        Registrieren
    </button>
    <div id="loginContainer"><!-- umschliesst das LoginFormular -->
        <form id="loginForm" method="post"><!-- anfang Formular -->

            <h1 id=titel>Login</h1><!-- Überschrift -->

            <!-- Inputfeld und Fehlermeldung zum Benutzernamen -->
            <div id="emailContainer">
                <input id="email" name="email" placeholder="jemand@example.com" required
                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
                       <?php if (isset($_GET['email'])) {
                    echo 'value="' . $_GET['email'] . '"';
                } ?> />
            </div>
            <div id="passwordContainer">
                <input type="password" id="password" name="password" required
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{9,}" placeholder="Passwort"/>
            </div>

            <!-- Buttons zum abschliessen der Anmeldung / Registrierung -->
            <button id="btnLogin" type="submit" name="btnLogin" value="true" class="note">Anmelden
            </button>
        </form><!-- Ende LoginFormular -->

        <form id="registerForm" method="post">
            <h1 id=titel>Registrieren</h1><!-- Überschrift -->
            <div id="emailContainer">
                <input id="email" name="registrationEmail" placeholder="jemand@example.com" required
                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" onkeyup="emailCheck(); activateSubmit(document.forms['registerForm']['password'].value, document.forms['registerForm']['passwordRepetition'].value);"/>
                <a class="validationError" id="emailError"></br>Geben sie eine gültige email-addresse ein!</a>
            </div>

            <div id="passwordContainer">
                <input type="password" id="password" name="password" required
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{9,}" placeholder="Passwort"
                       onkeyup="passwordCheck(document.forms['registerForm']['password'].value); activateSubmit(document.forms['registerForm']['password'].value, document.forms['registerForm']['passwordRepetition'].value);"/>
                <a class="validationError" id="passwordError"></br>Das Passwort muss zwischen 8 und 20 Zeichen lang
                    sein, Gross-, Kleinbuchstaben, Zeichen(?!$%&/=<>_) und Zahlen enthalten.</a>
            </div>

            <!-- Inputfeld (Text nicht sichtbar), Fehlermeldung zur Passwort-Wiederholung (wird nur bei Registrierung angezeigt) -->
            <div id="passwordRepetitionContainer">
                <input type="password" id="passwordRepetition" name="passwordRepetition"
                       onkeyup="passwordRepetitionCheck(document.forms['registerForm']['password'].value, document.forms['registerForm']['passwordRepetition'].value); activateSubmit(document.forms['registerForm']['password'].value, document.forms['registerForm']['passwordRepetition'].value);" placeholder="Passwort wiederholen"/>
                <a class="validationError" id="password2Error"></br>Die Passwörter stimmen nicht Überein!</a>
            </div>
            <button id="btnRegistration" type="submit" name="btnRegistration" value="true" class="note">
                Registrieren
            </button>
        </form><!-- Ende RegisterFormular -->

    </div>