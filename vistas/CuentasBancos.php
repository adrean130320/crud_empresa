<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/controladores/CuentasBancosControlador.php';
$cuenta_banco=new CuentasBancosControlador();
$lista=$cuenta_banco->listar();
require_once "../controladores/TipoCuentaControlador.php";
$TipoCuentaControlador=new TipoCuentaControlador();
$tipoCuenta=$TipoCuentaControlador->listar();
require_once "../controladores/BancosControlador.php";
$BancoControlador=new BancosControlador();
$bancos=$BancoControlador->listar();

$count=count($lista);
startblock("contenido");
?>
<?php if (!empty($_GET["msg"])&&$_GET["msg"]=="existe"): ?>
  <div class="alert alert-danger" role="alert">
    la cuenta ya existe
</div>
<?php endif; ?>
<?php if (!empty($_GET["msg"])&& $_GET["msg"]=="exito"): ?>
  <div class="alert alert-success" role="alert">
    cuenta añadida con exito
</div>
<?php endif; ?>
<?php if (!empty($_GET["msg"])&&$_GET["msg"]=="errdel"): ?>
  <div class="alert alert-danger" role="alert">
    intenta de nuevo
</div>
<?php endif; ?>
<?php if (!empty($_GET["msg"])&& $_GET["msg"]=="del"): ?>
  <div class="alert alert-success" role="alert">
    cuenta borrada con exito
</div>
<?php endif; ?>


<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#insertar">
  AÑADIR
</button>
<br>
<!-- Modal -->
<div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">AÑADIR CUENTA DE BANCO</h4>
      </div>
      <div class="modal-body">

        <form class="" action="../controladores/router.php/?con=CuentasBancosControlador&&fun=insertar" method="post">

          <div class="input-group mb-3" style="width:100%">
            <div  class="input-group-prepend">
              <label  for="tpc_id">Banco:</label>
              <select required name="ban_id" class="form-control select2bs4" value="tipo de cuenta"  name="tpc_id"  style="width: 100%">
                <?php for ($i=0; $i < count($bancos)-1; $i++) { ?>
                  <option value=" <?php echo $bancos[$i]->ban_id ?> "> <?php echo $bancos[$i]->ban_nombre ?> </option>
              <?php  } ?>
              </select>
            </div>
            </div>

              <div class="input-group mb-3" style="width:100%">
                <div class="input-group-prepend">
                  <label for="tpc_id">Tipo de cuenta:</label>
                  <select required name="tpc_id" class="form-control select2bs4" value="tipo de cuenta"  name="tpc_id"  style="width: 100%">
                    <?php for ($i=0; $i < count($tipoCuenta)-1; $i++) { ?>
                      <option value=" <?php echo $tipoCuenta[$i]->tpc_id ?> "> <?php echo $tipoCuenta[$i]->tpc_descripcion ?> </option>
                  <?php  } ?>
                  </select>
                </div>
                </div>


    <br>

    <div class="form-group">
      <label for="cub_numero_cuenta">Numero de cuenta:</label>
      <input required placeholder="numero de cuenta" type="number" class="form-control" id="cub_numero_cuenta" placeholder="numero de cuenta" name="cub_numero_cuenta" >
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
          <th>id</th>
          <th>banco</th>
          <th>tipo de cuenta</th>
          <th>numero de cuenta</th>
          <th>acciones</th>

        </tr>
        </thead>
        <tbody>
          <?php for ($i=0; $i <$count-1 ; $i++) {
            ?>
            <tr>
              <td> <?php echo $lista[$i]->cub_id; ?> </td>
              <td> <?php echo $lista[$i]->ban_nombre; ?> </td>
              <td> <?php echo $lista[$i]->tpc_descripcion; ?> </td>
              <td> <?php echo $lista[$i]->cub_numero_cuenta; ?> </td>
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

                            <input type="hidden" name="cub_id" value="<?php echo $lista[$i]->cub_id; ?>">

                            <div class="input-group mb-3" style="width:100%">
                              <div class="input-group-prepend">
                                <label for="tpc_id">Banco:</label>
                                <select name="ban_id" class="form-control select2bs4" value="tipo de cuenta"  name="tpc_id"  style="width: 100%">
                                  <option value=" <?php echo $lista[$i]->ban_id ?> "> <?php echo $lista[$i]->ban_nombre ?> </option>
                                  <?php for ($k=0; $k < count($bancos)-1; $k++) { ?>
                                    <option value=" <?php echo $bancos[$k]->ban_id ?> "> <?php echo $bancos[$k]->ban_nombre ?> </option>
                                <?php  } ?>
                                </select>
                              </div>
                              </div>



                                <div class="input-group mb-3" style="width:100%">
                                  <div class="input-group-prepend">
                                    <label for="tpc_id">Tipo de cuenta:</label>
                                    <select required name="tpc_id" class="form-control select2bs4" value="tipo de cuenta"  name="tpc_id"  style="width: 100%">
                                      <option value=" <?php echo $lista[$i]->tpc_id ?> "> <?php echo $lista[$i]->tpc_descripcion ?> </option>
                                      <?php for ($j=0; $j < count($tipoCuenta)-1; $j++) { ?>
                                        <option value=" <?php echo $tipoCuenta[$j]->tpc_id ?> "> <?php echo $tipoCuenta[$j]->tpc_descripcion ?> </option>
                                    <?php  } ?>
                                    </select>
                                  </div>
                                  </div>
                                  <div class="form-group">
                                  <label for="cub_numero_cuenta">Numero de cuenta:</label>
                                  <input required placeholder="numero de cuenta" type="number" class="form-control" id="cub_numero_cuenta" value="<?php echo $lista[$i]->cub_numero_cuenta; ?>" name="cub_numero_cuenta" >
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
                          <button type="button" class="btn btn-danger" onclick="location.href='../controladores/router.php/?con=CuentasBancosControlador&&fun=eliminar&&cub_id=<?php echo $lista[$i]->cub_id; ?>'">Eliminar</button>
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
