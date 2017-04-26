
<div id="contentContainer">
<form id="updateProfile" method="post">
<h1>Profil bearbeiten</h1>
<h2 name="email">
    <?php echo $_SESSION['email']; ?></h2></br>
<input name="password" type="password" placeholder="new Password"/></br>
<input name="passwordRepetition" type="password" placeholder="new Password"/></br>

        <button name="btnDeleteProfile">
        Lösche Profil
        </button>
        <button name="btnSaveProfile" id="btnSaveProfile">
            Speichern
        </button>
        </form>
        </div>
