<?php
require_once '../modelos/TipoCuentaModelo.php';

/**
 *
 */
class TipoCuentaControlador
{
  private $model;
  function __construct()
  {
    $this->model=new TipoCuentaModelo();
  }

  public function listar()
  {
    return $this->model->listar();
  }

  public function insertar()
  {
    $tipo_cuenta = array('tpc_descripcion' =>$_POST["tpc_descripcion"]
   );

   if ($this->model->insertar($tipo_cuenta)>1) {
    return header("location:../../vistas/TipoCuenta.php?msg=exito");
   }else{
    return header("location:../../vistas/TipoCuenta.php?msg=existe");
   }

  }

  public function actualizar()
  {
    echo $_POST["tpc_id"];
    $tipo_cuenta = array(
      'tpc_descripcion' =>$_POST["tpc_descripcion"],
      'tpc_id'=>$_POST["tpc_id"]

   );
   header("location:../../vistas/TipoCuenta.php");
   return $this->model->actualizar($tipo_cuenta);
  }

  public function eliminar()
  {
    header("location:../../vistas/TipoCuenta.php");
    return $this->model->eliminar($_GET["tpc_id"]);
  }

  public function buscar($id)
  {
    return $this->model->buscar($id);
  }
}

 ?>
