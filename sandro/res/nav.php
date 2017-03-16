<?php
echo("
<header>
  <h1>Blog<br><small><em>Sandro Gerber</em></small></h1>
</header>
<nav>
    <ul class='main-nav'>
      <li><a href='index.php' ");if(basename($_SERVER["REQUEST_URI"])=='index.php'){echo("class='current'");}echo(">Home</a></li>
      <li><a href='list.php?listtype=newest' ");if(basename($_SERVER["REQUEST_URI"])=='list.php?listtype=newest'){echo("class='current'");}echo(">Neuste Eintr&aumlge</a></li>
      <li><a href='users.php' ");if(basename($_SERVER["REQUEST_URI"])=='users.php'){echo("class='current'");}echo(">Benutzer</a></li>");
      if(isset($_SESSION['UID'])){
          if($_SESSION['UID'] == 1){
            echo("<li><a href='archiv.php' ");if(basename($_SERVER["REQUEST_URI"])=='archiv.php'){echo("class='current'");}echo(">Archiv</a></li>");
          }
          echo("
          <li class='right'><a href='index.php?action=logout'>Logout</a></li>
          <li class='right'><a href='myprofile.php' ");if(basename($_SERVER["REQUEST_URI"])=='myprofile.php'){echo("class='current'");}echo(">".$_SESSION['username']."</a></li>
          <li class='right'><a href='newrecord.php' ");if(basename($_SERVER["REQUEST_URI"])=='newrecord.php'){echo("class='current'");}echo(">Neuer Eintrag</a></li>
          <li class='right'></li>
          ");
      }
      else
      {
          echo("
          <li class='right'><a href='login.php'>Einlogen / Registrieren</a></li>
          ");
      }
    echo("
    </ul>
  </nav>
  ");
  ?>