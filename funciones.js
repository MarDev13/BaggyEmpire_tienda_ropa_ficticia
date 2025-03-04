

function agregarAlCarritoFetch(id, nombre, precio) {
    fetch(`actualizar_carrito.php?id=${id}&nombre=${nombre}&precio=${precio}`, {
        'method': 'GET',
        'headers': { 'Content-Type': 'application/x-www-form-urlencoded' }
     })
    .then(response => response.json())
    .then(data => {
        console.log(data);
          document.getElementById('carrito-count').textContent = data.carrito_count;
 });
 actualizarCantidadCarrito();
}

function mostrarCarrito() {
    fetch('mostrar_carrito.php')
        .then(response => response.text())
        .then(html => {
            Swal.fire({
                title: "Tu cesta",
                html: html,  // Muestra la tabla del carrito dentro de la alerta
                showCloseButton: true,
                showConfirmButton: false,
                width: '20%',
                padding: '1rem',
                background: '#fff',
                customClass: {
                    popup: 'custom-popup-class'
                }
            });
        })
        .catch(error => {
            console.error("Error al cargar el carrito:", error);
            Swal.fire("Error", "No se pudo cargar el carrito.", "error");
        });
}

function actualizarCantidadCarrito() {
    fetch('cantidad_carrito.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('contador-carrito').textContent = data;
        })
        .catch(error => console.error("Error al actualizar el carrito:", error));
}


