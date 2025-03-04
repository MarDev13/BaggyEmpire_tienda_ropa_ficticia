<?php

if(isset($_SESSION['borrado']) && $_SESSION['borrado'] == true)
{
?>

<div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
     Usuario eliminado correctamente.
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>

<?php

unset($_SESSION['borrado']);

}