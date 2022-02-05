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

}
 ?>
