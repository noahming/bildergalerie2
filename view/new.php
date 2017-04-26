<div id="contentContainer">
    <form method="post">
        <h1>new Galery</h1></br>
        <input placeholder="name" name="name"></br>
        <label>isPublic<input name="isPublic" type="checkbox"></label></br>
        <button id="btnAddGalery" name="btnAddGalery">Galerie hinzufügen</button>
    </form>
</div>
<div id='contentContainer'>
    <form method="post">
        <h1>Bild hochladen</h1>
        <a id="lbl_bilddatei">Bilddatei:</a>
        <br/>

        <input type="file" required="true" name="img" size="40">
        <p>
            <a id="lbl_descr">Galerie:</a>
            <select id="ddl_gid" name="gid">
                <?php
                $uid = $_SESSION['uid'];
                $galeries = galeriesByUser($mysqli, $uid);
                foreach ($galeries as $galery) {
                    echo '<option value="' . $galery['id'] . '">' . $galery['name'] . '</option>"';
                }
                if (isset($_GET['gid'])) {
                    echo '<script type="text/javascript">document.getElementById("ddl_gid").value = ' . $_GET['gid'] . '</script>';
                }
                ?>
            </select>
            <a id="lbl_descr" style="display: block;">Beschreibung:</a>
            <textarea name="descr" id="txt_descr" maxlength="500"></textarea>

            <button type="submit" name="btnAddImage">upload</button>
    </form>
</div>