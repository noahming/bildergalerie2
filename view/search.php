<form method="post">
    <input style="width: 100%;" name="email" placeholder="Search for User">
    <button name="btnSearchUser">Search</button></br>
    <input style="width: 100%;" name="galery" placeholder="Search for Galery">
    <button type="button" name="btnSearchGalery">Search</button></br>
</form>
    <?php
    if (isset($_GET['uid'])) {
        $galeries = publicGaleriesByUser($mysqli, $_GET['uid']);
        foreach ($galeries as $galery) {
            $images = imagesByGalery($mysqli, $galery['id']);
        }
        echo '<div id="contentContainer"></div>
                   <h2>" . $galerie[\'name\'] . "</h2>"';

        if ($images) {
            echo '<a href="?cont=Galery&action=Galery">
                <img src="data/images/\' . $images[0][\'pfad\'] . \'.\' . $images[0][\'endung\'] . \'" style="height: 200px" style="width: auto; heigth: auto">
                </a>
                </div>';
        }
    }
    if (isset($_GET['gid'])) {
        $galery = galeryById($mysqli, $_GET['gid']);
        $images = imagesByGalery($mysqli, $galery['id']);

        echo '<div id="contentContainer">

                   <h2>' . $galerie['name'] . ' </h2 >';
        if ($images) {
            echo '<a href="?cont=Galery&action=Galery">
                <img src="data/images/\\' . $images[0]['pfad'] . '.' . $images[0]['endung'] . '" style="height: 200px" style="width: auto; heigth: auto">
                </a>
                </div>\';
        
</div>';
        }
    }
    ?>