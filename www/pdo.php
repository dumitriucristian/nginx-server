<?php
$user = "root";
$pass="";
$dbh = new PDO('mysql:host=mysqldb;dbname=test', $user, $pass);

var_dump($dbh);