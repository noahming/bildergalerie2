<html lang="de">
  <head>
    <title>Neuste Einträge</title>
    <?php include 'config.php';?>
  </head>
  <body>
  <?php 
    if(!isset($_GET['listtype'])){
      printError("Keine Liste ausgew&aumlhlt");
    }else{
      if($_GET['listtype']!="newest" AND !isset($_GET['uid'])){
        printError("Keinen User Definiert");
      }
    }
    include 'res/nav.php';
  ?>
<div class="wrapper">
  <section class="content">
    <?php
      if(isset($_GET['listtype'])){
        if($_GET['listtype']=='newest'){
          printNewest();
        }
        if($_GET['listtype']=='user'){
          if(isset($_GET['uid'])){
            printByUser($_GET['uid']);
          }
        }
      }
    ?>
  </section>
  <!-- content -->

</div> <!-- .wrapper -->
<?php include 'res/footer.php';?>
</body>
</html>

