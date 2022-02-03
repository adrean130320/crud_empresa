<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/crud_empresa/modelos/Conexion.php';
/**
 *
 */
class TransaccionalSaldosModelo extends Conexion
{

  function __construct()
  {

  }

  //lista de transaccional de saldo
  public function listar()
  {
  $sql = "SELECT * FROM transaccional_saldos;";
  $datos=$this->conectar()->prepare($sql);
  $datos->execute();
  while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) { }
  $datos=null;
  return $filas;
  }

  //inserta un transaccional de saldo
  public function insertar($transaccional_saldo=array())
  {
    foreach ($transaccional_saldo as $key=>$datos) {
      $$key=$datos;
      }
    $sql="insert INTO transaccional_saldos(
    ban_id, trs_saldo, trs_fecha_cierre
     )
VALUES(
    :ban_id,:trs_saldo,:trs_fecha_cierre
)";
  $datos=$this->conectar()->prepare($sql);
  $datos->bindValue(":ban_id",$ban_id);
  $datos->bindValue(":trs_saldo",$trs_saldo);
  $datos->bindValue(":trs_fecha_cierre",$trs_fecha_cierre);
  $datos->execute();
  $verificacion=$datos->rowCount();
  $datos=null;
  return $verificacion;
  }

  //elimina una transaccional de saldo
  public function eliminar($id)
  {
    $sql="delete FROM transaccional_saldos WHERE trs_id=$id";
    $datos=$this->conectar()->prepare($sql);
    $datos->execute();
    $verificacion=$datos->rowCount();
    $datos=null;
    return $verificacion;
  }

  //actualiza una transaccional de saldo
  public function actualizar($transaccional_saldo=array())
  {
    foreach ($transaccional_saldo as $key=>$datos) {
      $$key=$datos;
      }
    $sql="update transaccional_saldos
    SET ban_id=:ban_id,trs_saldo=:trs_saldo,trs_fecha_cierre=:trs_fecha_cierre
    WHERE trs_id=:trs_id";

    $datos=$this->conectar()->prepare($sql);
    $datos->bindValue(":ban_id",$ban_id);
    $datos->bindValue(":trs_saldo",$trs_saldo);
    $datos->bindValue(":trs_fecha_cierre",$trs_fecha_cierre);
    $datos->bindValue(":trs_id",$trs_id);
    $datos->execute();
    $verificacion=$datos->rowCount();
    $datos=null;
    return $verificacion;
  }
}
 ?>
