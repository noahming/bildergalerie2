<meta charset='utf-8'>
<link rel='stylesheet' href='css/bootstrap.css'/>
<link rel='stylesheet' href='css/bootstrap-responsive.css'/>
<script type='text/javascript' src='../scripts/bootstrap.js'></script>
<div class="navbar navbar-fixed-top">
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="#">NoahsSuperSite</a>
            <ul>
                <?php
                if (isset($_SESSION['email'])) {
                    echo("      <li><a class='nav' href='?home'>Home</a></li>
                            <li><a class='nav' href='?all'>Alle</a></li>
                            <li><a class='nav' href='?search'>Suche</a></li>
                            <li><a class='nav' href='?profil'>Profil</a></li>
                            <li><a class='nav' href='?logout'>logout</a></li>");
                }
                ?>
            </ul>
        </div>
    </div>
</div>