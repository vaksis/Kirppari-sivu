<?php
//$dsn = "mysql:host=localhost;dbname=fleemarket";
//$user = "root";
//$passwd = "";


$host = getenv('DB_HOST');
$port = getenv('DB_PORT'); 
$dbname = getenv('DB_NAME'); 
$user = getenv('DB_USERNAME'); 
$password = getenv('DB_PASSWORD');
$connectionString = "mysql:host=$host;dbname=$dbname;port=$port;charset=utf8";

$pdo = new PDO($connectionString, $user, $password);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

