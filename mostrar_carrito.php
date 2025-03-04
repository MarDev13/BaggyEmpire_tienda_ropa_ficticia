<?php
session_start();

if (!isset($_SESSION['carrito']) || count($_SESSION['carrito']) === 0) {
    echo "<p>El carrito está vacío.</p>";
    exit;
}

// Creamos la tabla con clases para mejor visualización
echo "<table id='table-carrito'>";
echo "<tr style='background-color: #f8f9fa;'>
        <th style='border-bottom: 2px solid #dee2e6; padding: 8px;'>Producto</th>
        <th style='border-bottom: 2px solid #dee2e6; padding: 8px;'>Precio</th>
      </tr>";

foreach ($_SESSION['carrito'] as $produc) {
    echo "<tr>
            <td style='border-bottom: 1px solid #dee2e6; padding: 8px;'>{$produc['nombre']}</td>
            <td style='border-bottom: 1px solid #dee2e6; padding: 8px;'>{$produc['precio']}€</td>
          </tr>";
}
echo "</table>";
echo "<div style='text-align: center; margin-top: 10px;'>
        <a href='carrito.php' style='display: inline-block; padding: 8px 12px; background-color:#12253d; color: white; text-decoration: none; border-radius: 4px;'>Ir al carrito</a>
      </div>";
?>
