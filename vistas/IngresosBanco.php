<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/controladores/IngresosBancoControlador.php';
$IngresosBanco=new IngresosBancoControlador();
$lista=$IngresosBanco->listar();
startblock("contenido");
?>

<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#cargarExcel">
  CARGAR EXCEL
</button>

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
        <th>fecha sistema</th>
        <th>cuenta banco</th>
        <th>transaccion</th>
        <th>motivo de transaccion</th>
        <th>empresa</th>
        <th>monto de transaccion</th>
      </tr>
      </thead>
      <tbody>
        <?php for ($i=0; $i <count($lista)-1 ; $i++) { ?>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        <?php } ?>
      </tbody>












<?php endblock(); ?>
