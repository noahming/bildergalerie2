<?php
include 'config.php';
if(!isset($_SESSION['UID'])){header('Location: login.php?error=2');}
?>
<html lang="de">
  <head>
    <title>Ihr Profil</title>
    <style>
        #profile td{
            height: 2em;
        }

        td:first-child{
            width:150px;
        }

    </style>
  </head>
  <body>
  <?php include 'res/nav.php';?>
<div class="wrapper">
  <section class="content">
    <article>
        <form id='profile' method="post" action="myprofile.php">
            <h2>Ihr Profil</h2>
            <?php printEditableProfile();?>
            <button type="submit" name='action' value='updateProfile' style="margin-top: 50px;">Speichern</button>
        </form>
    </article>
  </section>
  <!-- content -->


</div> <!-- .wrapper -->

<?php include 'res/footer.php'; ?>
</body>
</html>