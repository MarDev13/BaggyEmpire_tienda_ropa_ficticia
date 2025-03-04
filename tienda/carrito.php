<?php
require_once 'cabecera.php';

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['nombre'], $_POST['precio'])) {
    $producto = [
        'id' => $_POST['id'],
        'nombre' => $_POST['nombre'],
        'precio' => $_POST['precio'],
        'cantidad' => 1
    ];

    array_push($_SESSION['carrito'], $producto);
}

if (isset($_GET['eliminar'])) {
    array_splice(
        $_SESSION['carrito'],
        $_GET['eliminar'],
        1
    );
}

$total = array_sum(array_column($_SESSION['carrito'], 'precio'));
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cesta</title>
    <link rel="stylesheet" href="baggy_empire.css">
</head>

<body id="body-cesta">
    <div  class="container justify-content-center">
        <div class="animation bg-title-cesta">
        <h1 class="title-carrito wallpoet-regular"  onLoad="scroll();"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z" />
            </svg> Mi cesta <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z" />
            </svg></h1>
            </div>
        <table id="tablecarrito">
            <tr>
                <th class="carrito-colum">Producto</th>
                <th class="carrito-colum">Precio</th>
                <th class="carrito-colum">Acción</th>
            </tr>
            <?php foreach ($_SESSION['carrito'] as $i => $produc) { ?>
                <tr>
                    <td class="carrito-fila"><?= $produc['nombre'] ?></td>
                    <td class="carrito-fila"><?= $produc['precio'] ?>€</td>
                    <td class="carrito-fila"><a href="carrito.php?eliminar=<?= $i ?>">Eliminar</a></td>
                </tr>
            <?php } ?>
        </table>
        <div class="bg-dos-buttons">
       <div class="animation bg-buttons">
        <div class="box-buttons d-flex justify-content-evenly align-items-center">
        <p class='bg-total'>Total: <?= $total ?>€</p>
        <form method="post" action="finalizar.php">
       
        <button type="button" class="btn-seguir-comprando btn btn-dark mt-2"><a class="enlace" href="index.php">Seguir comprando</a></button>
    </div>
       </div>
    <button id="btn-finish" class="btn btn-dark mt-2" type="submit">Finalizar Compra</button>
    </div>
    </form>
    </div>
    
</body>

</html>