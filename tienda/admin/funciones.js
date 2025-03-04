//BORRAR USERS
function confirmarDeleteUsuario(email) {
    Swal.fire({
        title: '¿Esta seguro de eliminar al usuario?',
        text: "¡No podrás revertir esto!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1abc9c',
        cancelButtonColor: '#f1948a',
        confirmButtonText: 'Si, Eliminar!'
    }).then((result) => {
        if (result.value) {
            window.location.href = `usuarios.php?accion=delete&email=${email}`;
        }
    });
}
function confirmarDeleteProducto(id) {
    Swal.fire({
        title: '¿Esta seguro de eliminar el producto?',
        text: "¡No podrás revertir esto!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1abc9c',
        cancelButtonColor: '#f1948a',
        confirmButtonText: 'Si, Eliminar!'
    }).then((result) => {
        if (result.value) {
            window.location.href = `productos.php?accion=delete&id=${id}`;
        }
    });
}
function confirmarDeleteCategoria(id, nombre) {
    Swal.fire({
        title: '¿Esta seguro de eliminar el categoría?',
        text: "¡No podrás revertir esto!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1abc9c',
        cancelButtonColor: '#f1948a',
        confirmButtonText: 'Si, Eliminar!'
    }).then((result) => {
        if (result.value) {
            window.location.href = `categorias.php?accion=delete&id=${id}`;
        }
    });
}

function refrescarPagina() {
    window.location.reload();
}
//SUBIR ARCHIVOS
let fileobj;
function upload_file(e) {
    e.preventDefault();
    fileobj = e.dataTransfer.files[0];
    ajax_file_upload(fileobj);
}
function file_explorer() {
    document.querySelector('#selectfile').click();
    document.querySelector('#selectfile').onchange = function () {
        fileobj = document.querySelector('#selectfile').files[0];
        ajax_file_upload(fileobj);
    }
}
function ajax_file_upload(file_obj) {
    if (file_obj != undefined) {
        let form_data = new FormData
        form_data.append('file', file_obj);
        let xhttp = new XMLHttpRequest();
        xhttp.open("POST", "ajax.php", true);
        xhttp.onload = function (event) {
            oOutput = document.querySelector(".img-content");
            if (xhttp.status == 200) {
                oOutput.innerHTML = "<img src ='" + this.responseText + "' />";
            } else {
                oOutput.innerHTML = "Error" + xhttp.status + " occured";
            }
        }
        xhttp.send(form_data);
    }
}



