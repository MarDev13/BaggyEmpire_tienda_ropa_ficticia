<?php
$sqlProductos = 'SELECT * FROM productos';
$stmt = $conn->prepare($sqlProductos);
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
//ADD PRODUCTS
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
    $ofertas = isset($_POST['ofertas']) ? $_POST['ofertas'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $desc_larga = isset($_POST['desc_larga']) ? $_POST['desc_larga'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
    if (empty($categoria) || empty($precio) || empty($descripcion)) {
        $message = "Por favor, completa todos los campos obligatorios.";
        $messageType = "danger";
    } else {
        $sqlAddProducts = 'INSERT INTO productos 
            (categoria, ofertas, descripcion, desc_larga, id, nombre, precio) 
            VALUES 
            (:categoria, :ofertas, :descripcion, :desc_larga, :id, :nombre, :precio)';
        $consulteAddProducts = $conn->prepare($sqlAddProducts);
        $consulteAddProducts->bindParam(':categoria', $categoria);
        $consulteAddProducts->bindParam(':ofertas', $ofertas);
        $consulteAddProducts->bindParam(':descripcion', $descripcion);
        $consulteAddProducts->bindParam(':desc_larga', $desc_larga);
        $consulteAddProducts->bindParam(':id', $id);
        $consulteAddProducts->bindParam(':nombre', $nombre);
        $consulteAddProducts->bindParam(':precio', $precio);
        if ($consulteAddProducts->execute()) {
            //     $id_productos->lastinsertid();
            //     $sqlAddImagen = 'INSERT INTO fotos (id_productos, imagen)
            // VALUES (:id_productos, :imagen)';

            //     $consulteAddImagen = $conn->prepare($sqlAddImagen);
            //     $consulteAddImagen->bindParam(':id_productos', $id_productos);
            //     $consulteAddImagen->bindParam(':imagen', $imagen);
            //     $consulteAddImagen->execute();
            $messageRegister = "Producto añadido correctamente.";
            $messageTypeRegister = "success";
        } else {
            $messageRegister = "Error al añadir producto.";
            $messageTypeRegister = "danger";
        }
    }
}
//UPDATE PRODUCTS
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
    $ofertas = isset($_POST['ofertas']) ? $_POST['ofertas'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $desc_larga = isset($_POST['desc_larga']) ? $_POST['desc_larga'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
    if (empty($id)) {
        $message = "Por favor, completa el id es un campo obligatorio.";
        $messageType = "danger";
    } else {
        $sqlUpDateProduct = 'UPDATE `productos` SET 
        categoria = :categoria,
    ofertas = :ofertas,
    descripcion = :descripcion,
    desc_larga = :desc_larga,
    id = :id,
    nombre = :nombre,
    precio = :precio
    WHERE id = :id';
        $ConsultalUpDateProduct = $conn->prepare($sqlUpDateProduct);
        $ConsultalUpDateProduct->bindParam(':categoria', $categoria);
        $ConsultalUpDateProduct->bindParam(':ofertas', $ofertas);
        $ConsultalUpDateProduct->bindParam(':descripcion', $descripcion);
        $ConsultalUpDateProduct->bindParam(':desc_larga', $desc_larga);
        $ConsultalUpDateProduct->bindParam(':id', $id);
        $ConsultalUpDateProduct->bindParam(':nombre', $nombre);
        $ConsultalUpDateProduct->bindParam(':precio', $precio);
        if ($ConsultalUpDateProduct->execute()) {
            $messageUpDate = "Usuario actualizado correctamente.";
            $messageTypeUpDate = "success";
        } else {
            $messageUpDate = "Error al actualizar el usuario.";
            $messageTypeUpDate = "danger";
        }
    }
}
//DELETE PRODUCTOS
if (isset($_GET['accion']) && $_GET['accion'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sqlDelete = 'DELETE FROM productos WHERE id = :id';
    $consultaDelete = $conn->prepare($sqlDelete);
    $consultaDelete->bindParam(':id', $id, PDO::PARAM_INT);
    if ($consultaDelete->execute()) {
        $messageDelete = "Producto eliminado correctamente.";
        $messageTypeDelete = "success";
    } else {
        $messageDelete = "Error al eliminar el producto.";
        $messageTypeDelete = "danger";
    }
}
$fila = '';
foreach ($productos as $producto) {
    $fila .=
        "<tr>
     <td>{$producto['nombre']}</td>
    <td>{$producto['id']}</td>
     <td>{$producto['descripcion']}</td>
     <td>{$producto['categoria']}</td>
     <td>{$producto['ofertas']}</td>
       <td>{$producto['precio']}€</td>
     <td>
            <button id='btn-delete' onclick='confirmarDeleteProducto({$producto['id']})'>
          <svg id='svg-delete' xmlns='http://www.w3.org/2000/svg' width='6' height='6' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
  <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/>
</svg>Eliminar producto
         </button>
     </td>
 </tr>";
}
