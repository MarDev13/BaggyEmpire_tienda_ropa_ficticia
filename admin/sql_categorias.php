<?php
$sqlcategorias = 'SELECT * FROM categorias';
$stmt = $conn->prepare($sqlcategorias); // Ejecutar consulta directamente
$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados
//DELETE CATEGORIA
if (isset($_GET['accion']) && $_GET['accion'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    // Consulta para eliminar el usuario basado en su email
    $sqlDeleteCategoria = 'DELETE FROM categorias WHERE id = :id';
    $consultaDeleteCategoria = $conn->prepare($sqlDeleteCategoria);
    $consultaDeleteCategoria->bindParam(':id', $id, PDO::PARAM_INT);
    if ($consultaDeleteCategoria->execute()) {
        $messageDelete = "Categoría eliminada correctamente.";
        $messageTypeDelete = "success";
    } else {
        $messageDelete = "Error al eliminar categoría.";
        $messageTypeDelete = "danger";
    }
}
//ADD CATEGORIA
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Asegúrate de que se reciben los datos del formulario
   
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $detalles = isset($_POST['detalles']) ? $_POST['detalles'] : '';
    // Verificar si el formulario ha sido completado antes de continuar
    if (empty($nombre)) {
        $message = "Por favor, completa todos los campos obligatorios.";
        $messageType = "danger";
    } else {
        $sqlAddCategoria = 'INSERT INTO categorias 
            (nombre, detalles) 
            VALUES 
            (:nombre, :detalles)';
        $consulteAddCategoria = $conn->prepare($sqlAddCategoria);
       
        $consulteAddCategoria->bindParam(':nombre', $nombre);
        $consulteAddCategoria->bindParam(':detalles', $detalles);
        if ($consulteAddCategoria->execute()) {
            $messageRegister = "Categoría añadida correctamente.";
            $messageTypeRegister = "success";
        } else {
            $messageRegister = "Error al añadir la categoría.";
            $messageTypeRegister = "danger";
        }
    }
}
//UPDATE CATEGORÍA
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $detalles = isset($_POST['detalles']) ? $_POST['detalles'] : '';
    if (empty($nombre)) {
        $message = "Por favor, completa el nombre, es un campo obligatorio.";
        $messageType = "danger";
    } else {
        $sqlUpDateCategoria = 'UPDATE `categorias` SET 
            detalles = :detalles,
            nombre = :nombre
            WHERE nombre = :nombre';
        $ConsultaUpDateCategoria = $conn->prepare($sqlUpDateCategoria);
        $ConsultaUpDateCategoria->bindParam(':id', $id, PDO::PARAM_INT);
        $ConsultaUpDateCategoria->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $ConsultaUpDateCategoria->bindParam(':detalles', $detalles, PDO::PARAM_STR);
        if ($ConsultaUpDateCategoria->execute()) {
            $messageUpDate = "Categoría actualizada correctamente.";
            $messageTypeUpDate = "success";
        } else {
            $messageUpDate = "Error al actualizar categoría.";
            $messageTypeUpDate = "danger";
        }
    }
}
$fila = '';
foreach ($categorias as $categoria) {
    $fila .=
        "<tr>
     <td>{$categoria['nombre']}</td>
    <td>{$categoria['id']}</td>
      <td>{$categoria['detalles']}</td>
     <td>
         <button id='btn-delete' onclick='confirmarDeleteCategoria(\"{$categoria['id']}\",\"{$categoria['nombre']}\")'>
          <svg id='svg-delete' xmlns='http://www.w3.org/2000/svg' width='6' height='6' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
  <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/>
</svg>Eliminar categoría
         </button>
     </td>
 </tr>";
}
?>