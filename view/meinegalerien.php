                    <?php 
                    $galerien = select_galeries_by_user($mysqli, $_SESSION['uid']);
                    echo '<div id="menu_right" class="menu_right">
                    <ul class="userlist">';
                   
                       
                        $galerien = select_galeries_by_user($mysqli, $_SESSION['uid']);
                        if ($galerien){
                            echo '<ul class="galerielist">';
                        }
                        foreach ($galerien as $galerie){
                            echo "<li class='galerieli'><a class='galerielink' href='#pre_galerie_".$galerie['id']."'>".$galerie['name']."</a></li>";
                        }
                        
                    
                    echo ' </ul></div>';
                    echo ' <div id="justifyed" class="justified">';
                    if(isset($_GET['gid'])){
                    $gid = $_GET['gid'];
                        $images = select_images_by_gid($mysqli, $gid);
                        foreach ($images as $image) {                       
                            echo '<a href="images/'. $image['pfad'] . '.' . $image['endung'] . '" title="Caption Text" class="effect-2 effect-duration-1" style=""><img src="images/'. $image['pfad'] . '.' . $image['endung'] . '" alt="" style="height: 200px" class="effect-2" style="width: auto; heigth: auto"></a>';
                        }
                    }
                    else{
                                          echo '<button id="btn_addgalery" type="button" style="margin-bottom: 40px;" onclick="window.location.href =\'index.php?neuegalerie\'">Galerie hinzufügen</button>';
                       
                        $galerien = select_galeries_by_user($mysqli, $_SESSION['uid']);
                        foreach ($galerien as $galerie){
                                                        echo '<div class="pre_galerie" id="pre_galerie_'.$galerie['id'].'"></div>';

                            echo '<div id="galeryContainer">
                            <div id="galeryTitle">
                                  <a href="?gid='.$galerie['id'].'">'. $galerie['name'].'</a>
                                  <a href="?galerie&m=2&id='.$galerie['id'].'" title="Galerie bearbeiten" class="btn_editgalery"></a>
                                  <a href="?images&gid='.$galerie['id'].'" title="Bild hinzufügen" class="btn_addtogalery"></a>';

                            
                            if($galerie['istPublik']){
                                echo '<a  class="icon_public" title="Öffentlich"></a>';
                            }
                            echo '</div>';
                            

                            $images = select_images_by_gid($mysqli, $galerie['id']);
                            if($images){
                            
                            foreach ($images as $image) {  
                                echo '<a href="bildAnsicht.php?id='.$image['id'].'" title="Caption Text" class="effect-2 effect-duration-1" style=""><img href="bildAnsicht.php?" src="images/'. $image['pfad'] . '.' . $image['endung'] . '" alt="" style="height: 200px" class="effect-2" style="width: auto; heigth: auto"></a>';
                            }
                            echo '</div>';
                                    
                            }
                            else {
                                echo "<div id='lblNoPictures'><a style='color: gray;'>noch keine Bilder in dieser Galerie</a></div>";
                            }
                            
                        }
                    }
                    ?>
<script type="text/javascript">window.onload = function setcontentwidth() {
        document.getElementById('justifyed').style.width = "calc(100%- " + document.getElementById('menu_right').style.width +")";
        
    }
</script>
                    </div>
                       
    