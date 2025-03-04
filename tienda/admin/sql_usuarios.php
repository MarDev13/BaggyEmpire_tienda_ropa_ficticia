<?php
$sqlusuarios = 'SELECT * FROM usuarios';
$stmt = $conn->prepare($sqlusuarios);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
//DELETE USER
if (isset($_GET['accion']) && $_GET['accion'] === 'delete' && isset($_GET['email'])) {
    $email = $_GET['email'];
    $sqlDelete = 'DELETE FROM usuarios WHERE email = :email';
    $consultaDelete = $conn->prepare($sqlDelete);
    $consultaDelete->bindParam(':email', $email, PDO::PARAM_STR);
    if ($consultaDelete->execute()) {
        $messageDelete = "Usuario eliminado correctamente.";
        $messageTypeDelete = "success";
    } else {
        $messageDelete = "Error al eliminar el usuario.";
        $messageTypeDelete = "danger";
    }
}
//ADD USER
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $cp = isset($_POST['cp']) ? $_POST['cp'] : '';
    $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : '';
    $rol = isset($_POST['rol']) ? $_POST['rol'] : '';
    if (empty($nombre) || empty($email) || empty($pass) || empty($rol)) {
        $message = "Por favor, completa todos los campos obligatorios.";
        $messageType = "danger";
    } else {
        $sqlCheckEmail = 'SELECT COUNT(*) FROM usuarios WHERE email = :email';
        $consultaCheck = $conn->prepare($sqlCheckEmail);
        $consultaCheck->bindParam(':email', $email);
        $consultaCheck->execute();
        if ($consultaCheck->fetchColumn() > 0) {
            $message = "El email ya está registrado. Por favor, elige otro.";
            $messageType = "danger";
        } else {
            $sqlAddUser = 'INSERT INTO usuarios 
            (nombre, pass, email, telefono, direccion, cp, provincia, rol) 
            VALUES 
            (:nombre, :pass, :email, :telefono, :direccion, :cp, :provincia, :rol)';
            $consulteAdd = $conn->prepare($sqlAddUser);
            $consulteAdd->bindParam(':nombre', $nombre);
            $consulteAdd->bindParam(':pass', $pass);
            $consulteAdd->bindParam(':email', $email);
            $consulteAdd->bindParam(':telefono', $telefono);
            $consulteAdd->bindParam(':direccion', $direccion);
            $consulteAdd->bindParam(':cp', $cp);
            $consulteAdd->bindParam(':provincia', $provincia);
            $consulteAdd->bindParam(':rol', $rol);
            if ($consulteAdd->execute()) {
                $messageRegister = "Usuario añadido correctamente.";
                $messageTypeRegister = "success";
            } else {
                $messageRegister = "Error al añadir el usuario.";
                $messageTypeRegister = "danger";
            }
        }
    }
}
//UPDATE USER
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Asegúrate de que se reciben los datos del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $cp = isset($_POST['cp']) ? $_POST['cp'] : '';
    $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : '';
    $rol = isset($_POST['rol']) ? $_POST['rol'] : '';
    if (empty($email)) {
        $message = "Por favor, completa el email es un campo obligatorio.";
        $messageType = "danger";
    } else {
        $sqlUpDateUser = 'UPDATE `usuarios` SET nombre = :nombre,
    pass = :pass,
    email = :email,
    telefono = :telefono,
    direccion = :direccion,
    cp = :cp,
    provincia = :provincia,
    rol = :rol 
    WHERE email = :email';
        $ConsultalUpDateUser = $conn->prepare($sqlUpDateUser);
        $ConsultalUpDateUser->bindParam(':nombre', $nombre);
        $ConsultalUpDateUser->bindParam(':pass', $pass);
        $ConsultalUpDateUser->bindParam(':email', $email);
        $ConsultalUpDateUser->bindParam(':telefono', $telefono);
        $ConsultalUpDateUser->bindParam(':direccion', $direccion);
        $ConsultalUpDateUser->bindParam(':cp', $cp);
        $ConsultalUpDateUser->bindParam(':provincia', $provincia);
        $ConsultalUpDateUser->bindParam(':rol', $rol);
        if ($ConsultalUpDateUser->execute()) {
            $messageUpDate = "Usuario actualizado correctamente.";
            $messageTypeUpDate = "success";
        } else {
            $messageUpdate = "Error al actualizar el usuario.";
            $messageTypeUpDate = "danger";
        }
    }
}
$fila = '';
foreach ($usuarios as $usuario) {
    $fila .=
        "<tr>
     <td>{$usuario['nombre']}</td>
    <td>{$usuario['email']}</td>
     <td>**********</td>
     <td>{$usuario['telefono']}</td>
     <td>{$usuario['rol']}</td>
     <td>
         <button id='btn-delete' onclick='confirmarDeleteUsuario(\"{$usuario['email']}\",\"{$usuario['rol']}\")'>
          <svg id='svg-delete' xmlns='http://www.w3.org/2000/svg' width='6' height='6' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
  <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/>
</svg>Eliminar usuario
         </button>
     </td>
 </tr>";
}
