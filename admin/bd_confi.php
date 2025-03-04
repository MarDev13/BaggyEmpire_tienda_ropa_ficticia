<?php

$dsn ='mysql:host=localhost;dbname=bd_tienda';
$username ='root';
$password ='';

try {


    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    //CONTROL DE ERRORES
    die('Error');
}