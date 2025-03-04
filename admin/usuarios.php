<?php require_once("cabecera.php"); ?>
<?php require_once 'conexion.php'; ?>
<?php require_once 'sql_usuarios.php'; ?>
<!-- Modal de eliminación -->
<div class="modal fade" id="modalEliminacion" tabindex="-1" aria-labelledby="modalEliminacionLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminacionLabel">Resultado de eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalMessageEliminacion">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <table id="table-user" class="table table-light ">
        <thead>
            <th>Usuarios</th>
        </thead>
        <tr>
            <th class="table-secondary">Nombre</th>
            <th class="table-secondary">Email</th>
            <th class="table-light">Contraseña</th>
            <th class="table-secondary">Telefono</th>
            <th class="table-light">Rol</th>
            <th class="table-secondary">Acciones</th>
        </tr>
        <?= $fila ?>
    </table>
</div>
<main>
    <div id="box-welcome" class="container d-flex justify-content-start mb-3  kanit-thin">
        <a class="btn btn-secondary disabled placeholder col-4" aria-disabled="true" href="index.php">
            FORMULARIO DE REGISTRO
        </a>
    </div>
    <form action="" method="post">
        <div class="container d-flex justify-content-start">
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
                <div class="col-11 mb-3">
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                        <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email" required>
                    </div>
                </div>
                <div class="col-11 mb-3">
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroup-sizing-default">Teléfono</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="telefono" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-flex justify-content-start">
            <div class="row">
                <div class="col-12 mb-3 m-1 ">
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroup-sizing-default">Dirección</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="direccion" required>
                    </div>
                </div>
                <div class="col-12 mb-3 ">
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroup-sizing-default">CP</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="cp" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3 m-1">
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
        </div>
        <div class="container d-flex justify-content-start">
            <button id="btn-register" class="btn btn-primary w-100 py-2 mt-3" type="submit">Registrar usuario</button>
        </div>
        <div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="modalRegistroLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalRegistroLabel">Resultado de registro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalMessageRegistro">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php if (!empty($error)): ?>
        <p class="error"><?= $error; ?></p>
    <?php endif; ?>
</main>
<div id="box-welcome" class="container d-flex justify-content-start mb-3  kanit-thin">
    <a class="btn btn-secondary disabled placeholder col-4" aria-disabled="true" href="index.php">
        FORMULARIO DE ACTUALIZACIÓN
    </a>
</div>
<form action="" method="post">
    <div class="container d-flex justify-content-start">
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
                    <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpBlock" name="pass" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-11 mb-3">
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                    <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email" required>
                </div>
            </div>
            <div class="col-11 mb-3">
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">Teléfono</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="telefono" required>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-start">
        <div class="row">
            <div class="col-12 mb-3 m-1 ">
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">Dirección</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="direccion" required>
                </div>
            </div>
            <div class="col-12 mb-3 ">
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">CP</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="cp" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3 m-1">
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
    </div>
    <div class="container d-flex justify-content-start">
        <button id="btn-upDate" class="btn btn-primary w-100 py-2 mt-3" type="submit">Actualizar usuario</button>
    </div>
    <div class="modal fade" id="modalActualizacion" tabindex="-1" aria-labelledby="modalActualizacionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalActualizacionLabel">Resultado actualización</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalMessageActualizacion">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    $messageRegister = $messageRegister ?? '';
    $messageTypeRegister = $messageTypeRegister ?? '';
    $messageDelete = $messageDelete ?? '';
    $messageTypeDelete = $messageTypeDelete ?? '';
    $messageUpDate = $messageUpDate ?? '';
    $messageTypeUpDate = $messageTypeUpDate ?? '';
    if (!empty($messageRegister)) {
        $activeModal = 'register';
    } elseif (!empty($messageDelete)) {
        $activeModal = 'delete';
    } elseif (!empty($messageUpDate)) {
        $activeModal = 'update';
    } else {
        $activeModal = '';
    }
    ?>
    <?php if (!empty($messageRegister)): ?>
        <script>
            var activeModal = "<?= $activeModal ?>";
            if (activeModal === 'register') {
                document.addEventListener('DOMContentLoaded', function() {
                    var modalMessageRegistro = document.getElementById('modalMessageRegistro');
                    modalMessageRegistro.textContent = "<?= addslashes($messageRegister) ?>";
                    modalMessageRegistro.classList.add('alert', 'alert-<?= $messageTypeRegister ?>');
                    var modalRegistro = new bootstrap.Modal(document.getElementById('modalRegistro'));
                    modalRegistro.show();
                })
            };
        </script>
    <?php endif; ?>
    <?php if (!empty($messageDelete)): ?>
        <script>
            var activeModal = "<?= $activeModal ?>";
            if (activeModal === 'delete') {
                document.addEventListener('DOMContentLoaded', function() {
                    var modalMessageEliminacion = document.getElementById('modalMessageEliminacion');
                    modalMessageEliminacion.textContent = "<?= addslashes($messageDelete) ?>";
                    modalMessageEliminacion.classList.add('alert', 'alert-<?= $messageTypeDelete ?>');
                    var modalEliminacion = new bootstrap.Modal(document.getElementById('modalEliminacion'));
                    modalEliminacion.show();
                })
            };
        </script>
    <?php endif; ?>
    <?php if (!empty($messageUpDate)): ?>
        <script>
            var activeModal = "<?= $activeModal ?>";
            if (activeModal === 'update') {
                document.addEventListener('DOMContentLoaded', function() {
                    var modalMessageActualizacion = document.getElementById('modalMessageActualizacion');
                    modalMessageActualizacion.textContent = "<?= addslashes($messageUpDate) ?>";
                    modalMessageActualizacion.classList.add('alert', 'alert-<?= $messageTypeUpDate ?>');
                    var modalActualizacion = new bootstrap.Modal(document.getElementById('modalActualizacion'));
                    modalActualizacion.show();

                })
            };
        </script>
    <?php endif; ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="funciones.js"></script>
    </body>
    