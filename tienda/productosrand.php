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

$sqlrandom = '
    SELECT 
        p.id, 
        p.nombre, 
        p.descripcion, 
        p.precio, 
        f.imagen
    FROM 
        productos p
    LEFT JOIN (
        SELECT 
            f1.id_productos, 
            MAX(f1.imagen) AS imagen
        FROM 
            fotos f1
        GROUP BY f1.id_productos
    ) f ON p.id = f.id_productos
    ORDER BY RAND()
    LIMIT 3';

$stmt = $conn->prepare($sqlrandom);
$stmt->execute();

$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h4 class="text-center" style="font-family: wallpoet; color:black;"><abbr title="HyperText Markup Language" class="initialism">¡Estas prendas han sido seleccionadas especialmente para ti según tus gustos!</abbr></h4>
<main class="container flex-shrink-0">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-3 justify-content-center">
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
                <div class="col mb-5 pt-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="img/<?= htmlspecialchars($producto['imagen']) ?>" alt="Imagen del producto">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h3 style="font-family: wallpoet; color:black;" class="fw-bolder"><?= htmlspecialchars($producto['nombre']) ?></h3>
                                <p style="font-family: wallpoet; color:gray;"><?= htmlspecialchars($producto['descripcion']) ?></p>
                                <h3 style="font-family: wallpoet; color:blue;"><?= htmlspecialchars($producto['precio']) ?> €</h3>
                            </div>
                        </div>
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $producto['id'] ?>" data-local="carouselExample2">
                            Ver más detalles
                        </button>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?= $producto['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 style="font-family: wallpoet;  color:blue;" class="modal-title fs-5" id="exampleModalLabel"><?= $producto['nombre'] ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php
                                // SQL para obtener las imágenes de las fotos asociadas con el producto
                                $sqlfotos = 'SELECT imagen, id_productos FROM fotos WHERE id_productos = :id';
                                $stmt = $conn->prepare($sqlfotos);
                                $stmt->bindParam(':id', $producto['id']); // Usar el ID del producto
                                $stmt->execute();
                                $fotos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                ?>

                                <!-- Carrusel dentro del modal -->
                                <div id="carouselExample<?= $producto['id'] ?>" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php foreach ($fotos as $index => $foto): ?>
                                            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                                <img class="d-block w-100" src="img/<?= $foto['imagen'] ?>" alt="Imagen producto" />
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="modal-dialog"> <!-- Descripción larga -->
                                        <p><?= $producto['desc_larga'] ?></p>
                                    </div>
                                    <!-- Controles del carrusel -->
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample<?= $producto['id'] ?>" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample<?= $producto['id'] ?>" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-dark">Añadir a la cesta</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin tarjeta -->
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos disponibles.</p>
        <?php endif; ?>
    </div>
</main>