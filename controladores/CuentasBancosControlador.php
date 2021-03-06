<?php
require_once '../modelos/CuentasBancosModelo.php';

/**
 *
 */
class CuentasBancosControlador
{
  private $model;
  function __construct()
  {
    $this->model=new CuentasBancosModelo();
  }

  public function listar()
  {
    return $this->model->listar();
  }

  public function insertar()
  {

    $cuenta_banco = array(
    'ban_id'=>$_POST["ban_id"],
    'tpc_id'=>$_POST["tpc_id"],
    'cub_numero_cuenta'=>$_POST["cub_numero_cuenta"]
   );

   if ($this->model->insertar($cuenta_banco)>0) {
     return header("location:../../vistas/CuentasBancos.php?msg=exito");
  }else {
      return header("location:../../vistas/CuentasBancos.php?msg=existe");
   }

  }

  public function actualizar()
  {
    $cuenta_banco = array('cub_id' =>$_POST["cub_id"],
    'ban_id'=>$_POST["ban_id"],
    'tpc_id'=>$_POST["tpc_id"],
    'cub_numero_cuenta'=>$_POST["cub_numero_cuenta"]
   );
   header("location:../../vistas/CuentasBancos.php");
   return $this->model->actualizar($cuenta_banco);
  }

  public function eliminar()
  {
    if ($this->model->eliminar($_GET["cub_id"])>0) {
      return header("location:../../vistas/CuentasBancos.php?msg=del");
    }else {
      return header("location:../../vistas/CuentasBancos.php?msg=errdel");
    }


  }

  public function buscar($cub_id)
  {
    return $this->model->buscar($cub_id);
  }

}





 ?>
