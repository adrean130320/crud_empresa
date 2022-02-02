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
}
 ?>
