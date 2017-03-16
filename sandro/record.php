<html lang="de">
  <head>
    <?php
        include 'config.php';
    ?>
    <title><?php if(isset($_GET['recID'])){echo(printTitle($_GET['recID']));}else{echo("Kein Eintrag");} ?></title>
    <link rel="stylesheet" href="CSS/editor.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="JS/editor.js"></script>
  </head>
  <body>
    <div class='outerErrorDiv' style='padding-top:10px;'>
        <div id='errorDiv' style='width:50%;height:50px;background-color:#FF6B6B;border-radius:25px;align-items:center;display:flex;margin-left:auto;margin-right:auto;opacity: 0;'>
            <div style='margin-left:auto;margin-right:auto;'>Bitte geben Sie zuerst einen Link ein</div>
        </div>
    </div>
  <?php
  if(isset($_GET['error'])){
      switch ($_GET['error']){
          case "1":
              printError("Sie sind nicht der Ersteller des Eintrages.");
              break;
          case "2":
              printError("Sie haben keine Berechitigung diesen Eintrag zu archivieren");
              break;
          case "3":
              printError("Sie haben keine Berechitigung diesen Eintrag zu L&ouml;schen");
              break;
          default:
              printError("Eine Fehlermeldung mit dieser Nummer existiet nicht. Sorry");
              break;
      }
  }else if(isset($_GET['success'])){
      switch ($_GET['success']){
          case "1":
              printSuccess("Kommentar erfolgreich gel&ouml;scht.");
              break;
          default:
              printError("Eine Fehlermeldung mit dieser Nummer existiet nicht. Sorry");
              break;
      }
  }else if(!isset($_GET['recID'])){printError("Keinen Eintrag Ausgew&aumlhlt");}

 include 'res/nav.php';?>
<div class="wrapper">
  <section class="content">
        <?php
        if(isset($_GET['recID'])){
            printrecord($_GET['recID']);
        }
        ?>
  </section>
  <!-- content -->

</div> <!-- .wrapper -->
<?php include'res/footer.php'; ?>
</body>
</html>