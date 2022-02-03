<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/controladores/TransaccionalFondeoControlador.php';
$TransaccionalFondeoControlador=new TransaccionalFondeoControlador();
$lista=$TransaccionalFondeoControlador->listar();
$count=count($lista);
startblock("contenido");
?>
  
  <table id="example" class="display dataTable table table-bordered table-hover nowrap">
        <thead>
          <tr>
            <th>fot_id</th>
          <th>fon_id</th>
          <th>fot_mes_cierre</th>
          <th>fot_valor_fondeo</th>
        </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i <$count-1 ; $i++) {
            ?>
            <tr>
              <td> <?php echo $lista[$i]->fot_id; ?> </td>
              <td> <?php echo $lista[$i]->fon_id; ?> </td>
              <td> <?php echo $lista[$i]->fot_mes_cierre; ?> </td>
              <td> <?php echo $lista[$i]->fot_valor_fondeo; ?> </td>
            </tr>
            <?php
          } ?>
        </tbody>

    </table>





<?php endblock(); ?>
