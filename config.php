<?php
/* Database credentials */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'id17880731__projectquiz');
define('DB_PASSWORD', 'Projectquiz2021111-');
define('DB_NAME', 'id17880731__2021projectquiz');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
