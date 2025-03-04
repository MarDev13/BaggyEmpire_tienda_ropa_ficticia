<?php
session_start();
$haylogin = isset($_SESSION['nombre']);

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
// Relacionar rol con usuario en sesión
$nombre_usuario = $_SESSION['nombre'] ?? null;

if ($nombre_usuario) {
    $sqldatosrol = 'SELECT rol FROM usuarios WHERE nombre = :nombre';
    $stmt = $conn->prepare($sqldatosrol);
    $stmt->bindValue(':nombre', $nombre_usuario);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    $rol = $usuario['rol'] ?? null;
} else {
    $rol = null;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Press+Start+2P&family=Wallpoet&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Panel de Control</title>
</head>

<body>

<div class="d-flex justify-content-start mx-5">
    <button id="btn-refresh"  class="btn btn-primary w-100 py-2 mt-3" >
<a id="update" href="javascript:(window.location.href =window.location.href)">Actualizar página</a>
</button>
</div>
    <div id="box-welcome" class="d-flex justify-content-center  kanit-thin">
        <a class="btn btn-secondary disabled placeholder col-4" aria-disabled="true" href="index.php">
            BIENVENIDO AL PANEL DE CONTROL PARA ADMINISTRADORES
        </a>
    </div>

    <div id="box-buttons" class="btn-group d-flex justify-content-start kanit-light" role="group" aria-label="Basic mixed styles example">
        <div id="box-icon" class="d-flex justify-content-start">
            <a href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-gear" viewBox="0 0 16 16">
                    <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708z" />
                    <path d="M11.886 9.46c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.044c-.613-.181-.613-1.049 0-1.23l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
                </svg>
            </a>
        </div>
        
        <button type="button" class="btn btn-dark" onclick="window.location.href='categorias.php'">Categorías</button>
        <button type="button" class="btn btn-secondary" onclick="window.location.href='productos.php'">Productos</button>
        <button type="button" class="btn btn-dark" onclick="window.location.href='usuarios.php'">Usuarios</button>
        <button type="button" class="btn btn-secondary" onclick="window.location.href='ventas.php'" >Ventas</button>
    </div>
    