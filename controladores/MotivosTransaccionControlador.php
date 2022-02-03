<?php
require_once '../modelos/MotivosTransaccionModelo.php';

/**
 *
 */
class MotivosTransaccionControlador
{
  private $model;
  function __construct()
  {
    $this->model=new MotivosTransaccionModelo();
  }

  public function listar()
  {
    return $this->model->listar();
  }

  public function insertar()
  {
    $motivo_transaccion = array('mot_motivo_transaccion' =>$_POST["mot_motivo_transaccion"],
    'emp_id'=>$_POST["emp_id"]
   );
   header("location:../../vistas/MotivosTransaccion.php");
   return $this->model->insertar($motivo_transaccion);
  }

  public function actualizar()
  {
    $motivo_transaccion = array(
      'mot_id'=>$_POST["mot_id"],
      'mot_motivo_transaccion' =>$_POST["mot_motivo_transaccion"],
    'emp_id'=>$_POST["emp_id"]
   );
   header("location:../../vistas/MotivosTransaccion.php");
   return $this->model->actualizar($motivo_transaccion);
  }

  public function eliminar()
  {
    header("location:../../vistas/MotivosTransaccion.php");
    return $this->model->eliminar($_GET["mot_id"]);
  }

}





 ?>
