<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/crud_empresa/modelos/Conexion.php';
/**
 *
 */
class TipoCuentaModelo extends Conexion{


  function __construct()
  {

  }

  //lista los tipo de cuenta
  public function listar()
  {
  $sql = "SELECT * FROM tipo_cuenta;";
  $datos=$this->conectar()->prepare($sql);
  $datos->execute();
  while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) { }
  $datos=null;
  return $filas;
  }

  //inserta un tipo de cuenta
  public function insertar($tipo_cuenta=array())
  {
    foreach ($tipo_cuenta as $key=>$datos) {
      $$key=$datos;
      }
    $sql="insert INTO tipo_cuenta(
    tpc_descripcion
     )
VALUES(
    :tpc_descripcion
)";
  $datos=$this->conectar()->prepare($sql);
  $datos->bindValue(":tpc_descripcion",$tpc_descripcion);
  $datos->execute();
  $verificacion=$datos->rowCount();
  $datos=null;
  return $verificacion;
  }

  //elimina un tipo de cuenta
  public function eliminar($id)
  {
    $sql="delete FROM tipo_cuenta WHERE tpc_id=$id";
    $datos=$this->conectar()->prepare($sql);
    $datos->execute();
    $verificacion=$datos->rowCount();
    $datos=null;
    return $verificacion;
  }

  //actualiza un motivo transaccion
  public function actualizar($tipo_cuenta=array())
  {
    foreach ($tipo_cuenta as $key=>$datos) {
      $$key=$datos;
      }
    $sql="update tipo_cuenta
    SET tpc_descripcion=:tpc_descripcion
    WHERE tpc_id=:tpc_id";

    $datos=$this->conectar()->prepare($sql);
    $datos->bindValue(":tpc_descripcion",$tpc_descripcion);
    $datos->bindValue(":tpc_id",$tpc_id);
    $datos->execute();
    $verificacion=$datos->rowCount();
    $datos=null;
    return $verificacion;
  }
  public function buscar($id)
  {
    $sql="select * from tipo_cuenta WHERE tpc_id=:tpc_id";
    $datos=$this->conectar()->prepare($sql);
    $datos->bindValue(":tpc_id",$id);
    $datos->execute();
    $filas[]=$datos->fetch(PDO::FETCH_OBJ);
    $datos=null;
    return $filas;
  }
}
 ?>
