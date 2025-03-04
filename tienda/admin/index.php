<?php require_once'conexion.php';?>
<?php
// Obtener todos los datos de la tabla 'usuarios'
$sqlusuarios = 'SELECT * FROM usuarios';
$stmt = $conn->prepare($sqlusuarios); // Ejecutar consulta directamente
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
// Obtener todos los datos de la tabla 'productos'
$sqlproductos = 'SELECT * FROM productos';
$stmt2 = $conn->prepare($sqlproductos); // Ejecutar consulta directamente
$stmt2->execute();
$productos = $stmt2->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados


// Obtener todos los datos de la tabla 'categorías'
$sqlcategorias = 'SELECT * FROM categorias';
$stmt = $conn->prepare($sqlcategorias); // Ejecutar consulta directamente
$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultado
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



<div id="box-welcome" class="d-flex justify-content-center  kanit-thin">
    <a class="btn btn-secondary disabled placeholder col-4" aria-disabled="true">
        BIENVENIDO AL PANEL DE CONTROL PARA ADMINISTRADORES
    </a>
    </div>
    <div id="box-buttons" class="btn-group d-flex justify-content-start kanit-light" role="group" aria-label="Basic mixed styles example">
        <button type="button" class="btn btn-dark" onclick="window.location.href='categorias.php'" >Categorías</button>
        <button type="button" class="btn btn-secondary" onclick="window.location.href='productos.php'" >Productos</button>
        <button type="button" class="btn btn-dark" onclick="window.location.href='usuarios.php'" >Usuarios</button>
        <button type="button" class="btn btn-secondary" onclick="window.location.href='ventas.php'">Ventas</button>
    </div>
    <div id="box-tittle-text" class="container ">
    <h1 id="tittle-welcome" class="d-flex justify-content-center kanit-thin">¡Bienvenido al Panel de Control!</h1>
    <div id="box-txt-welcome" class="container d-flex justify-content-center" >
    <p class="kanit-light">
        <strong>1. Categorías:</strong> En esta sección podrás gestionar las categorías de tus productos.<br>
        Añade nuevas categorías para organizar tu inventario, actualiza las existentes o elimina aquellas que ya no necesites.<br>
    </p>
    <p  class="kanit-light">
        <strong>2. Productos:</strong> Administra todos tus productos desde aquí.<br>
        Podrás agregar nuevos artículos, modificar sus detalles o eliminarlos según las necesidades de tu catálogo.<br>
    </p>
    <p  class="kanit-light">
        <strong>3. Usuarios:</strong> Gestiona los usuarios registrados en tu página.<br>
        Aquí podrás revisar información, actualizar permisos o eliminar cuentas según corresponda.<br>
    </p>
    <p  class="kanit-light">
        <strong>4. Ventas (Próximamente):</strong> Actualmente, esta sección no está disponible.<br>
        En futuras actualizaciones podrás visualizar y administrar el historial de ventas, así como obtener reportes detallados.<br>
    </p>
        </p>
    </div>
    </div>
    <div id="box-table" class="container">
    <div class="d-flex justify-content-start">
    <table class="table">
    <thead>
            <th>Usuarios</th>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Contraseña</th>
                  <th scope="col">Email</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Dirección</th>
                <th scope="col">Provincia</th>
                <th scope="col">Código Postal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= ($usuario['nombre']) ?></td>
                    <td>**********</td>
                    <td><?= ($usuario['email']) ?></td>
                    <td><?= ($usuario['telefono']) ?></td>
                    <td><?= ($usuario['direccion']) ?></td>
                    <td><?= ($usuario['provincia']) ?></td>
                    <td><?= ($usuario['cp']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
</table>
    </div>
<div class="d-flex justify-content-start">

<table class="table">
    <thead>
            <th>Productos</th>
            <tr>
                <th scope="col">Categoría</th>
                <th scope="col">Ofertas</th>
                  <th scope="col">Descripción</th>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
             
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= ($producto['categoria']) ?></td>
                    <td><?= ($producto['ofertas']) ?></td>
                    <td><?= ($producto['descripcion']) ?></td>
                    <td><?= ($producto['id']) ?></td>
                    <td><?= ($producto['nombre']) ?></td>
                    <td><?= ($producto['precio'])?>€</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
</table>
</div>
<div class="d-flex justify-content-start">
<table class="table">
<thead>
            <th>Categorías</th>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                  
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?= ($categoria['nombre']) ?></td>
                    <td><?= ($categoria['id']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
</table>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>