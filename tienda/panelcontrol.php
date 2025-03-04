<?php require_once 'cabecera.php'; ?>

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

// Obtener todos los datos de la tabla 'accesos'
$sqlaccesos = 'SELECT * FROM accesos';
$stmt = $conn->query($sqlaccesos);
$stmt->execute(); // Ejecutar consulta directamente
$accesos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados

?>

<main class="container flex-shrink-0">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Email</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Fecha</th>
                <th scope="col">Sesión correcta</th>
                <th scope="col">IP</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accesos as $acceso): ?>
                <tr>
                    <td><?= ($acceso['email']) ?></td>
                    <td><?= ($acceso['pass']) ?></td>
                    <td><?= ($acceso['fecha']) ?></td>
                    <td><?= ($acceso['correcto']) ?></td>
                    <td><?= ($acceso['ip']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>