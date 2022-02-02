<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/controladores/FondeadoresControlador.php';
$fondeadores=new FondeadoresControlador();
$lista=$fondeadores->listar();
$count=count($lista);
startblock("contenido");
?>
  <button type="button" class="btn btn-success" onclick="location.href='InsertarFondeador.php'">INSERTAR</button>
  <button type="button" class="btn btn-success" onclick="location.href=''">CARGAR EXCEL</button>
  <table id="example" class="display dataTable table table-bordered table-hover nowrap">
        <thead>
          <tr>
          <th>fon_id</th>
          <th>fon_nombre</th>
          <th>fon_identificacion</th>
          <th>editar</th>
          <th>eliminar</th>
        </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i <$count-1 ; $i++) {
            ?>
            <tr>
              <td> <?php echo $lista[$i]->fon_id; ?> </td>
              <td> <?php echo $lista[$i]->fon_nombre; ?> </td>
              <td> <?php echo $lista[$i]->fon_identificacion; ?> </td>
              <td> <button type="button" onclick="location.href='ActualizarFondeadores.php?fon_id=<?php echo $lista[$i]->fon_id; ?>'" class="btn btn-warning"> EDITAR </button> </td>
              <td> <button onclick="location.href='../controladores/router.php/?con=FondeadoresControlador&&fun=eliminar&&fon_id=<?php echo $lista[$i]->fon_id; ?>'" type="button" class="btn btn-danger"> ELIMINAR </button> </td>
            </tr>
            <?php
          } ?>
        </tbody>

    </table>





<?php endblock(); ?>
