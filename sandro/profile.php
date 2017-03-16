<html lang="de">
  <head>
    <?php
        include 'config.php';
    ?>
  </head>
  <body>
  <?php
  if(isset($_GET['error'])){
      switch ($_GET['error']){
          case "1":
              printError("Es wurde keine UserID angegeben");
              break;
          default:
              printError("Eine Fehlermeldung mit dieser Nummer existiet nicht. Sorry");
              break;
      }
  }
  ?>
  <?php include 'res/nav.php';?>
<div class="wrapper">
  <section class="content">
      <?php
        if(isset($_GET['profileID'])){
          echo(printProfile($_GET['profileID']));
          }
        else{if(!isset($_GET['error'])){
            header('Location: profile.php?error=1');
        }}
      ?>
  </section>
  <!-- content -->

</div> <!-- .wrapper -->

<?php include'res/footer.php'; ?>
</body>
</html>