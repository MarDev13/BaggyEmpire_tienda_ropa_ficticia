<?php require_once("cabecera.php"); ?>
<?php require_once 'conexion.php'; ?>
<?php require_once 'sql_categorias.php'; ?>
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
<div class="d-flex justify-content-start mt-3 mx-2">
    <div id="box-welcome-adduser" class="container d-flex justify-content-start mb-3 mt-3 kanit-thin">
        <a class="btn btn-secondary disabled placeholder col-4" aria-disabled="true" href="index.php">
            FORMULARIO AÑADIR CATEGORÍA
        </a>
    </div>
</div>
<form action="" method="post">
    <div id="box-add-categorias" class="container d-flex justify-content-start">
        <div class="row">

            <div class="col-12 mb-3">
                <div class="input-group">
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nombre" required>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div class="input-group">
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroup-sizing-default">detalles</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="detalles">
                    </div>
                </div>
                <div id="drop_file_zone" class="d-flex justify-content-end" ondrop="upload_file(event)" ondragover="return false">
                <div id="drag_upload_file">
                    <p>Arrastra la imagen aquí</p>
                    <p>ó</p>
                    <p><input class="btn btn-primary w-100 py-2 mt-3 .kanit-light" id="txt-select-file" type="button" value="Selecciona archivo" onclick="file_explorer();"></p>
                    <input type="file" id="selectfile">
                </div>
            </div>
            </div>
        </div>
        <div class="container d-flex justify-content-start">
            <button id="btn-register-categorias" class="btn btn-primary w-100 py-2 mt-3" type="submit">Registrar categoría</button>
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
    </div>
    </div>
</form>
<div class="d-flex justify-content-start mt-3 mx-2">
    <div id="box-welcome-adduser" class="container d-flex justify-content-start mb-3 mt-3 kanit-thin">
        <a class="btn btn-secondary disabled placeholder col-4" aria-disabled="true" href="index.php">
            FORMULARIO ACTUALIZAR CATEGORÍA
        </a>
    </div>
</div>
<div>
    <form action="" method="post">
        <div id="box-update-categorias" class="container d-flex justify-content-start">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nombre">
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="input-group">
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroup-sizing-default">detalles</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="detalles">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container d-flex justify-content-start">
                <button id="btn-update-categorias" class="btn btn-primary w-100 py-2 mt-3" type="submit">Actualizar categoría</button>
            </div>
            <div class="modal fade" id="modalActualizacion" tabindex="-1" aria-labelledby="modalActualizacionLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalActualizacionLabel">Resultado de actualización</h5>
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
        </div>
    </form>
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
<div class="container">
    <table id="table-user" class="table table-light ">
        <thead>
            <th>Categorías</th>
        </thead>
        <tr>
            <th class="table-secondary">Nombre</th>
            <th class="table-secondary">Id</th>
            <th class="table-secondary">Detalles</th>
            <th class="table-secondary">Acciones</th>
        </tr>
        <?= $fila ?>
    </table>
</div>
<script src="funciones.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>