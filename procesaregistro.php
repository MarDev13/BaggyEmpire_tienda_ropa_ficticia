<?php
session_start();

$bd = 'bd_tienda';
$host = 'localhost';
$username_bd = 'root';
$password_bd = '';

$dsn = "mysql:host=$host;dbname=$bd";

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['nombre']) &&
    isset($_POST['pass']) &&
    isset($_POST['email']) &&
    isset($_POST['telefono']) &&
    isset($_POST['direccion']) &&
    isset($_POST['cp']) &&
    isset($_POST['provincia']) &&
    isset($_POST['rol'])
) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $cp = $_POST['cp'];
    $provincia = $_POST['provincia'];
    $rol = $_POST['rol'];

    try {
        $conn = new PDO($dsn, $username_bd, $password_bd);

        // Verificar si el correo ya existe
        $checkEmailSql = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
        $stmt = $conn->prepare($checkEmailSql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $emailExists = $stmt->fetchColumn();

        if ($emailExists > 0) {
            // Si el email ya está en uso, redirigir con un mensaje de error
            header('Location: registro.php?error=email_duplicado');
            exit();
        }
    } catch (PDOException $e) {
        // print $e->getMessage();
        die('ERROR AL CONECTAR');
    }

    $sql_log = 'INSERT INTO usuarios (nombre, pass, email, telefono, direccion, cp, provincia, rol)
            VALUES (:nombre, :pass, :email, :telefono, :direccion, :cp, :provincia, :rol)';


    $stmt = $conn->prepare($sql_log);
    $stmt->bindValue(':nombre', $nombre);
    $stmt->bindValue(':pass', $pass);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':telefono', $telefono);
    $stmt->bindValue(':direccion', $direccion);
    $stmt->bindValue(':cp', $cp);
    $stmt->bindValue(':provincia', $provincia);
    $stmt->bindValue(':rol', $rol);

    if ($stmt->execute()) {

        $_SESSION['nombre'] = $nombre;
        $_SESSION['rol'] = $rol;
        header('Location: index.php');
        exit();
    } else {
        header('Location: login.php?error=1');
        exit();
    }
}

session_destroy();
header('Location: login.php?error=1');
