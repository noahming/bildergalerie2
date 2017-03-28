<div class="navbar navbar-fixed-top">
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="#">NoahsSuperSite</a>
            <ul>
                <?php
                if (isset($_SESSION['uid'])) {
                    echo("      <li><a class='nav' href='?home'>Home</a></li>
                            <li><a class='nav' href='?all'>Alle</a></li>
                            <li><a class='nav' href='?search'>Suche</a></li>
                            <li><a class='nav' href='?profil'>Profil</a></li>
                            <li><a class='nav' href='?logout'>logout</a></li>");
                }
                else{
                    echo("<li><a class='nav' href='?cont=login'>login</a></li>");
                }
                ?>
            </ul>
        </div>
    </div>
</div>