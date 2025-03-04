<?php require_once("cabecera.php"); ?>
<?php

$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validaciones
    if (
        !isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ||
        !isset($_POST['textArea']) || empty($_POST['textArea']) ||
        !isset($_POST['telefono']) || !preg_match('/^[0-9]{9}$/', $_POST['telefono'])
    ) {
        $error = true;
    }


    if (!$error) {
        echo "<div class='alert alert-success'>Gracias por tu mensaje. Nos pondremos en contacto contigo pronto.</div>";
    }
}
?>
<div class="container">
    <h1 class="wallpoet-regular">Contacto con Baggy Empire</h1>
    <p class="lead">
        Estamos aquí para ayudarte. Si tienes alguna duda, pregunta o necesitas más información, puedes ponerte en contacto con nosotros de las siguientes maneras:<br>
        Redes Sociales: Síguenos y envíanos un mensaje directo a través de nuestras plataformas como Instagram, Facebook o Twitter.<br>
        También puedes escribirnos a través de este formulario. <br>Simplemente déjanos tu Gmail, un breve resumen de lo que te ocurre y tu número de teléfono móvil. Nos pondremos en contacto contigo lo antes posible para resolver cualquier consulta.<br>
        ¡Esperamos saber de ti pronto y ayudarte en todo lo que necesites!
    </p>
    <?php if ($error): ?>
        <div class="alert alert-danger">
            <p>Hubo un problema con los datos ingresados. Por favor, verifica los campos e intenta nuevamente.</p>
        </div>
    <?php endif; ?>
    <form action="contacto.php" method="post">

        <div class="mb-3 mt-5">
            <label for="exampleFormControlInput1" class="form-label wallpoet-regular">Dirección de email</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label wallpoet-regular">Breve resumen</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="textArea" required><?php echo isset($_POST['textArea']) ? $_POST['textArea'] : ''; ?></textarea>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label wallpoet-regular" for="flexRadioDefault1">
                Problemas con envío
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
            <label class="form-check-label wallpoet-regular" for="flexRadioDefault2">
                Devolución
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
            <label class="form-check-label wallpoet-regular" for="flexRadioDefault3">
                Otros
            </label>
        </div>
        <div class="col-md-4 mt-3">
            <label for="validationDefault02" class="form-label wallpoet-regular">Teléfono</label>
            <input type="text" class="form-control" id="validationDefault02" name="telefono" value="<?php echo isset($_POST['telefono']) ? $_POST['telefono'] : ''; ?>" required>
        </div>
        <div class="col-md-4 mt-5">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
        <!-- Mapa de OpenStreetMap  -->
        <div class="container mt-5">
            <iframe width="425" height="350" src="https://www.openstreetmap.org/export/embed.html?bbox=-0.49138873815536505%2C38.345285027677456%2C-0.48784822225570684%2C38.34715722501426&amp;layer=mapnik&amp;marker=38.346221132395115%2C-0.4896184802055359" style="border: 1px solid black"></iframe><br /><small><a href="https://www.openstreetmap.org/?mlat=38.346221&amp;mlon=-0.489618#map=19/38.346221/-0.489618">Ver el mapa más grande</a></small>
        </div>
    </form>
</div>
<?php require_once("pie.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>