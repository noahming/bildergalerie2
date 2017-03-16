<?php
/*
*Datenbank Verbindung aufbauen
*/
    $db = new SQLite3('data/Blog.db');
    $results = $db->query($query);
?>