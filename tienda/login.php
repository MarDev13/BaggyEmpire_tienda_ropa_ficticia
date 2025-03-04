<?php require_once "cabecera.php"; ?>

<div class="container mt-5">
  <h1 class="wallpoet-regular"> Bienvenido a Baggy Empire</h1>
  ¡Gracias por unirte a nuestra comunidad! Para acceder a tu cuenta y realizar compras en línea, por favor ingresa tu usuario y contraseña. Si aún no tienes una cuenta, no te preocupes: también puedes registrarte directamente en esta página y empezar a disfrutar de todos los beneficios exclusivos para nuestros clientes. ¡Regístrate y comienza a comprar ahora!
</div>
<div class="container mt-5">
  <div class="row">
    <!-- Formulario de Inicio de Sesión -->
    <div class="col-md-6">
      <header>
        <h2 class="mb-3 wallpoet-regular">Entra en el Beat</h2>
      </header>
      <main>
        <form action="procesalogin.php" method="post">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="usuario" required>
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass" required>
            <label for="floatingPassword">Contraseña</label>
          </div>
          <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Iniciar sesión</button>
        </form>
        <?php if (!empty($error)): ?>
          <p class="error"><?= $error; ?></p>
        <?php endif; ?>
      </main>
    </div>
  </div>
    <p>Si no tienes cuenta,<a href="registro.php"> registrate aquí</a></p>
   