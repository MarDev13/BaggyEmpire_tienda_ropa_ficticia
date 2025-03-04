<?php require_once("cabecera.php");
$haylogin = isset($_SESSION['nombre']);
if (!isset($_SESSION['nombre'])) {
  header('Location: login.php');
  exit();
}
?>
<!-- SLIDER -->
 
 <!-- Contenedor para mostrar la frase -->
 <!-- <div id="frase-container" class="mt-4 text-center p-5">
        <h4 id="frase" class="frase-text">¿Sabías que...?</h4>
    </div> -->
    <!-- <script type="module"> -->
    <!-- import { obtenerFraseAleatoria } from './llamada_api.js';  // Asegúrate de la ruta correcta -->

    <!-- // Función para mostrar la frase en el contenedor
    async function mostrarFrase() {
        const frase = await obtenerFraseAleatoria();
        document.getElementById('frase').innerText = frase;  // Muestra la frase en el elemento
    } -->

    <!-- // Llamamos a la función para mostrar una frase aleatoria
    // mostrarFrase(); -->
</script>
<div class="container mt-5">
  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/slider3.jpg" class="d-block w-100" alt="imagenPslider">
      </div>
      <div class="carousel-item">
        <img src="img/slider1.jpg" class="d-block w-100" alt="imagenPslider">
      </div>
      <div class="carousel-item">
        <img src="img/slider2.jpg" class="d-block w-100" alt=".imagenPslider">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
<main>
  <!-- INTRODUCCIÓN SOBRE LA TIENDA -->
  <div class="container mt-5">
    <h2 class="wallpoet-regular ">La Historia de Baggy Empire</h2>
    <p class="lead">En los 2000, las calles vibraban con el ritmo del hip hop, los graffitis llenaban las paredes y el estilo lo era todo. En ese mundo nació la esencia de Baggy Empire. Inspirada en la época dorada de la ropa oversize, las cadenas llamativas y las zapatillas icónicas, esta tienda es más que un lugar para comprar ropa: es un homenaje a una cultura que revolucionó el estilo y la actitud.

      Baggy Empire surge para devolver el flow de esos años al presente. Aquí no solo encontrarás prendas, sino piezas con historia, diseñadas para que lleves la calle contigo, con orgullo y estilo. Ya seas una Reina del Asfalto o un Rey del Barrio, nuestro imperio está abierto para ti.

      Grandes íconos como Tupac, Biggie, Missy Elliott, y Aaliyah no solo marcaron la historia del hip hop, sino también dejaron huella en la moda, convirtiendo el estilo urbano en una forma de expresión global. En Baggy Empire, seguimos ese legado, llevando el espíritu de estas leyendas a cada prenda que ofrecemos.

      ¡Bienvenid@ al lugar donde el drip nunca pasa de moda y el flow de los grandes siempre está presente! 👑✨</p>
  </div>
</main>
<!-- FOOTER -->
 <!-- <script src="llamada_api.js"></script> -->
<?php require_once("pie.php"); ?>