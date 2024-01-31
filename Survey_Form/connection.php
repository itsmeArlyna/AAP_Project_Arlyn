<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "survey";

$db = new mysqli($host, $username, $password, $dbname);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
