<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once "../controladores/EmpresaControlador.php";
$EmpresaControlador=new EmpresaControlador();
$lista=$EmpresaControlador->listar();

require_once "../controladores/IngresosBancoControlador.php";
$IngresosBancoControlador=new IngresosBancoControlador();
$ingresos=$IngresosBancoControlador->listar();
startblock("contenido");


?>

    <form class="" action="../controladores/router.php/?con=MotivosTransaccionControlador&&fun=insertar" method="post">

      <div class="row">
        <div class="col-md-6">

          <div class="col-lg-6 col-md-6 col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label for="inb_motivo_transaccion">Motivo transaccion:</label>
              <select name="inb_motivo_transaccion" class="form-control select2bs4"  style="width: 100%">
                <?php for ($i=0; $i < count($ingresos)-1; $i++) { ?>
                  <option value="<?php echo $ingresos[$i]->inb_id ?>"> <?php echo $ingresos[$i]->inb_motivo_transaccion ?> </option>
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
              <label for="emp_id">Empresa:</label>
              <select name="emp_id" class="form-control select2bs4" style="width: 100%">
                <?php for ($i=0; $i < count($lista)-1; $i++) { ?>
                  <option value="<?php echo $lista[$i]->emp_id ?>"> <?php echo $lista[$i]->emp_nombre_empresa ?> </option>
              <?php  } ?>
              </select>
            </div>
            </div>
        </div>

        </div>
      </div>
<br>
      <button type="submit" class="btn btn-primary">INSERTAR</button>
    </form>
  <?php endblock(); ?>
