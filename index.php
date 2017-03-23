<?php
require_once 'config.php';
?>
<html lang="de">
<head>
    <title>Bildergalerie</title>
</head>
<body>


<?php
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    die();
}

if (!isset($_SESSION['email'])) {
    echo '<div style="height:160px;"></div>';
    include 'login.php';
}
elseif(isset($_GET['profil'])){
    echo '<div style="height:160px;"></div>';
    include 'profil.php';
}
elseif(isset($_GET['home'])){
    include 'meinegalerien.php';
}
elseif(isset($_GET['neuegalerie'])){
    echo '<div style="height:160px;"></div>';
    include 'galerie.php';
}
elseif(isset($_GET['upload'])){
    echo '<div style="height:160px;"></div>';
    include 'bildupload.php';
}
elseif(isset($_GET['galerie'])){
    echo '<div style="height:160px;"></div>';
    include 'galerie.php';
}
elseif(isset($_GET['all'])){
    include 'allegalerien.php';
}
elseif(isset($_GET['bilderanzeigen'])){
    include 'bilderanzeigen.php';
}
else {
    include 'meinegalerien.php';
}

?>
</body>
</html>