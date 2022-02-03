<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/controladores/CuentasBancosControlador.php';
$cuenta_banco=new CuentasBancosControlador();
$lista=$cuenta_banco->listar();
require_once "../controladores/TipoCuentaControlador.php";
$TipoCuentaControlador=new TipoCuentaControlador();
$tipoCuenta=$TipoCuentaControlador->listar();
require_once "../controladores/BancosControlador.php";
$BancoControlador=new BancosControlador();
$bancos=$BancoControlador->listar();

$count=count($lista);
startblock("contenido");
?>



<button type="button" class="btn btn-success" data-toggle="modal" data-target="#insertar">
  INSERTAR
</button>

<!-- Modal -->
<div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">INSERTAR CUENTA DE BANCO</h4>
      </div>
      <div class="modal-body">

        <form class="" action="../controladores/router.php/?con=CuentasBancosControlador&&fun=insertar" method="post">

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

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label for="tpc_id">Tipo de cuenta:</label>
                  <select name="tpc_id" class="form-control select2bs4" value="tipo de cuenta"  name="tpc_id"  style="width: 100%">
                    <?php for ($i=0; $i < count($tipoCuenta)-1; $i++) { ?>
                      <option value=" <?php echo $tipoCuenta[$i]->tpc_id ?> "> <?php echo $tipoCuenta[$i]->tpc_descripcion ?> </option>
                  <?php  } ?>
                  </select>
                </div>
                </div>


    <br>

    <div class="form-group">
      <label for="cub_numero_cuenta">Numero de cuenta:</label>
      <input placeholder="numero de cuenta" type="text" class="form-control" id="cub_numero_cuenta" placeholder="numero de cuenta" name="cub_numero_cuenta" >
    </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
        <button type="submit" class="btn btn-primary">GUARDAR</button>
        </form>
      </div>
    </div>
  </div>
</div>



  <table id="example" class="display dataTable table table-bordered table-hover nowrap">
        <thead>
          <tr>
          <th>cub_id</th>
          <th>ban_id</th>
          <th>tpc_id</th>
          <th>cub_numero_cuenta</th>
          <th>editar</th>
          <th>eliminar</th>
        </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i <$count-1 ; $i++) {
            ?>
            <tr>
              <td> <?php echo $lista[$i]->cub_id; ?> </td>
              <td> <?php echo $lista[$i]->ban_id; ?> </td>
              <td> <?php echo $lista[$i]->tpc_id; ?> </td>
              <td> <?php echo $lista[$i]->cub_numero_cuenta; ?> </td>
              <td>

              </td>
              <td>

                

              </td>
            </tr>
            <?php
          } ?>
        </tbody>

    </table>





<?php endblock(); ?>
