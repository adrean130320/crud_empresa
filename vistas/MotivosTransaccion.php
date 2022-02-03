<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/controladores/MotivosTransaccionControlador.php';
$motivo_transaccion=new MotivosTransaccionControlador();
$lista=$motivo_transaccion->listar();
require_once "../controladores/EmpresaControlador.php";
$EmpresaControlador=new EmpresaControlador();
$empresa=$EmpresaControlador->listar();
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
        <h4 class="modal-title" id="myModalLabel">INSERTAR MOTIVO TRANSACCION</h4>
      </div>
      <div class="modal-body">

        <form class="" action="../controladores/router.php/?con=MotivosTransaccionControlador&&fun=insertar" method="post">
        <div class="input-group mb-3" style="width: 100%">
          <div class="input-group-prepend">
            <label for="emp_id">Empresa:</label>
            <select required name="emp_id" class="form-control select2bs4" style="width: 100%">
              <?php for ($i=0; $i < count($empresa)-1; $i++) { ?>
                <option value="<?php echo $empresa[$i]->emp_id ?>"> <?php echo $empresa[$i]->emp_nombre_empresa ?> </option>
            <?php  } ?>
            </select>
          </div>
          </div>

          <div class="form-group">
    <label for="motivo_transaccion">Motivo transacción:</label>
    <textarea required class="form-control" name="mot_motivo_transaccion" id="motivo_transaccion" style="resize: none" rows="3" onKeyUp="maximo(this,100);" onKeyDown="maximo(this,100);"></textarea>
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

  <table id="example"  class="display dataTable table table-bordered table-hover nowrap">
        <thead>
          <tr>
          <th>id</th>
          <th>motivo transaccion</th>
          <th>empresa</th>
          <th>editar</th>
          <th>eliminar</th>
        </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i <$count-1 ; $i++) {
            ?>
            <tr>
              <td> <?php echo $lista[$i]->mot_id; ?> </td>
              <td> <?php echo $lista[$i]->mot_motivo_transaccion; ?> </td>
              <td> <?php echo $lista[$i]->emp_nombre_empresa; ?> </td>
              <td>

                <form id="formulario" class="" action="../controladores/router.php/?con=MotivosTransaccionControlador&&fun=actualizar" method="post">
                  <input type="hidden" name="mot_id" value="<?php echo $lista[$i]->mot_id; ?>">
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#actualizar<?php echo $i; ?>" >ACTUALIZAR</button>
                  <!-- Modal -->
                  <div class="modal fade" id="actualizar<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">ACTUALIZAR</h4>
                        </div>
                        <div class="modal-body">

                          <div class="input-group mb-3" style="width: 100%">
                            <div class="input-group-prepend">
                              <label for="emp_id">Empresa:</label>
                              <select required name="emp_id" class="form-control select2bs4" style="width: 100%">
                                <option value="<?php echo $lista[$i]->emp_id ?>"> <?php echo $lista[$i]->emp_nombre_empresa ?> </option>
                                <?php for ($j=0; $j < count($empresa)-1; $j++) { ?>
                                  <option value="<?php echo $empresa[$j]->emp_id ?>"> <?php echo $empresa[$j]->emp_nombre_empresa ?> </option>
                              <?php  } ?>
                              </select>
                            </div>
                            </div>


                          <div class="form-group">
                            <label for="motivo_transaccion">Motivo transacción:</label>
                            <textarea required class="form-control" name="mot_motivo_transaccion" id="motivo_transaccion" style="resize: none" rows="3" onKeyUp="maximo(this,100);" onKeyDown="maximo(this,100);"><?php echo $lista[$i]->mot_motivo_transaccion ?></textarea>
                          </div>


                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-warning" >Actualizar</button>
                          </div>
                        </div>
                      </form>


               </td>
              <td>

                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $i; ?>">ELIMINAR</button>
               <!-- Modal -->
               <div class="modal fade" id="eliminar<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" id="myModalLabel">ELIMINAR</h4>
                     </div>
                     <div class="modal-body">
                       <strong>¿Contiuar con la acción?</strong>
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                       <button type="button" class="btn btn-danger" onclick="location.href='../controladores/router.php/?con=MotivosTransaccionControlador&&fun=eliminar&&mot_id=<?php echo $lista[$i]->mot_id; ?>'">Eliminar</button>
                     </div>
                   </div>
                 </div>
               </div>


             </td>
            </tr>
            <?php
          } ?>
        </tbody>

    </table>

<?php endblock(); ?>
