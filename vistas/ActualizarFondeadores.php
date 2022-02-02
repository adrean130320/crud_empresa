<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/crud_empresa/libs/layout.php';
require_once "../controladores/FondeadoresControlador.php";
$FondeadoresControlador=new FondeadoresControlador();
if (isset($_GET["fon_id"])&&!empty($_GET["fon_id"])) {
  $fondeador=$FondeadoresControlador->buscar($_GET["fon_id"]);
}
else {
  header("location:Fondeadores.php");
}

startblock("contenido");
?>

    <form class="" action="../controladores/router.php/?con=FondeadoresControlador&&fun=actualizar" method="post">
      <input type="hidden" name="fon_id" value="<?php echo $fondeador[0]->fon_id; ?>">
      <div class="form-group">
        <label for="fon_nombre">Nombres:</label>
        <input type="text" class="form-control" id="fon_nombre" value="<?php echo $fondeador[0]->fon_nombre; ?>" name="fon_nombre">
      </div>
      <div class="form-group">
        <label for="fon_identificacion">Identificacion:</label>
        <input type="text" class="form-control" id="fon_identificacion" value="<?php echo $fondeador[0]->fon_identificacion; ?>" name="fon_identificacion">
      </div>
      <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
    </form>
  <?php endblock(); ?>
