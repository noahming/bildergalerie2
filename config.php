<?php
session_start();
echo("
	<meta charset='utf-8'>
    <link rel='stylesheet' href='view/dbfunction backup/stylesheet.dbfunction backup' />
    <link rel='stylesheet' href='view/dbfunction backup/login.dbfunction backup' />
    <link rel='stylesheet' href='view/dbfunction backup/galeries.dbfunction backup'/>
    <script type='text/javascript' src='javascript/login.scripts'></script>");
    require_once 'lib_dbfunctions.php';
    $mysqli = make_connection();
        if(!connection_ok($mysqli)){
            echo "dbconnection failed";
            exit(1);
        }
        
?>