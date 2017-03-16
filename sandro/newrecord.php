<?php
    include 'config.php';
    if(!isset($_SESSION['UID'])){header('Location: login.php');}
?>
    <html lang="de">
  <head>
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
  <?php include 'res/nav.php';?>
<div class="wrapper">
  <section class="content">
    <article>
        <form action="list.php?listtype=newest" method="post" onsubmit='newComment();'>
            <div class="newPost">
            <h2>Neuer Eintrag</h2>
            <input type="text" name='title' placeholder="Titel" required="required">
            <textarea name='description' placeholder="Beschreibung"></textarea>
            <?php include 'res/editor.php'; ?>
        </form>
    </article>
  </section>
  <!-- content -->

</div> <!-- .wrapper -->

<?php include'res/footer.php'; ?>
</body>
</html>