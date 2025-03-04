<?php
session_start();

$bd = 'bd_tienda';
$host = 'localhost';
$username_bd = 'root';
$password_bd = '';

$dsn = "mysql:host=$host;dbname=$bd";

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['usuario']) &&
    isset($_POST['pass'])
) {
    $email = $_POST['usuario'];
    $pass = $_POST['pass'];


    try {
        $conn = new PDO($dsn, $username_bd, $password_bd);
    } catch (PDOException $e) {
        print $e->getMessage();
        die('ERROR AL CONECTAR');
    }

    $sql = 'SELECT * FROM usuarios WHERE email = :email AND pass = :pass';

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':pass', $pass);

    $stmt->execute();

    $filas = $stmt->fetchAll(pdo::FETCH_ASSOC);
    $total = count($filas);

    //control de acceso
    $ip = $_SERVER['REMOTE_ADDR'];
    $sql_log = 'INSERT INTO accesos(pass, email,  correcto, ip)
            VALUES (:pass, :email,  :correcto,  :ip)';

    $correcto = ($total === 1) ?: 0;
    $insert_stmt = $conn->prepare($sql_log);
    $insert_stmt->bindValue(':pass', $pass);
    $insert_stmt->bindValue(':email', $email);
    $insert_stmt->bindValue(':ip', $ip);
    $insert_stmt->bindValue(':correcto', $correcto, pdo::PARAM_INT);
    $insert_stmt->execute();
    //fin control de accesos

    if ($total === 1) {
        $_SESSION['nombre'] = $filas[0]['nombre'];
        $_SESSION['rol'] = $filas[0]['rol'];
        header('Location: index.php?error=1');
        exit();
    }
}

session_destroy();
header('Location: login.php?error=1');
