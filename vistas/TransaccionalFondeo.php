<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/controladores/TransaccionalFondeoControlador.php';
$TransaccionalFondeoControlador=new TransaccionalFondeoControlador();
$lista=$TransaccionalFondeoControlador->listar();
$count=count($lista);
startblock("contenido");
?>

<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#cargarExcel">
  CARGAR EXCEL
</button>
<br>

<!-- Modal -->
<div class="modal fade" id="cargarExcel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">CARGAR EXCEL</h4>
      </div>
      <div class="modal-body">

        <!-- falta cargar el formulario -->
        <label class="form-label" for="customFile">Seleccionar archivo</label>
        <input type="file" class="form-control" id="customFile" />
        <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker" inline="true">
          <label for="example">seleccionar fecha de carga</label>
          <input placeholder="Select date" type="date" id="example" name="fot_mes_carga" class="form-control">
          <i class="fas fa-calendar input-prefix"></i>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Cargar</button>
      </div>
    </div>
  </div>
</div>



  <table id="example" class="display dataTable table table-bordered table-hover nowrap">
        <thead>
          <tr>
            <th>id</th>
          <th>fondeador</th>
          <th>mes de carga</th>
          <th>valor de fondeo</th>
        </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i <$count-1 ; $i++) {
            ?>
            <tr>
              <td> <?php echo $lista[$i]->fot_id; ?> </td>
              <td> <?php echo $lista[$i]->fon_id; ?> </td>
              <td> <?php echo $lista[$i]->fot_mes_carga; ?> </td>
              <td> <?php echo $lista[$i]->fot_valor_fondeo; ?> </td>
            </tr>
            <?php
          } ?>
        </tbody>

    </table>





<?php endblock(); ?>
