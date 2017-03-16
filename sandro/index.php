<html lang="de">
  <head>
    <title>Blog</title>
    <?php
        include 'config.php';
    ?>
  </head>
  <body>
  <?php
  if(isset($_GET['error'])){
      switch ($_GET['error']){
          case "1":
              printError("Sie sind bereits eingelogt!");
              break;
          case "2":
              printError("Bitte loggen Sie sich zuerst aus, bevor Sie einen neuen Account erstellen.");
              break;
          case "3":
              printError("Eintrag existiert nicht");
              break;
          default:
              printError("Eine Fehlermeldung mit dieser Nummer existiet nicht. Sorry");
              break;
      }
  }
  else
  {
      if(isset($_GET['success'])){
          switch ($_GET['success']){
              case "1":
                    printSuccess("Sie haben sich erfolgreich eingeloggt.");
                    break;
              case "2":
                    printSuccess("Sie haben sich erfolgreich registriert und sind nun eingeloggt.");
                    break;
              case "3":
                    printSuccess("Eintrag erfolgreich archiviert");
                    break;
              case "4":
                    printSuccess("Eintrag erfolgreich gel&oumlscht");
                    break;
              default:
                    printError("Eine Successmeldung mit dieser Nummer existiert nicht. Sorry");
          }
      }
  }
  ?>
  <?php include 'res/nav.php';?>
<div class="wrapper">
  <section class="content">
    <article>
    <?php if(isset($_SESSION["UID"])){?>
      <h2><?php echo $_SESSION["username"].","; ?></h2>
      <p>Herzlich Willkomen auf meinem Blog, sei doch aktiv, teile deine Meinung mit uns und diskutiere darüber</br>
      Du hast die Möglichkeit deine Einträge zu bearbeiten, zu löschen oder zu archivieren.</p>
      <p>Über Kommentare kannst du mit anderen Usern über den Blog diskutieren</p>
    <?php }else{?>
      <h2>Willkommen</h2>
      <p>Lieber Leser</p>
      <p>Auf dieser Webseite kannst du deine Meinung mit anderen Teilen und auch darüber diskutieren</br>
      Es wäre mir eine Freude, wenn Du dich registrierts und aktiv mitdiskutierst</br></br>
      <i>a moment of silence after the violence ~Capital Steez</i></p>
    <?php }; ?>
    </article>
    <section class="comments">
      <p><em>Kommentare sind Ausgeschalten</em></p>
    </section>
  </section>
  <!-- content -->

</div> <!-- .wrapper -->

<?php include'res/footer.php'; ?>
</body>
</html>