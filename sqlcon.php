<?php
define("SERVER", "localhost");
define("username", "root");
include 'password.php';
define("DB", "EComp");

$conn = new mysqli(SERVER, username, password, DB);
if ($mysqli->connect_error) {
die('Connect Error (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}
?>
