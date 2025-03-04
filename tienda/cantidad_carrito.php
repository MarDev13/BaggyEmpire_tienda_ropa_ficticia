<?php
session_start();

// Devuelve la cantidad total de productos en el carrito
echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0;
?>
