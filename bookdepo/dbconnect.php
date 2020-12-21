<?php
//connect to db
$servername = "localhost";
$username = "root";
$passworddb = "";
$dbname = "bookdepo";


$conn = new PDO("mysql:host=$servername;dbname=bookdepo;", $username, $passworddb);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>