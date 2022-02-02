<?php
require_once '../modelos/TransaccionalSaldosModelo.php';

/**
 *
 */
class TransaccionalSaldosControlador
{
  private $model;
  function __construct()
  {
    $this->model=new TransaccionalSaldosModelo();
  }

  public function listar()
  {
    return $this->model->listar();
  }

  public function insertar()
  {
    $transaccional_saldo = array(
    'ban_id'=>$_POST["ban_id"],
    'trs_fecha_cierre'=>date("y-m-d"),
    'trs_saldo'=>$_POST["trs_saldo"]
   );
   return $this->model->insertar($transaccional_saldo);
  }

  public function actualizar()
  {
    $transaccional_saldo = array('trs_id' =>$_POST["trs_id"],
    'ban_id'=>$_POST["ban_id"],
    'trs_fecha_cierre'=>$_POST["trs_fecha_cierre"],
    'trs_saldo'=>$_POST["trs_saldo"]
   );
   return $this->model->actualizar($transaccional_saldo);
  }

  public function eliminar()
  {
    header("location:../../vistas/TransaccionalSaldos.php");
    return $this->model->eliminar($_GET["trs_id"]);
  }

}





 ?>
