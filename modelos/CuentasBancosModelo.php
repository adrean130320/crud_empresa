<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/crud_empresa/modelos/Conexion.php';
/**
 *
 */
class CuentasBancosModelo extends Conexion
{

  function __construct()
  {

  }

  //lista las cuentas del banco
  public function listar()
  {
  $sql = "SELECT * FROM cuenta_bancos;";
  $datos=$this->conectar()->prepare($sql);
  $datos->execute();
  while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) { }
  $datos=null;
  return $filas;
  }

  //inserta ua cueta de banco
  public function insertar($cuenta_banco=array())
  {
    foreach ($cuenta_banco as $key=>$datos) {
      $$key=$datos;
      }
    $sql="insert INTO cuenta_bancos(
    ban_id,tpc_id,cub_numero_cuenta
     )
VALUES(
    :ban_id,:tpc_id,:cub_numero_cuenta
)";
  $datos=$this->conectar()->prepare($sql);
  $datos->bindValue(":ban_id",$ban_id);
  $datos->bindValue(":tpc_id",$tpc_id);
  $datos->bindValue(":cub_numero_cuenta",$cub_numero_cuenta);
  $datos->execute();
  $verificacion=$datos->rowCount();
  $datos=null;
  return $verificacion;
  }

  //elimina una cuenta de banco
  public function eliminar($id)
  {
    $sql="delete FROM cuenta_bancos WHERE cub_id=$id";
    $datos=$this->conectar()->prepare($sql);
    $datos->execute();
    $verificacion=$datos->rowCount();
    $datos=null;
    return $verificacion;
  }

  //actualiza una cuenta de banco
  public function actualizar($cuenta_banco=array())
  {
    foreach ($cuenta_banco as $key=>$datos) {
      $$key=$datos;
      }
    $sql="update cuenta_bancos
    SET cub_id=:cub_id,ban_id=:ban_id,tpc_id=:tpc_id,cub_numero_cuenta=:cub_numero_cuenta
    WHERE cub_id=:cub_id";

    $datos=$this->conectar()->prepare($sql);
    $datos->bindValue(":cub_id",$cub_id);
    $datos->bindValue(":ban_id",$ban_id);
    $datos->bindValue(":tpc_id",$tpc_id);
    $datos->bindValue(":cub_numero_cuenta",$cub_numero_cuenta);
    $datos->execute();
    $verificacion=$datos->rowCount();
    $datos=null;
    return $verificacion;
  }

  public function buscar($cub_id)
  {
  $sql = "SELECT * FROM cuenta_bancos WHERE cub_id=:cub_id;";
  $datos=$this->conectar()->prepare($sql);
  $datos->bindValue(":cub_id",$cub_id);
  $datos->execute();
  $filas[]=$datos->fetch(PDO::FETCH_OBJ);
  $datos=null;
  return $filas;
  }

}
 ?>
