<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/controladores/TipoCuentaControlador.php';
$tipo_cuenta=new TipoCuentaControlador();
$lista=$tipo_cuenta->listar();
$count=count($lista);
startblock("contenido");
?>

<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#insertar">
  AÑADIR
</button>

<!-- Modal -->
<div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">AÑADIR TIPO DE CUENTA</h4>
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
          <th>acciones</th>

        </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i <$count-1 ; $i++) {
            ?>
            <tr>
              <td> <?php echo $lista[$i]->tpc_id; ?> </td>
              <td> <?php echo $lista[$i]->tpc_descripcion; ?> </td>
              <td>

                <button type="button" class="btn btn-warning 	glyphicon glyphicon-edit" data-toggle="modal" data-target="#actualizar<?php echo $i; ?>" ></button>
                  <!-- Modal -->
                  <div class="modal fade" id="actualizar<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">ACTUALIZAR</h4>
                        </div>
                        <div class="modal-body">

                          <form class="" action="../controladores/router.php/?con=TipoCuentaControlador&&fun=actualizar" method="post">
                            <div class="form-group">
                              <label for="tpc_descripcion">Tpc_descripcion</label>
                              <input  type="hidden" id="tpc_id" name="tpc_id" value=" <?php echo $lista[$i]->tpc_id ?> ">
                              <input type="text" class="form-control"  name="tpc_descripcion" value="<?php echo $lista[$i]->tpc_descripcion ; ?>">
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-warning" >Actualizar</button>
                        </div>
                        </form>
                          </form>
                      </div>
                    </div>
                    </div>


                <button type="button" class="btn btn-danger glyphicon glyphicon-trash" data-toggle="modal" data-target="#eliminar<?php echo $i; ?>"></button>
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
                         <button type="button" class="btn btn-danger" onclick="location.href='../controladores/router.php/?con=TipoCuentaControlador&&fun=eliminar&&tpc_id=<?php echo $lista[$i]->tpc_id; ?>'">Eliminar</button>
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
