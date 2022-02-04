<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/controladores/FondeadoresControlador.php';
$fondeadores=new FondeadoresControlador();
$lista=$fondeadores->listar();
$count=count($lista);
startblock("contenido");
?>

  <?php if (!empty($_GET["msg"])&&$_GET["msg"]=="exito"): ?>
    <div class="alert alert-success" role="alert">
  Fondeador añadido con exito
</div>
  <?php endif; ?>
  <?php if (!empty($_GET["msg"])&& $_GET["msg"]=="existe"): ?>
    <div class="alert alert-danger" role="alert">
  El fondeador ya existe
</div>
  <?php endif; ?>



  <button  type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#insertar">
    AÑADIR
  </button>

  <!-- Modal -->
  <div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">AÑADIR FONDEADOR</h4>
        </div>
        <div class="modal-body">

          <form id="formulario" id="formulario" class="" action="../controladores/router.php/?con=FondeadoresControlador&&fun=insertar" method="post">
            <div class="form-group">
              <label for="fon_nombre">Nombres:</label>
              <input required type="text" class="form-control" id="fon_nombre" placeholder="nombres" name="fon_nombre">
            </div>
            <div class="form-group">
              <label for="fon_identificacion">Identificacion:</label>
              <input required type="number" class="form-control" id="fon_identificacion" placeholder="Identificacion" name="fon_identificacion">
            </div>
            <div class="form-group">
              <label  for="fon_correo">Correo electronico:</label>
              <input required type="email" class="form-control" id="fon_correo" placeholder="correo electronico" name="fon_correo">
            </div>
            <div class="form-group">
              <label for="fon_direccion">Direccion:</label>
              <input required type="text" class="form-control" id="fon_direccion" placeholder="direccion" name="fon_direccion">
            </div>
            <div class="form-group">
              <label for="fon_telefono">Telefono:</label>
              <input required onKeyUp="maximo(this,10);" onKeyDown="maximo(this,10);" type="number" class="form-control" id="fon_telefono" placeholder="telefono" name="fon_telefono">
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

  <!-- Button trigger modal -->
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

        <form enctype="multipart/form-data" class="" action="../controladores/router.php/?con=FondeadoresControlador&&fun=cargarExcel" method="post">
          <div class="form-1-2">
            <label class="form-label" for="customFile">Seleccionar archivo</label>
            <input required name="fondeadores" type="file" class="form-control" id="customFile" />
          </div>

          <div class="barra">
            <div class="barra_azul" id="barra_estado">
              <span></span>
            </div>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Cargar</button>
        </form>
      </div>
    </div>
  </div>
</div>




  <table id="example" class="display dataTable table table-bordered table-hover nowrap">
        <thead>
          <tr>
          <th>id</th>
          <th>nombre</th>
          <th>identificacion</th>
          <th>correo</th>
          <th>direccion</th>
          <th>telefono</th>
          <th>acciones</th>

        </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i <$count-1 ; $i++) {
            ?>
            <tr>
              <td> <?php echo $lista[$i]->fon_id; ?> </td>
              <td> <?php echo $lista[$i]->fon_nombre; ?> </td>
              <td> <?php echo $lista[$i]->fon_identificacion; ?> </td>
              <td> <?php echo $lista[$i]->fon_correo; ?> </td>
              <td> <?php echo $lista[$i]->fon_direccion; ?> </td>
              <td> <?php echo $lista[$i]->fon_telefono; ?> </td>
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


                          <form id="formulario" class="" action="../controladores/router.php/?con=CuentasBancosControlador&&fun=actualizar" method="post">
                            <input type="hidden" name="fon_id" value="<?php echo $lista[$i]->fon_id; ?>">


                            <div class="form-group">
                              <label for="fon_nombre">Nombres:</label>
                              <input required type="text" class="form-control" id="fon_nombre" value="<?php echo $lista[$i]->fon_nombre; ?>" name="fon_nombre">
                            </div>
                            <div class="form-group">
                              <label for="fon_identificacion">Identificacion:</label>
                              <input required type="number" class="form-control" id="fon_identificacion" value=<?php echo $lista[$i]->fon_identificacion; ?> name="fon_identificacion">
                            </div>
                            <div class="form-group">
                              <label  for="fon_correo">Correo electronico:</label>
                              <input required type="email" class="form-control" id="fon_correo" value="<?php echo $lista[$i]->fon_correo; ?>" name="fon_correo">
                            </div>
                            <div class="form-group">
                              <label for="fon_direccion">Direccion:</label>
                              <input required type="text" class="form-control" id="fon_direccion" value="<?php echo $lista[$i]->fon_direccion; ?>" name="fon_direccion">
                            </div>
                            <div class="form-group">
                              <label for="fon_telefono">Telefono:</label>
                              <input required onKeyUp="maximo(this,10);" onKeyDown="maximo(this,10);" type="number" class="form-control" id="fon_telefono" value="<?php echo $lista[$i]->fon_telefono; ?>" name="fon_telefono">
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


<?php endblock(); ?>
