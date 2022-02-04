<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/crud_empresa/modelos/Conexion.php';
/**
 *
 */
class TransaccionalFondeoModelo extends Conexion
{

  function __construct()
  {

  }

  //lista de transaccional de fondeo
  public function listar()
  {
  $sql = "SELECT distinct trf.*,f.fon_nombre FROM transaccional_fondeo as trf join fondeadores f
  where trf.fon_id=f.fon_id;";
  $datos=$this->conectar()->prepare($sql);
  $datos->execute();
  while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) { }
  $datos=null;
  return $filas;
  }

  //inserta un transaccional de fondeo
  public function insertar($transaccional_fondeo=array())
  {
    foreach ($transaccional_fondeo as $key=>$datos) {
      $$key=$datos;
      }
    $sql="insert INTO transaccional_fondeo(
    fon_id,fot_mes_cierre,fot_valor_fondeo
     )
VALUES(
    :fon_id,:fot_mes_cierre,:fot_valor_fondeo
)";
  $datos=$this->conectar()->prepare($sql);
  $datos->bindValue(":fon_id",$fon_id);
  $datos->bindValue(":fot_mes_cierre",$fot_mes_cierre);
  $datos->bindValue(":fot_valor_fondeo",$fot_valor_fondeo);
  $datos->execute();
  $verificacion=$datos->rowCount();
  $datos=null;
  return $verificacion;
  }

  //elimina una transaccional de fondeo
  public function eliminar($id)
  {
    $sql="delete FROM transaccional_fondeo WHERE fot_id=$id";
    $datos=$this->conectar()->prepare($sql);
    $datos->execute();
    $verificacion=$datos->rowCount();
    $datos=null;
    return $verificacion;
  }

  //actualiza una transaccional de fondeo
  public function actualizar($transaccional_fondeo=array())
  {
    foreach ($transaccional_fondeo as $key=>$datos) {
      $$key=$datos;
      }
    $sql="update transaccional_fondeo
    SET fon_id=:fon_id,fot_mes_cierre=:fot_mes_cierre,fot_valor_fondeo=:fot_valor_fondeo
    WHERE fot_id=:fot_id";

    $datos=$this->conectar()->prepare($sql);
    $datos->bindValue(":fon_id",$fon_id);
    $datos->bindValue(":fot_mes_cierre",$fot_mes_cierre);
    $datos->bindValue(":fot_valor_fondeo",$fot_valor_fondeo);
    $datos->bindValue(":fot_id",$fot_id);
    $datos->execute();
    $verificacion=$datos->rowCount();
    $datos=null;
    return $verificacion;
  }
}
 ?>
