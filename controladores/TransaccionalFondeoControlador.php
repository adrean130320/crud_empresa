<?php
require_once '../modelos/TransaccionalFondeoModelo.php';

/**
 *
 */
class TransaccionalFondeoControlador
{
  private $model;
  function __construct()
  {
    $this->model=new TransaccionalFondeoModelo();
  }

  public function listar()
  {
    return $this->model->listar();
  }

  public function insertar()
  {
    $transaccional_fondeo = array(
    'fon_id'=>$_POST["fon_id"],
    'fot_mes_cierre'=>$_POST["fot_mes_cierre"],
    'fot_valor_fondeo'=>$_POST["fot_valor_fondeo"]
   );
   return $this->model->insertar($transaccional_fondeo);
  }

  public function actualizar()
  {
    $transaccional_fondeo = array('fon_id' =>$_POST["fon_id"],
    'fot_mes_cierre'=>$_POST["fot_mes_cierre"],
    'tpc_id'=>$_POST["tpc_id"],
    'fot_valor_fondeo'=>$_POST["fot_valor_fondeo"],
    'fot_id'=>$_POST["fot_id"],
   );
   return $this->model->actualizar($transaccional_fondeo);
  }

  public function eliminar()
  {
    header("location:../../vistas/TransaccionalFondeo.php");
    return $this->model->eliminar($_GET["fot_id"]);
  }

}





 ?>
