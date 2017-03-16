<html lang="de">
  <head>
   <?php
      include_once "config.php";
      //include "header.php";  
        
    ?>
    
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>aussagekräftiger Titel der Seite</title>
  </head>
  <body>
   
			
        
<div class="container">
				<div class="justified">
                    <button type="button" style="margin-bottom: 40px;" onclick="window.location.href = 'index.php?neuegalerie'">Galerie hinzufügen</button>
                    <?php 
                        $users = select_users($mysqli);
                        foreach ($users as $user){
                            $email = $user[0];
                            $uid = select_user_by_email($mysqli, $email);
                            $uid = $uid[0]['id'];
                            echo "<div>$email</div>";
                        
                        $galerien = select_galeries_by_user($mysqli, $uid);
                        foreach ($galerien as $galerie){
                            echo '<div id="galerie_'.$galerie['id'].'">';
                            echo '<div class="div_galcaption">';
                            echo '<a style="">'. $galerie['name'].'</a>';
                            echo '<a href="?galerie&m=2&id='.$galerie['id'].'" title="Galerie bearbeiten" class="btn_editgalery"></a>';
                            echo '<a href="/?upload&gid='.$galerie['id'].'" title="Bild hinzufügen" class="btn_addtogalery"></a>';
                            if($galerie['istPublik']){
                                echo '<a  class="icon_public" title="Öffentlich"></a>';
                            }
                            
                            echo '</div>';
                            $images = select_images_by_gid($mysqli, $galerie['id']);
                            if($images){
                            
                            foreach ($images as $image) {  
                                echo '<a href="upload/'. $image['pfad'] . '.' . $image['endung'] . '" title="Caption Text" class="effect-2 effect-duration-1" style=""><img src="upload/'. $image['pfad'] . '.' . $image['endung'] . '" alt="" style="height: 200px" class="effect-2" style="width: auto; heigth: auto"></a>';
                            }
                            echo '</div>';
                                    
                            }
                            else {
                                echo "<div style='margin-left: 30px; height: 200px; display: block;'><a style='color: gray;'>noch keine Bilder in dieser Galerie</a></div>";
                            }
                            
                            }
                        }
                        
                    
                        
                             
                            
                            
                         
                        
                    ?>
                        
                   
                </div>
			</div>        
        

  </body>
</html>