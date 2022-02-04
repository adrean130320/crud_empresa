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
  $sql = "select DISTINCT mot.*,e.emp_nombre_empresa FROM motivos_transaccion AS mot JOIN empresa as e
WHERE mot.emp_id=e.emp_id";
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
$sql="insert into motivos_transaccion
(mot_motivo_transaccion,emp_id)
 SELECT
:mot_motivo_transaccion,:emp_id
FROM dual
WHERE NOT EXISTS (select * from motivos_transaccion
where mot_motivo_transaccion=:mot_motivo_transaccion)
LIMIT 1
";


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
  public function buscar($motivo)
  {
  $sql = "select  * FROM motivos_transaccion WHERE mot_motivo_transaccion like :mot_motivo_transaccion";
  $datos=$this->conectar()->prepare($sql);
  $datos->bindValue(":mot_motivo_transaccion",$motivo);
  $datos->execute();
  while ($fila[]=$datos->fetch(PDO::FETCH_OBJ)) { }
  $datos=null;
  return $fila;
  }
}
 ?>
