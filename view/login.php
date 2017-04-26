
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
                <input id="email" name="email" placeholder="jemand@example.com" required/>
            </div>
            <div id="passwordContainer">
                <input type="password" id="password" name="password" required placeholder="Passwort"/>
            </div>

            <!-- Buttons zum abschliessen der Anmeldung / Registrierung -->
            <button type="submit" id="btnLogin" name="btnLogin" class="note">Login</button>
        </form><!-- Ende LoginFormular -->

        <form id="registerForm" method="post">
            <h1 id=titel>Registrieren</h1><!-- Überschrift -->
            <div id="emailContainer">
                <input id="email" name="email" placeholder="jemand@example.com" required/>
            </div>

            <div id="passwordContainer">
                <input type="password" id="password" name="password" required placeholder="Passwort"/>
            </div>

            <!-- Inputfeld (Text nicht sichtbar), Fehlermeldung zur Passwort-Wiederholung (wird nur bei Registrierung angezeigt) -->
            <div id="passwordRepetitionContainer">
                <input type="password" id="passwordRepetition" name="password2" placeholder="password"/>
            </div>
            <button type="submit" id="btnRegist" name="btnRegist">Sign Up</button>
        </form><!-- Ende RegisterFormular -->

    </div>