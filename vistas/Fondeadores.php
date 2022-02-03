<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/controladores/FondeadoresControlador.php';
$fondeadores=new FondeadoresControlador();
$lista=$fondeadores->listar();
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
          <h4 class="modal-title" id="myModalLabel">INSERTAR FONDEADOR</h4>
        </div>
        <div class="modal-body">

          <form id="formulario" id="formulario" class="" action="../controladores/router.php/?con=FondeadoresControlador&&fun=insertar" method="post">
            <div class="form-group">
              <label for="fon_nombre">Nombres:</label>
              <input type="text" class="form-control" id="fon_nombre" placeholder="nombres" name="fon_nombre">
            </div>
            <div class="form-group">
              <label for="fon_identificacion">Identificacion:</label>
              <input type="text" class="form-control" id="fon_identificacion" placeholder="Identificacion" name="fon_identificacion">
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




  <button type="button" class="btn btn-success" onclick="location.href=''">CARGAR EXCEL</button>





  <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#cargarExcel">
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
              <td>

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


                          <form id="formulario" class="" action="../controladores/router.php/?con=FondeadoresControlador&&fun=actualizar" method="post">
                            <input type="hidden" name="fon_id" value="<?php echo $lista[$i]->fon_id; ?>">
                            <div class="form-group">
                              <label for="fon_nombre">Nombres:</label>
                              <input type="text" class="form-control" id="fon_nombre" value="<?php echo $lista[$i]->fon_nombre; ?>" name="fon_nombre">
                            </div>
                            <div class="form-group">
                              <label for="fon_identificacion">Identificacion:</label>
                              <input type="text" class="form-control" id="fon_identificacion" value="<?php echo $lista[$i]->fon_identificacion; ?>" name="fon_identificacion">
                            </div>




                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-warning" >Actualizar</button>
                        </div>
                          </form>
                      </div>
                    </div>
                  </div>

              </td>
              <td>   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $i; ?>">ELIMINAR</button>
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
                        <button type="button" class="btn btn-danger" onclick="location.href='../controladores/router.php/?con=FondeadoresControlador&&fun=eliminar&&fon_id=<?php echo $lista[$i]->fon_id; ?>'">Eliminar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <!-- <td> <button type="button" onclick="location.href='ActualizarFondeadores.php?fon_id=<?php echo $lista[$i]->fon_id; ?>'" class="btn btn-warning"> EDITAR </button> </td>  -->
            <!--  <td> <button onclick="location.href='../controladores/router.php/?con=FondeadoresControlador&&fun=eliminar&&fon_id=<?php echo $lista[$i]->fon_id; ?>'" type="button" class="btn btn-danger"> ELIMINAR </button> </td> -->
            </tr>
            <?php
          } ?>


        </tbody>

    </table>


    <script>
			$(document).ready(function(){
	    		$('#formulario').click(function(){
	       		$("#contenido").load("fondeadores.php");
	    });
		</script>


<?php endblock(); ?>
