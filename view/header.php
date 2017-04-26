<link rel='stylesheet' href='view/css/index.css'/>
<div id="header">
    <header>
        <nav>

            <ul>
                <?php
                echo("<li><a class='nav' href='?cont=Galery&action=allGaleries'>Home</a></li>");
                if (isset($_SESSION['uid'])) {
                    echo("      
                        <li><a class='nav' href='?cont=Galery&action=myGaleries'>MyGaleries</a></li>
                        <li><a class='nav' href='?cont=Galery&action=addGalery'>Add Galery</a></li>
                        <li><a class='nav' href='?cont=Search'>Suche</a></li>
                        <li><a class='nav' href='?cont=Profil'>Profil</a></li>
                        <li><a class='nav' href='?cont=Login&action=logout'>Logout</a></li>");
                } else {
                    echo("<li><a class='nav' href='?cont=Login'>login</a></li>");
                }
                ?>
            </ul>
    </header>
    </nav>
</div>
<div id="headerMargin"></div>

