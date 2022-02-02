<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/crud_empresa/modelos/Conexion.php';
/**
 *
 */
class BancosModelo extends Conexion{


  function __construct()
  {

  }

  //lista los bancos
  public function listar()
  {
  $sql = "SELECT * FROM bancos;";
  $datos=$this->conectar()->prepare($sql);
  $datos->execute();
  while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) { }
  $datos=null;
  return $filas;
  }
}
 ?>
