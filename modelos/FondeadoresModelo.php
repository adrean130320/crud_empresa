<?php

require_once $_SERVER["DOCUMENT_ROOT"].'/crud_empresa/modelos/Conexion.php';
/**
 *
 */
class FondeadoresModelo extends Conexion
{

  function __construct()
  {

  }

  //lista los fondeadores
  public function listar()
  {
  $sql = "SELECT * FROM fondeadores;";
  $datos=$this->conectar()->prepare($sql);
  $datos->execute();
  while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) { }
  $datos=null;
  return $filas;
  }

  //inserta un fondeador
  public function insertar($fondeadores=array())
  {
    foreach ($fondeadores as $key=>$datos) {
      $$key=$datos;
      }
    $sql="insert INTO fondeadores(
  fon_nombre, fon_identificacion
     )
VALUES(
    :fon_nombre, :fon_identificacion
)";
  $datos=$this->conectar()->prepare($sql);
  $datos->bindValue(":fon_nombre",$fon_nombre);
  $datos->bindValue(":fon_identificacion",$fon_identificacion);
  $datos->execute();
  $verificacion=$datos->rowCount();
  $datos=null;
  return $verificacion;
  }

  //elimina un fondeador
  public function eliminar($id)
  {
    $sql="delete FROM fondeadores WHERE fon_id=$id";
    $datos=$this->conectar()->prepare($sql);
    $datos->execute();
    $verificacion=$datos->rowCount();
    $datos=null;
    return $verificacion;
  }

  //actualiza un fondeador
  public function actualizar($fondeador=array())
  {
    foreach ($fondeador as $key=>$datos) {
      $$key=$datos;
      }
    $sql="update fondeadores
    SET fon_nombre,fon_identificacion
    WHERE fon_id=:fon_id";

    $datos=$this->conectar()->prepare($sql);
    $datos->bindValue(":fon_id",$fon_id);
    $datos->bindValue(":fon_nombre",$fon_nombre);
    $datos->bindValue(":fon_identificacion",$fon_identificacion);
    $datos->execute();
    $verificacion=$datos->rowCount();
    $datos=null;
    return $verificacion;
  }
}







 ?>
