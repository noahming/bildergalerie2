       

        <html>
            <head>
                
                <title>aussagekräftiger Titel der Seite</title>
                
                <?php 
                               
                    include "bildupload_ausfuehren.php";
                 ?>
            </head>
        <body>
            
            <?php //include "header.php"; ?>
            
            <div id="contentContainer">
                

                
                   
                    <?php
                    if(isset($_GET['m']) && isset($_GET['id'])){
                        $mod = true;
                        if($_GET['m'] == 2){
                            echo '<form method="get" action="galerie_bearbeiten.php?id='.$_GET['id'].'">';
                            echo '<input name="id" type="number" value='.$_GET['id'].'  min='.$_GET['id'].'  max='.$_GET['id'].' hidden="True">';
                            echo '<h1>Galerie bearbeiten</h1>';
                        }
                        
                         if(isset($_GET['id'])){
                            $galery = select_galery_by_id($mysqli, $_GET['id']);
                            if($galery[0]['uid'] != $_SESSION['uid']){
                        echo '<script type="text/javascript">window.onload = function onload(){
                            alert("Kein Zugriff");
                            window.location.href = \'index.php\'
                            }</script>';
                        }
                        }
                   
                        
                    }
                        else {
                            $mod = false;
                            echo '<form method="get" action="addGalery.php">';
                           echo '<h1>Galerie erstellen</h1>';                           
                        }
                        ?>
                    <a id="lbl_name">Name:</a>
                    
                    <input type="text" required="true" name="name" <?php if(isset($_GET['id']) && isset($_GET['m'])){ if($_GET['m'] == 2) {$galery = select_galery_by_id($mysqli, $_GET['id']); echo 'value="'.$galery[0]['name'].'"'; if($galery[0]['istPublik'] == 0){$public = 'of';}else{$public = 'on';}}} ?> size="100px"/>
                    
                   
                    
                    <div>
                        <a id="lbl_public">Öffentlich:</a>
                        <input style="width: 30px; height: 30px;"  type="checkbox" name="isPublic" <?php if(isset($public)){if($public=='on'){echo "checked";}} ?>>
                    </div>
                <?php
                    if($mod){
                            echo '<button type="button" style="margin-right: 10px;" onclick="deleteGalery()">Löschen</button>';   
                            echo '<button type="button" style="margin-right: 10px;" onclick="window.location.href = \'index.php\';">Abbrechen</button>';
                            echo '<button type="submit" name="submit" value="Abschicken">Speichern</button>';
                    }
                    else {
                          echo '<button type="submit" name="submit" value="Abschicken">Speichern</button>';
 
                    }
                ?> 
                
                <script>
                    function deleteGalery() {
                        var ask = window.confirm("Gesamte Galerie mit allen Bildern löschen? Dieser Voragang kann nicht rückgängig gemacht werden!");
                        if (ask) {

                           <?php echo 'document.location.href = "galerie_loeschen.php?id='.$_GET['id'].'"'; ?>

                        }
                    }
                </script>
            </div>
        </body>
        </html>