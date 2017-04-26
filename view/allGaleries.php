<?php
$users = selectUsers($mysqli);
foreach ($users as $user) {
    $email = $user[0];
    $uid = userByEmail($mysqli, $email);
    $uid = $uid[0]['id'];
    $galerien = publicGaleriesByUser($mysqli, $uid);
    if ($galerien) {
        foreach ($galerien as $galerie) {
            $images = imagesByGalery($mysqli, $galerie['id']);

            echo "<div id='contentContainer'>
                    <h2>" . $galerie['name'] . "</h2>
                    <label>By " . $email . "</label></br>";

            if ($images) {
                foreach ($images as $image) {
                    echo '<img src="data/images/' . $images[0]['pfad'] . '.' . $images[0]['endung'] . '" style="height: 200px" style="width: auto; heigth: auto">
                </a>';
                }

            }
            echo '</div>';
        }
    }
}
?>