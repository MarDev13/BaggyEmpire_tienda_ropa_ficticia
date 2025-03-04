<?php
require_once'cabecera.php';
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


if(!isset($_SESSION['nombre'])){
    header( "Location: login.php");
    exit();
}

$nombre_usuario = $_SESSION['nombre'];
$sqlEmail ='SELECT email FROM usuarios WHERE nombre = :nombre';
$stmt = $conn->prepare($sqlEmail);
$stmt->bindValue(':nombre',$nombre_usuario);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
$usuario_email = $usuario['email'] ?? NULL ;

if(!$usuario_email){
    die("Error: No se ha encontrado el email del usuario");
}

// Obtener ID del pedido
if (!isset($_GET['id'])) {
    die("Error: Pedido no encontrado.");
}

$pedido_id = $_GET['id'];

// Obtener detalles del pedido
$sql_detalles = "SELECT d.*, p.nombre FROM detalles_pedidos d 
                 JOIN productos p ON d.producto_id = p.id
                 WHERE d.pedido_id = :pedido_id";
$stmt_detalles = $conn->prepare($sql_detalles);
$stmt_detalles->execute(['pedido_id' => $pedido_id]);
$detalles = $stmt_detalles->fetchAll(PDO::FETCH_ASSOC);
?>
<body id="body_mas_detalles">
<div id="box-table" class="container">
  <div class="d-flex justify-content-start">
    <table class="tabla-detalles table table-success table-striped"">
    <thead>
           <th>PEDIDO #<?= $pedido_id ?></th>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ID pedido</th>
                  <th scope="col">ID producto</th>
                <th scope="col">Cantidad</th>
              
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalles as $detalle): ?>
                <tr>
                    <td><?= ($detalle['id']) ?></td>
                    <td><?= ($detalle['pedido_id']) ?></td>
                    <td><?= ($detalle['producto_id']) ?></td>
                    <td><?= ($detalle['cantidad']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
</table>
  </div>
  <button id="btn-mis-pedidos" class="btn btn-dark">
        <a class="enlace-mis-pedidos" href="index.php">Volver a la tienda</a>
    </button>
    </div>
    </body>