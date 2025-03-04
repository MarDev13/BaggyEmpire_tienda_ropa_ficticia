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



if (!isset($_SESSION['carrito']) || count($_SESSION['carrito']) === 0) {
    header("Location: index.php");
    exit();
}

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['nombre'])) {
    die("Error: No hay usuario autenticado. Por favor, inicia sesión.");
}

// Obtener el email del usuario usando el nombre de la sesión
$nombre_usuario = $_SESSION['nombre'];

$sqlEmail = 'SELECT email FROM usuarios WHERE nombre = :nombre';
$stmt = $conn->prepare($sqlEmail);
$stmt->bindValue(':nombre', $nombre_usuario);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
$usuario_email = $usuario['email'] ?? null;

// Verificar si se obtuvo el email
if (!$usuario_email) {
    die("Error: No se encontró el email del usuario.");
}

try {
    $total = array_sum(array_column($_SESSION['carrito'], 'precio'));

    $stmt = $conn->prepare("INSERT INTO pedidos (usuario_email, total) VALUES (:usuario_email, :total)");
    $stmt->execute([
        'usuario_email' => $usuario_email,
        'total' => $total
    ]);

    $pedido_id = $conn->lastInsertId();

    $stmt = $conn->prepare("INSERT INTO detalles_pedidos (pedido_id, producto_id, cantidad) 
                            VALUES (:pedido_id, :producto_id, :cantidad)");

    foreach ($_SESSION['carrito'] as $item) {
        $stmt->execute([
            'pedido_id' => $pedido_id,
            'producto_id' => $item['id'],
            'cantidad' => 1
        ]);
    }

    $_SESSION['carrito'] = [];
} catch (Exception $e) {
    die("Error al procesar la compra: " . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Compra realizada con éxito</title>
</head>
<body id="body-finalizar">
    
<div class="animation">
    <h4 class="title-finalizar wallpoet-regular">¡Gracias por tu compra!</h4>
    </div>
    <div class="ticket-final container d-flex justify-content-center">
    <ul class="list-ticket">
        <li class="wallpoet-regular">🛒 Tienda: Baggy Empire</li>
        <li class="wallpoet-regular">📍 Dirección: Virgen del socorro</li>
        <li class="wallpoet-regular">🧾 Número de ticket: 91238743</li>
    </ul>
    </div>
    <button id="btn-vlr" class="btn btn-dark" >
    <a class="enlace-vovler-tienda" href="index.php">Volver a la tienda</a>
    </button>
</body>
</html>