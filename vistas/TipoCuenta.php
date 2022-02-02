<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/controladores/TipoCuentaControlador.php';
$tipo_cuenta=new TipoCuentaControlador();
$lista=$tipo_cuenta->listar();
$count=count($lista);
startblock("contenido");
?>
  <button type="button" class="btn btn-success" onclick="location.href='InsertarTipoCuenta.php'">INSERTAR</button>
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
