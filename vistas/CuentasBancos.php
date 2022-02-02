<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/controladores/CuentasBancosControlador.php';
$cuenta_banco=new CuentasBancosControlador();
$lista=$cuenta_banco->listar();
$count=count($lista);
startblock("contenido");
?>
  <button type="button" class="btn btn-success" onclick="location.href='InsertarCuentasBancos.php'">INSERTAR</button>
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
              <td> <button onclick="location.href='ActualizaCuentasBancos.php?cub_id=<?php echo $lista[$i]->cub_id;; ?>'" type="button" class="btn btn-warning"> EDITAR </button> </td>
              <td> <button onclick="location.href='../controladores/router.php/?con=CuentasBancosControlador&&fun=eliminar&&cub_id=<?php echo $lista[$i]->cub_id; ?>'" type="button" class="btn btn-danger"> ELIMINAR </button> </td>
            </tr>
            <?php
          } ?>
        </tbody>

    </table>





<?php endblock(); ?>
