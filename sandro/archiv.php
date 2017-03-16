<html lang="de">
  <head>
    <title>Archiv</title>
    <?php include 'config.php';?>
  </head>
  <body>
  <?php 
  include 'res/nav.php';
  ?>
<div class="wrapper">
  <section class="content">
    <?php
        getArchiv();
    ?>
  </section>
  <!-- content -->

</div> <!-- .wrapper -->
<?php include 'res/footer.php';?>
</body>
</html>