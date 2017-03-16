<?php
include 'config.php';
if(!isset($_SESSION['UID'])){header('Location: login.php');}
if(!isset($_GET['recID'])){header('Location: index.php?error=3');}
?>
<html lang="de">
  <head>
    <link rel="stylesheet" href="CSS/editor.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="JS/editor.js"></script>
    </head>
  <body>
  <?php include 'res/nav.php';?>
<div class="wrapper">
  <section class="content">
    <article>
        <form action="<?php echo("record.php?recID=".$_GET['recID']); ?>" method="post" onsubmit='newComment();'>
            <div class="newPost">
            <?php printEditRecord($_GET['recID']); ?>
            </div>
        </form>
    </article>
  </section>
  <!-- content -->

</div> <!-- .wrapper -->

<?php include'res/footer.php'; ?>
</body>
</html>