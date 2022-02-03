<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/crud_empresa/modelos/Conexion.php';
/**
 *
 */
class MotivosTransaccionModelo extends Conexion{


  function __construct()
  {

  }

  //lista los motivos de transaccion
  public function listar()
  {
  $sql = "SELECT * FROM motivos_transaccion;";
  $datos=$this->conectar()->prepare($sql);
  $datos->execute();
  while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) { }

  $datos=null;
  return $filas;
  }

  //inserta un motivo de transaccion
  public function insertar($motivo_transaccion=array())
  {
    foreach ($motivo_transaccion as $key=>$datos) {
      $$key=$datos;
      }
    $sql="insert INTO motivos_transaccion(
    mot_motivo_transaccion, emp_id
     )
VALUES(
    :mot_motivo_transaccion, :emp_id
)";
  $datos=$this->conectar()->prepare($sql);
  $datos->bindValue(":mot_motivo_transaccion",$mot_motivo_transaccion);
  $datos->bindValue(":emp_id",$emp_id);
  $datos->execute();
  $datos=null;
  return $filas;
  }

  //elimina un motivo transaccion
  public function eliminar($id)
  {
    $sql="delete FROM motivos_transaccion WHERE mot_id=$id";
    $datos=$this->conectar()->prepare($sql);
    $datos->execute();
    $verificacion=$datos->rowCount();
    $datos=null;
    return $verificacion;
  }

  //actualiza un motivo transaccion
  public function actualizar($motivo_transaccion=array())
  {
    foreach ($motivo_transaccion as $key=>$datos) {
      $$key=$datos;
      }
    $sql="update motivos_transaccion
    SET mot_motivo_transaccion=:mot_motivo_transaccion,emp_id=:emp_id
    WHERE mot_id=:mot_id";

    $datos=$this->conectar()->prepare($sql);
    $datos->bindValue(":mot_motivo_transaccion",$mot_motivo_transaccion);
    $datos->bindValue(":mot_id",$mot_id);
    $datos->bindValue(":emp_id",$emp_id);
    $datos->execute();
    $verificacion=$datos->rowCount();
    $datos=null;
    return $verificacion;
  }
}
 ?>
