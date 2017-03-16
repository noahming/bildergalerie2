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
      
<div id='menu_right' class="menu_right">
        
<div class="container">
				
                    
                    <?php 
                        $users = select_users($mysqli);
                    echo '<ul class="userlist">';
                    foreach ($users as $user){
                        $email = $user[0];
                        $uid = select_user_by_email($mysqli, $email);
                        $uid = $uid[0]['id'];
                        
                        $galerien = select_public_galeries_by_user($mysqli, $uid);
                        if($galerien){
                            echo "<li class='userlistitem'><a class='a_listboxitem' href='#user_$email'>$email</a>";
                            echo '<ul>';
                        }
                        foreach ($galerien as $galerie){
                            echo "<li class='userlistsubitem'><a class='a_listboxsubitem' href='#pre_galerie_".$galerie['id']."'>".$galerie['name']."</a></li>";
                        }
                        if($galerien){
                            echo '</ul>';
                        }
                        echo '<li>';
                    }
                    echo ' </ul></div></div></div>';
                    echo '<div id="justifyed" class="justified">';
                        foreach ($users as $user){
                            $email = $user[0];
                            $uid = select_user_by_email($mysqli, $email);
                            $uid = $uid[0]['id'];
                            $galerien = select_public_galeries_by_user($mysqli, $uid);
                            if($galerien){
                                

                            
                            
                            echo "<div class='pre_user' id='user_$email'></div>";
                            echo "<div class='title_user'>$email</div>";
                        
                        foreach ($galerien as $galerie){
                            $images = select_images_by_gid($mysqli, $galerie['id']);
                            echo '<div class="pre_galerie" id="pre_galerie_'.$galerie['id'].'"></div>';
                            echo '<div id="galerie_'.$galerie['id'].'">';
                            echo '<div class="div_galcaption">';
                            echo '<a style="">'. $galerie['name'].'</a>';
                            if($images){                       

                            echo '</div>';
                        
                            
                            foreach ($images as $image) {  
                                echo '<a href="upload/'. $image['pfad'] . '.' . $image['endung'] . '" title="Caption Text" class="effect-2 effect-duration-1" style=""><img src="upload/'. $image['pfad'] . '.' . $image['endung'] . '" alt="" style="height: 200px" class="effect-2" style="width: auto; heigth: auto"></a>';
                            }
                            echo '</div>';
                                    
                            }
                             else {
                                echo "<div style='height: 100px; display: block;'><a style='color: gray;'>noch keine Bilder in dieser Galerie</a></div>";
                            }
                           
                        }
                            
                            
                            }
                            
                        }
                        
                    
                        
                             
                            
                            
                         
                        
                    ?>
                        
                   
                </div>
			</div>        
        

  </body>
</html>