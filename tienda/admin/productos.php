<?php require_once("cabecera.php"); ?>
<?php require_once 'conexion.php'; ?>
<?php require_once 'sql_productos.php'; ?>
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
<div id="box-welcome-adduser" class="container d-flex justify-content-start mb-3 mt-3 kanit-thin">
    <a class="btn btn-secondary disabled placeholder col-4" aria-disabled="true" href="index.php">
        FORMULARIO AÑADIR PRODUCTO
    </a>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <div id="box-add-product" class="container d-flex justify-content-start">
        <div class="row">
            <div class="col-12 mb-3">
                <select class="form-select" aria-label="Default select example" name="categoria" required>
                    <option selected>Categorías</option>
                    <option value="mujer">Mujer</option>
                    <option value="hombre">Hombre</option>
                </select>
            </div>
            <div class="col-11 mb-3">
                <div id="box-desc" class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">Descripción</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="descripcion" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <select class="form-select" aria-label="Default select example" name="ofertas" required>
                    <option selected>Oferta</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="col-11 mb-3">
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default" id="title-more-details">Más detalles</span>
                    <textarea id="box-more-details" name="desc_larga"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3  ">
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nombre" required>
                </div>
            </div>
            <div class="col-12 mb-3 ">
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">Precio</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="precio" required>
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
            <div class="img-content"></div>
        </div>
    </div>
    <div class="container d-flex justify-content-start">
        <button id="btn-register" class="btn btn-primary w-100 py-2 mt-3" type="submit">Añadir artículo</button>
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
<div class=" container d-flex justify-content-start mt-3 mb-3">
    <a class="btn btn-secondary disabled placeholder col-4 " aria-disabled="true" href="index.php">
        FORMULARIO ACTUALIZAR PRODUCTO
    </a>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <div id="box-add-product" class="container d-flex justify-content-start">
        <div class="row">
            <div class="col-12 mb-3">
                <select class="form-select" aria-label="Default select example" name="categoria">
                    <option selected>Categorías</option>
                    <option value="mujer">Mujer</option>
                    <option value="hombre">Hombre</option>
                </select>
            </div>
            <div class="col-11 mb-3">
                <div id="box-desc" class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">Descripción</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="descripcion">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <select class="form-select" aria-label="Default select example" name="ofertas">
                    <option selected>Oferta</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="col-11 mb-3">
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default" id="title-more-details">Más detalles</span>
                    <textarea id="box-more-details" name="desc_larga"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3  ">
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nombre">
                </div>
            </div>
            <div class="col-12 mb-3 ">
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">Precio</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="precio">
                </div>
            </div>
            <div class="col-12 mb-3 ">
                <div class="input-group">
                    <span class="input-group-text" id="inputGroup-sizing-default">id</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="id">
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-start">
        <button id="btn-register" class="btn btn-primary w-100 py-2 mt-3" type="submit">Actualizar artículo</button>
    </div>
    <div class="modal fade" id="modalActualizacion" tabindex="-1" aria-labelledby="modalActualizacionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalActualizacionLabel">Resultado de la actualización</h5>
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
</form>
<div class="container">
    <table id="table-user" class="table table-light ">
        <thead>
            <th>Productos</th>
        </thead>
        <tr>
            <th class="table-secondary">Nombre</th>
            <th class="table-secondary">Id</th>
            <th class="table-light">Descripción</th>
            <th class="table-secondary">Categorías</th>
            <th class="table-light">Ofertas</th>
            <th class="table-secondary">Precio</th>
            <th class="table-secondary">Acciones</th>
        </tr>
        <?= $fila ?>
    </table>
</div>
<?php if (!empty($messageRegister)): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modalMessage = document.getElementById('modalMessageRegistro');
            modalMessage.textContent = "<?= addslashes($messageRegister) ?>";
            modalMessage.classList.add('alert', 'alert-<?= $messageTypeRegister ?>');
            var modalRegistro = new bootstrap.Modal(document.getElementById('modalRegistro'));
            modalRegistro.show();
        });
    </script>
<?php endif; ?>
<?php if (!empty($messageDelete)): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modalMessage = document.getElementById('modalMessageEliminacion');
            modalMessage.textContent = "<?= addslashes($messageDelete) ?>";
            modalMessage.classList.add('alert', 'alert-<?= $messageTypeDelete ?>');
            var modalEliminacion = new bootstrap.Modal(document.getElementById('modalEliminacion'));
            modalEliminacion.show();
        });
    </script>
<?php endif; ?>
<?php if (!empty($messageUpDate)): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modalMessage = document.getElementById('modalMessageActualizacion');
            modalMessage.textContent = "<?= addslashes($messageUpDate) ?>";
            modalMessage.classList.add('alert', 'alert-<?= $messageTypeUpDate ?>');
            var modalActualizacion = new bootstrap.Modal(document.getElementById('modalActualizacion'));
            modalActualizacion.show();
        });
    </script>
<?php endif; ?>
<script src="funciones.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>