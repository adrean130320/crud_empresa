<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/crud_empresa/modelos/Conexion.php';
/**
 *
 */
class EmpresaModelo extends Conexion{


  function __construct()
  {

  }

  //lista las empresas
  public function listar()
  {
  $sql = "SELECT * FROM empresa;";
  $datos=$this->conectar()->prepare($sql);
  $datos->execute();
  while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) { }
  $datos=null;
  return $filas;
  }
}
 ?>
