<?php
require_once '../modelos/FondeadoresModelo.php';

/**
 *
 */
class FondeadoresControlador
{
  private $model;
  function __construct()
  {
    $this->model=new FondeadoresModelo();
  }

  public function listar()
  {
    return $this->model->listar();
  }

  public function insertar()
  {
    $fondeador = array('fon_nombre' =>$_POST["fon_nombre"],
    'fon_identificacion'=>$_POST["fon_identificacion"]
   );
   return $this->model->insertar($fondeador);
  }

  public function actualizar()
  {
    $fondeador = array('fon_id' =>$_POST["fon_id"],
    'fon_nombre'=>$_POST["fon_nombre"],
    'fon_identificacion'=>$_POST["fon_identificacion"]
   );
   return $this->model->actualizar($fondeador);
  }

  public function eliminar()
  {
    header("location:../../vistas/Fondeadores.php");
    return $this->model->eliminar($_GET["fon_id"]);
  }

}





 ?>
