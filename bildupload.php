       

        <html>
            <head>
                
                <title>aussagekräftiger Titel der Seite</title>
                
                <?php   
                    include_once "config.php";
                    include "bildupload_ausfuehren.php";
                 ?>
            </head>
        <body>
            <?php
            if(isset($_GET['erfolgreich'])){
                echo '<script type="text/javascript">
                    window.onload = function onload () {
                        alert("Upload erfolgreich!");
                    }
                </script>';
            }
            
                
                
                $galery = select_galery_by_id($mysqli, $_GET['gid']);
                            if($galery[0]['uid'] != $_SESSION['uid']){
                        echo '<script type="text/javascript">window.onload = function onload(){
                            alert("Kein Zugriff");
                            window.location.href = \'index.php\'
                            }</script>';
                        }
                
            
            ?>
            <div id="contentContainer">
                

                <form method="post" action="?upload<?php if(isset($_GET['gid'])){echo '&gid='.$_GET['gid'];} ?>" enctype="multipart/form-data">
                    <h1>Bild hochladen</h1>
                    <a id="lbl_bilddatei">Bilddatei:</a>
                    <br />

                    <input type="file" required="true" name="img" size="40"><p>
                    <a id="lbl_descr">Galerie:</a>
                    <select id="ddl_gid" name="gid">
                        <?php
                            $uid = $_SESSION['uid'];
                            $galeries = select_galeries_by_user($mysqli, $uid);
                            foreach ($galeries as  $galery){
                                echo '<option value="'. $galery['id']. '">'. $galery['name'] .'</option>"';
                            }
                            if(isset($_GET['gid'])){
                                echo '<script type="text/javascript">document.getElementById("ddl_gid").value = '.$_GET['gid'].'</script>';
                            }
                        ?>
                    </select>
                    <a id="lbl_descr" style="display: block;">Beschreibung:</a>
                    <textarea name="descr" id="txt_descr" maxlength="500"></textarea>

                    <input type="submit" name="submit" value="Abschicken">
                    
                </form>
            </div>
        </body>
        </html>