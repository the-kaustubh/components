<?php
define("SERVER", "localhost");
define("username", "root");
define('ROOT_DIR', 'http://first-app-of-mine.herouapp.com/');
define('ROOT_DIR_LOCAL', 'http://localhost/');
include 'password.php';
define("DB", "EComp");

$conn = new mysqli(SERVER, username, password, DB);
if ($mysqli->connect_error) {
die('Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}
?>
