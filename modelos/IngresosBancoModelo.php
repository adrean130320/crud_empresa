<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/crud_empresa/modelos/Conexion.php';
/**
 *
 */
class IngresosBancoModelo extends Conexion{


  function __construct()
  {

  }
  //lista los igresos
  public function listar()
  {
  $sql = "SELECT * FROM ingresos_banco;";
  $datos=$this->conectar()->prepare($sql);
  $datos->execute();
  while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) { }
  $datos=null;
  return $filas;
  }
  public function insertarExcel($fecha_sistema,$cub_id,$inb_tansaccion,$motivo_transaccion,$emp_id,$monto_transaccion)
  {
    $sql="insert into ingresos_banco
    (inb_fecha_sistema, cub_id, inb_tansaccion,inb_motivo_transaccion,emp_id,inb_monto_transaccion) values
    (:inb_fecha_sistema,:cub_id,:inb_tansaccion,:inb_motivo_transaccion,:emp_id,:inb_monto_transaccion)";
    $datos=$this->conectar()->prepare($sql);
    $datos->bindValue(":inb_fecha_sistema",$fecha_sistema);
    $datos->bindValue(":cub_id",$cub_id);
    $datos->bindValue(":inb_tansaccion", $inb_tansaccion );
    $datos->bindValue(":inb_motivo_transaccion", $motivo_transaccion );
    $datos->bindValue(":emp_id", $emp_id );
    $datos->bindValue(":inb_monto_transaccion", $monto_transaccion );
    $datos->execute();
    $verificacion=$datos->rowCount();
    $datos=null;
    return $verificacion;
  }
}
 ?>
