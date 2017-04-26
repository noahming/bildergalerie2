<?php


$galerien = galeriesByUser($mysqli, $_SESSION['uid']);
if ($galerien) {
    foreach ($galerien as $galerie) {
        $images = imagesByGalery($mysqli, $galerie['id']);

        echo "
<div id='contentContainer'>

                    <h2>" . $galerie['name'] . "</h2>";

        if ($images) {
            echo '<a href="?cont=Galery&action=Galery">
                <img src="data/images/' . $images[0]['pfad'] . '.' . $images[0]['endung'] . '" style="height: 200px" style="width: auto; heigth: auto">
                </a>
                </div>';
        }
    }
}

?>