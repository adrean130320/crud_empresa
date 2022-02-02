<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
startblock("contenido");
?>

    <form class="" action="../controladores/router.php/?con=TipoCuentaControlador&&fun=insertar" method="post">
      <div class="form-group">
        <label for="tpc_descripcion">Tpc_descripcion</label>
        <input type="text" class="form-control" id="tpc_descripcion" placeholder="descripcion" name="tpc_descripcion">
      </div>
      <button type="submit" class="btn btn-primary">INSERTAR</button>
    </form>
  <?php endblock(); ?>
