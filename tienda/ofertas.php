<?php
require_once 'cabecera.php';
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

$ofertas = 'si';

$sqldatosofertas =
    'SELECT p.*,f.imagen
FROM productos p
left JOIN (SELECT f1.id_productos, MAX(f1.imagen) AS imagen
FROM fotos f1
GROUP BY f1.id_productos) f
ON p.id = f.id_productos
WHERE ofertas = :oferta';

$stmt = $conn->prepare($sqldatosofertas);
$stmt->bindValue(':oferta', $ofertas);
$stmt->execute();

$productos = $stmt->fetchAll(pdo::FETCH_ASSOC);



?>


<?php
if ($haylogin) {
?>

    <main class="container flex-shrink-0">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-3 justify-content-center">
            <?php foreach ($productos as $producto): ?>
                <!-- Inicio tarjeta -->
                <div class="col mb-5 pt-5">
                    <div class="card h-100">
                        <!-- Product image
                        <a href="det_mujer.php"> -->
                        <img class="card-img-top" src="img/<?= $producto['imagen'] ?>" alt="...">
                        </a>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h3 style="font-family: wallpoet;  color:black;" class="fw-bolder"><?= $producto['nombre'] ?></h3>
                                <!-- Descripción corta -->
                                <p style="font-family: wallpoet;  color:grace;"><?= $producto['descripcion'] ?></p>
                                <!-- Product price-->
                                <h3 style="font-family: wallpoet;  color:red;"><?= $producto['precio'] ?> €</h3>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $producto['id'] ?>" data-local="carouselExample2">
                            Ver más detalles
                        </button>
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
                                                <form method="post" action="carrito.php">
                                                    <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                                                    <input type="hidden" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>">
                                                    <input type="hidden" name="precio" value="<?= $producto['precio'] ?>">
                                                    <button type="submit" class="btn btn-dark">Añadir e ir a la cesta</button>
                                                </form>
                                                <button class="btn btn-dark" onclick="agregarAlCarritoFetch(<?= $producto['id'] ?>, '<?= $producto['nombre'] ?>', <?= $producto['precio'] ?>)">
                                                    Añadir a la cesta
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Fin tarjeta -->
            <?php endforeach ?>
        </div>
    </main>
<?php } else {
?>
    <main>
        <!-- <li><a href="LOGin.php">INICIAR SESION</a></li> -->

        <div class="card" tabindex="1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Iniciar sesión</h5>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                        <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Para poder acceder a la página debe iniciar sesión.</p>
                    </div>
                    <div class="modal-footer">
                        <a href="LOGin.php" class>
                            <button type="button" class="btn btn-primary">Iniciar sesión</button>
                        </a>
                        <a href="index.php" class="btn">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
}
?>
<?php require_once("pie.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>