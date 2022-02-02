<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
startblock("contenido");
?>

    <form class="" action="../controladores/router.php/?con=FondeadoresControlador&&fun=insertar" method="post">
      <div class="form-group">
        <label for="fon_nombre">Nombres:</label>
        <input type="text" class="form-control" id="fon_nombre" placeholder="nombres" name="tpc_descripcion">
      </div>
      <div class="form-group">
        <label for="fon_identificacion">Identificacion:</label>
        <input type="text" class="form-control" id="fon_identificacion" placeholder="Identificacion" name="tpc_descripcion">
      </div>
      <button type="submit" class="btn btn-primary">INSERTAR</button>
    </form>
  <?php endblock(); ?>
