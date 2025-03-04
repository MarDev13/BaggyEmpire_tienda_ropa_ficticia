<?php

$bd = 'bd_tienda';
$host = 'localhost';
$username_bd = 'root';
$password_bd = '';
$dsn = "mysql:host=$host;dbname=$bd";
try {
    $conn = new PDO($dsn, $username_bd, $password_bd);
} catch (PDOException $e) {
    print $e->getMessage();
    die('ERROR AL CONECTAR');
}
