<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/controladores/TransaccionalSaldosControlador.php';
$TransaccionalSaldosControlador=new TransaccionalSaldosControlador();
$lista=$TransaccionalSaldosControlador->listar();
$count=count($lista);
startblock("contenido");
?>
  <button type="button" class="btn btn-success">INSERTAR</button>
  <table id="example" class="display dataTable table table-bordered table-hover nowrap">
        <thead>
          <tr>
          <th>trs_id</th>
          <th>ban_id</th>
          <th>trs_saldo</th>
          <th>trs_fecha_cierre</th>
          <th>editar</th>
          <th>eliminar</th>
        </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i <$count-1 ; $i++) {
            ?>
            <tr>
              <td> <?php echo $lista[$i]->trs_id; ?> </td>
              <td> <?php echo $lista[$i]->ban_id; ?> </td>
              <td> <?php echo $lista[$i]->trs_saldo; ?> </td>
              <td> <?php echo $lista[$i]->trs_fecha_cierre; ?> </td>
              <td> <button type="button" class="btn btn-warning"> EDITAR </button> </td>
              <td> <button onclick="location.href='../controladores/router.php/?con=TransaccionalSaldosControlador&&fun=eliminar&&trs_id=<?php echo $lista[$i]->trs_id; ?>'" type="button" class="btn btn-danger"> ELIMINAR </button> </td>
            </tr>
            <?php
          } ?>
        </tbody>

    </table>





<?php endblock(); ?>
