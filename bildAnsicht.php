<?php 
	include 'config.php';
	$id= $_GET['id'];
	$image = select_images_by_bid($mysqli, $id);

?>
<div id="contentContainer" style="margin-top: 50px;">
<form method="post">
	<h1>Bild bearbeiten</h1>
	<?php 
	echo '<img href="bildAnsicht.php?" src="upload/'. $image[0]['pfad'] . '.' . $image[0]['endung'] . '" alt="" style="height: 200px" class="effect-2" style="width: auto; heigth: auto"></br>
	<input name="beschreibung" value="'.$image[0]['beschreibung'].'"></input></br>
	<button name="btnDeletePicture">Lösche Bild</button>
	<button name="btnUpdatePicture">Speichern</button>';

	if (isset($_POST['btnDeletePicture'])){
		delete_entry($mysqli,$image[0]['id']);
		header('Location: index.php');
	}
	if (isset($_POST['btnUpdatePicture'])){
		$beschreibung = $_POST['beschreibung'];
		update_image($mysqli,$image[0]['id'],$beschreibung);
				header('Location: index.php');
	}
	?>
	</form>
</div>