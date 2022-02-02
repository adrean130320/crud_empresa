<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/controladores/MotivosTransaccionControlador.php';
$motivo_transaccion=new MotivosTransaccionControlador();
$lista=$motivo_transaccion->listar();
$count=count($lista);
startblock("contenido");
?>
  <button type="button" onclick="location.href='InsertarMotivoTransaccion.php'" class="btn btn-success">INSERTAR</button>
  <table id="example"  class="display dataTable table table-bordered table-hover nowrap">
        <thead>
          <tr>
          <th>mot_id</th>
          <th>inb_motivo_transaccion</th>
          <th>emp_id</th>
          <th>editar</th>
          <th>eliminar</th>
        </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i <$count-1 ; $i++) {
            ?>
            <tr>
              <td> <?php echo $lista[$i]->mot_id; ?> </td>
              <td> <?php echo $lista[$i]->inb_motivo_transaccion; ?> </td>
              <td> <?php echo $lista[$i]->emp_id; ?> </td>
              <td> <button type="button" class="btn btn-warning" onclick="location.href='ActualizarMotivoTransaccion.php?mot_id=<?php echo $lista[$i]->mot_id; ?>'"> EDITAR </button> </td>
              <td> <button onclick="location.href='../controladores/router.php/?con=MotivosTransaccionControlador&&fun=eliminar&&mot_id=<?php echo $lista[$i]->mot_id; ?>'" type="button" class="btn btn-danger"> ELIMINAR </button> </td>
            </tr> csscs
            <?php
          } ?>
        </tbody>

    </table>





<?php endblock(); ?>
