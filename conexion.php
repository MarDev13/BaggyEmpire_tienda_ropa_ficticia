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

$rol = 'administrador';
var_dump($rol);
$sqlrol = 'SELECT * FROM usuarios WHERE rol = :rol';

$stmt = $conn->prepare($sqlrol);
$stmt->bindValue(':rol', $rol);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC); // Usa fetch() para un solo resultado.


