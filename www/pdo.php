<?php
$user = "root";
$pass="root";
$dbh = new PDO('mysql:host=mysql;dbname=dummy', $user, $pass);
var_dump("test00");
var_dump($dbh);