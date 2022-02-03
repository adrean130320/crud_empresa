<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/controladores/TipoCuentaControlador.php';
$tipo_cuenta=new TipoCuentaControlador();
$lista=$tipo_cuenta->listar();
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
        <h4 class="modal-title" id="myModalLabel">INSERTAR TIPO DE CUENTA</h4>
      </div>
      <div class="modal-body">

        <form class="" action="../controladores/router.php/?con=TipoCuentaControlador&&fun=insertar" method="post">
          <div class="form-group">
            <label for="tpc_cuenta">Tipo de cuenta</label>
            <input type="text" class="form-control" id="tpc_cuenta" placeholder="tipo de cuenta" name="tpc_descripcion">
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
          <th>tpc_id</th>
          <th>tpc_descripcion</th>
          <th>editar</th>
          <th>eliminar</th>
        </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i <$count-1 ; $i++) {
            ?>
            <tr>
              <td> <?php echo $lista[$i]->tpc_id; ?> </td>
              <td> <?php echo $lista[$i]->tpc_descripcion; ?> </td>
              <td> <button type="button" class="btn btn-warning" onclick="location.href='ActualizarTipoCuenta.php?tpc_id=<?php echo $lista[$i]->tpc_id; ?>'" > EDITAR </button> </td>
              <td> <button onclick="location.href='../controladores/router.php/?con=TipoCuentaControlador&&fun=eliminar&&tpc_id=<?php echo $lista[$i]->tpc_id; ?>'" type="button" class="btn btn-danger"> ELIMINAR </button> </td>
            </tr>
            <?php
          } ?>
        </tbody>

    </table>





<?php endblock(); ?>
