<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once "../controladores/TipoCuentaControlador.php";
$TipoCuentaControlador=new TipoCuentaControlador();
$lista=$TipoCuentaControlador->listar();

require_once "../controladores/BancosControlador.php";
$BancoControlador=new BancosControlador();
$bancos=$BancoControlador->listar();
require_once "../controladores/CuentasBancosControlador.php";
$CuentasBancosControlador=new CuentasBancosControlador();
if (isset($_GET["cub_id"])&&!empty($_GET["cub_id"])) {
  $datos=$CuentasBancosControlador->buscar($_GET["cub_id"]);
}else {
  header("location:CuentasBancos.php");
}

startblock("contenido");


?>

    <form class="" action="../controladores/router.php/?con=CuentasBancosControlador&&fun=actualizar" method="post">

      <input type="hidden" name="cub_id" value="<?php echo $_GET["cub_id"] ?>">

      <div class="row">
        <div class="col-md-6">

          <div class="col-lg-6 col-md-6 col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label for="tpc_id">Tipo de cuenta:</label>
              <select name="tpc_id" class="form-control select2bs4" value="tipo de cuenta"  name="tpc_id"  style="width: 100%">
                <?php for ($i=0; $i < count($lista)-1; $i++) { ?>
                  <option value=" <?php echo $lista[$i]->tpc_id ?> "> <?php echo $lista[$i]->tpc_descripcion ?> </option>
              <?php  } ?>
              </select>
            </div>
            </div>
        </div>


        </div>
        <div class="col-md-6">.

          <div class="col-lg-6 col-md-6 col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label for="tpc_id">Banco:</label>
              <select name="ban_id" class="form-control select2bs4" value="tipo de cuenta"  name="tpc_id"  style="width: 100%">
                <?php for ($i=0; $i < count($bancos)-1; $i++) { ?>
                  <option value=" <?php echo $bancos[$i]->ban_id ?> "> <?php echo $bancos[$i]->ban_nombre ?> </option>
              <?php  } ?>
              </select>
            </div>
            </div>
        </div>

        </div>
      </div>




<br>

<div class="form-group">
  <label for="cub_numero_cuenta">Numero de cuenta:</label>
  <input value="<?php echo $datos[0]->cub_numero_cuenta; ?>" type="text" class="form-control" id="cub_numero_cuenta" placeholder="numero de cuenta" name="cub_numero_cuenta" >
</div>
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
  <?php endblock(); ?>