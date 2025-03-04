<?php
ob_start();
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
    // print $e->getMessage();
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Wallpoet&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="baggy_empire.css" rel="stylesheet">
    <title>BaggyEmpire</title>
</head>

<body>
    <nav id="cabecera" class="navbar navbar-expand-lg bg-body-tertiary navbar bg-dark border-bottom border-body"
        data-bs-theme="dark">
        <div class="container-fluid">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="index.php"
                    class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                    <img id="img" src="img/logoBE.jpg" alt="Logo personalizado" width="70" height="60" class="me-2">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-center">
                        <?php if (!$haylogin): ?>
                            <li class="nav-item">
                                <a class="nav-link " href="login.php">Únete</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link " aria-current="page" href="index.php">Donde empezó
                                    todo</a></li>
                            <li class="nav-item">
                                <a class="nav-link" href="mujeres.php">Queens</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="hombres.php">Kings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="ofertas.php">Rebajas de Calle</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="contacto.php">Hablemos</a>
                            </li>
                            <li> 
                                <a href="mis_pedidos.php" class="enlace2">Mis pedidos</a>
                        </li>
                            <?php if ($rol === 'administrador'): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="admin/index.php" target="_blank">Panel de control</a>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a class="nav-link " href="logout.php">Cerrar sesión</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <?php if ($haylogin): ?>
                        <ul class="wallpoet-regular" style="color: dodgerblue;">
                            Bienvenide <?= $_SESSION['nombre'] ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
    </nav>
    <?php if ($haylogin): ?>
        <div class="container-btn-mostrarCarrito align-items-center">
            <button class="btn btn-secondary" id="btn-mostrarCarrito" onclick="mostrarCarrito()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z" />
                </svg>
                <span class="badge text-bg-secondary" id="contador-carrito">
                    <?= isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0 ?>
                </span>
            </button>
            <br />
            <div id="carrito" style="display: none; border: 1px solid #ddd; padding: 10px; margin-top: 10px;"></div>
        </div>
    <?php endif; ?>
</body>
<script src="funciones.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>