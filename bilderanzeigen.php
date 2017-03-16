<html lang="de">
  <head>

    
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>aussagekräftiger Titel der Seite</title>
     
  </head>
  <body>
   
			
        
<div class="container">
				<div class="justified">
                    
                    <?php 
                    $gid = $_GET['gid'];
                        $images = select_images_by_gid($mysqli, $gid);
                        foreach ($images as $image) {
                             
                            
                            
                            echo '<a href="upload/'. $image['pfad'] . '.' . $image['endung'] . '" title="Caption Text" class="effect-2 effect-duration-1" style=""><img src="upload/'. $image['pfad'] . '.' . $image['endung'] . '" alt="" style="height: 200px" class="effect-2" style="width: auto; heigth: auto"></a>';
                        }
                    ?>
                        
                   
                </div>
			</div>        
        

  </body>
</html>