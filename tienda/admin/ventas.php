<?php require_once("cabecera.php"); ?>
<?php require_once 'conexion.php'; ?>
<?php
$sqlPedidos = 'SELECT * FROM pedidos';
$stmt = $conn->prepare($sqlPedidos); // Ejecutar consulta directamente
$stmt->execute();
$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
?>
<div id="box-table" class="container">
  <div class="d-flex justify-content-start">
    <table class="table">
    <thead>
            <th>Pedidos</th>
            <tr>
                <th scope="col">Número de pedido</th>
                <th scope="col">Total</th>
                  <th scope="col">Fecha</th>
                <th scope="col">Detalles</th>
                <th scope="col">Usuario</th>
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido): ?>
                <tr>
                    <td><?= ($pedido['id_pedido']) ?></td>
                    <td><?= ($pedido['total']) ?></td>
                    <td><?= ($pedido['fecha']) ?></td>
                    <td><a id="enlace-mas-detalles" href="mas_detalles_pedidos.php?id=<?= $pedido['id_pedido'] ?>">Ver Detalles</a></td>
                    <td><?= ($pedido['usuario_email']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
</table>
  </div>
    </div>