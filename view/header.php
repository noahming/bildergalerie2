
<link rel='stylesheet' href='view/css/index.css'/>
<div id="header">
    <header>
        <nav>

            <ul>
                <?php
                echo("<li><a class='nav' href='?action=home'>Home</a></li>");
                if (isset($_SESSION['uid'])) {
                    echo("      
                        <li><a class='nav' href='?action=all'>Alle</a></li>
                        <li><a class='nav' href='?action=search'>Suche</a></li>
                        <li><a class='nav' href='?action=profil'>Profil</a></li>
                        <li><a class='nav' href='?action=logout'>logout</a></li>");
                } else {
                    echo("<li><a class='nav' href='?action=login'>login</a></li>");
                }
                ?>
            </ul>
    </header>
    </nav>
</div>
<div id="headerMargin"></div>

