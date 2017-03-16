<html lang="de">
  <head>
    <title>Alle Benutzer</title>
    <?php include 'config.php';?>
  </head>
  <body>
  <?php
  if(isset($_GET['error'])){
      switch ($_GET['error']){
          case "1":
              printError("Sie haben keine Berechtigung zum L&ouml;schen eines Users.");
              break;
          default:
              printError("Eine Fehlermeldung mit dieser Nummer existiet nicht. Sorry");
              break;
      }
  }else if(isset($_GET['success'])){
      switch ($_GET['success']){
          case "1":
              printSuccess("Benutzer erfolgreich gel&ouml;scht.");
              break;
          default:
              printError("Eine Successmeldung mit dieser Nummer existiet nicht. Sorry");
              break;
      }
  }
  ?>
  <?php include 'res/nav.php';?>
<div class="wrapper">
  <section class="content">
    <?php
        printUsers();
    ?>
  </section>
  <!-- content -->

</div> <!-- .wrapper -->
<?php include 'res/footer.php';?>
</body>
</html>

