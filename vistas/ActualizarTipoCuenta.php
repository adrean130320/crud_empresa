<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once '../controladores/TipoCuentaControlador.php';
$TipoCuentaControlador=new TipoCuentaControlador();
if (!empty($_GET["tpc_id"])) {
  $datos=$TipoCuentaControlador->buscar($_GET["tpc_id"]);
}else {
  header("location:TipoCuenta.php");
}

startblock("contenido");
?>
    <form class="" action="../controladores/router.php/?con=TipoCuentaControlador&&fun=actualizar" method="post">
      <div class="form-group">
        <label for="tpc_descripcion">Tpc_descripcion</label>
        <input  type="hidden" id="tpc_id" name="tpc_id" value=" <?php echo $_GET["tpc_id"] ?> ">
        <input type="text" class="form-control"  name="tpc_descripcion" value=" <?php echo $datos[0]->tpc_descripcion ; ?> ">
      </div>
      <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
    </form>
  <?php endblock(); ?>
