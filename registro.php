<?php require_once "cabecera.php"; ?>

<div class="col-md-6">
  <header class="d-flex justify-content-center">
    <h2 class="mb-3 wallpoet-regular">Regístrate en el Beat</h2>
  </header>
  <main>
    <div class="container d-flex justify-content-center">
    <form action="procesaregistro.php" method="post">
      <div class="row">
        <div class="col-12 mb-3">
          <div class="input-group">
            <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nombre" required>
          </div>
        </div>
        <div class="col-12 mb-3">
          <div class="input-group">
            <span class="input-group-text" id="inputGroup-sizing-default">contraseña</span>
            <label for="inputPassword5" class="form-label"></label>
            <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="pass" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mb-3">
          <div class="input-group">
            <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
            <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email" required>
          </div>
        </div>
        <div class="col-12 mb-3">
          <div class="input-group">
            <span class="input-group-text" id="inputGroup-sizing-default">Teléfono</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="telefono" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mb-3">
          <div class="input-group">
            <span class="input-group-text" id="inputGroup-sizing-default">Dirección</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="direccion" required>
          </div>
        </div>
        <div class="col-12 mb-3">
          <div class="input-group">
            <span class="input-group-text" id="inputGroup-sizing-default">CP</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="cp" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mb-3">
          <div class="input-group">
            <span class="input-group-text" id="inputGroup-sizing-default">Provincia</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="provincia" required>
          </div>
        </div>
        <div class="col-12 mb-3">
          <div class="input-group">
            <span class="input-group-text" id="inputGroup-sizing-default">Rol</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="rol" required>
          </div>
        </div>
      </div>
      <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Registrar usuario</button>
    </form>
    </div>
    <?php if (!empty($error)): ?>
      <p class="error"><?= $error; ?></p>
    <?php endif; ?>
  </main>
</div>
</div>
</div>

<?php require_once "pie.php"; ?>