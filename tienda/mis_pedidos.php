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

$sqlPedidos = 'SELECT id_pedido, total, fecha FROM pedidos WHERE usuario_email = :usuario_email ORDER BY fecha DESC';
$stmt = $conn->prepare($sqlPedidos);
$stmt->bindValue(':usuario_email',$usuario_email);
$stmt->execute();

$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<body id="body_mis_pedidos">
    <div class="animation container">
    <h2 class="title-mis-pedidos wallpoet-regular">Mis Pedidos</h2>

    <?php if (count($pedidos) > 0): ?>
        <div class="d-flex justify-content-center mt-3">
        <table class="tabla-pedidos table table-success table-striped">
            <thead>
                <tr>
                    <th class="wallpoet-regular">Número de Pedido</th>
                    <th class="wallpoet-regular">Total</th>
                    <th class="wallpoet-regular">Fecha</th>
                    <th class="wallpoet-regular">Detalles</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                    <tr>
                        <td class="wallpoet-regular">#<?= $pedido['id_pedido'] ?></td>
                        <td><?= number_format($pedido['total'], 2) ?> €</td>
                        <td><?= $pedido['fecha'] ?></td>
                        <td><a id="enlace-mas-detalles" href="detalle_pedido.php?id=<?= $pedido['id_pedido'] ?>">Ver Detalles</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No tienes pedidos aún.</p>
    <?php endif; ?>
        </div>
        <button id="btn-mis-pedidos" class="btn btn-dark">
        <a class="enlace-mis-pedidos" href="index.php">Volver a la tienda</a>
    </div></button>
</body>
</html>