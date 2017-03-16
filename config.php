<?php
session_start();
echo("
	<meta charset='utf-8'>
    <link rel='stylesheet' href='css/stylesheet.css' />
    <link rel='stylesheet' href='css/login.css' />
    <link rel='stylesheet' href='css/galeries.css'/>
    <script type='text/javascript' src='javascript/login.js'></script>");
    require_once 'lib_dbfunctions.php';
    $mysqli = make_connection();
        if(!connection_ok($mysqli)){
            echo "dbconnection failed";
            exit(1);
        }
        
?>