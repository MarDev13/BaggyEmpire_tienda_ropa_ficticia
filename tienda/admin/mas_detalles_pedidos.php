<?php require_once("cabecera.php"); ?>
<?php require_once 'conexion.php'; ?>
<?php
$sqlDetalles = 'SELECT * FROM detalles_pedidos';
$stmt = $conn->prepare($sqlDetalles); // Ejecutar consulta directamente
$stmt->execute();
$detalles = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
?>
<div id="box-table" class="container">
  <div class="d-flex justify-content-start">
    <table class="table">
    <thead>
            <th>Detalles del pedido</th>
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
    </div>