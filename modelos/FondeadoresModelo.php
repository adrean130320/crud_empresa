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
    $sql="insert into fondeadores
    (fon_nombre,fon_identificacion,fon_correo,fon_direccion,
    fon_telefono) SELECT
    :fon_nombre,:fon_identificacion,:fon_correo,:fon_direccion,:fon_telefono
    FROM dual
    WHERE NOT EXISTS (select * from fondeadores
    where fon_identificacion=:fon_identificacion)
    LIMIT 1
    ";
  $datos=$this->conectar()->prepare($sql);
  $datos->bindValue(":fon_nombre",$fon_nombre);
  $datos->bindValue(":fon_identificacion",$fon_identificacion);
  $datos->bindValue(":fon_correo",$fon_correo);
  $datos->bindValue(":fon_direccion",$fon_direccion);
  $datos->bindValue(":fon_telefono",$fon_telefono);
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
    SET fon_nombre=:fon_nombre,fon_identificacion=:fon_identificacion,fon_correo=:fon_correo,
    fon_direccion=:fon_direccion,fon_telefono=:fon_telefono
    WHERE fon_id=:fon_id";
    $datos=$this->conectar()->prepare($sql);
    $datos->bindValue(":fon_id",$fon_id);
    $datos->bindValue(":fon_nombre",$fon_nombre);
    $datos->bindValue(":fon_identificacion",$fon_identificacion);
    $datos->bindValue(":fon_correo",$fon_correo);
    $datos->bindValue(":fon_direccion",$fon_direccion);
    $datos->bindValue(":fon_telefono",$fon_telefono);
    $datos->execute();
    $verificacion=$datos->rowCount();
    $datos=null;
    return $verificacion;
  }

  public function insertarExcel($nombre,$identificacion,$correo,$direccion,$telefono)
  {
$sql="insert into fondeadores
(fon_nombre,fon_identificacion,fon_correo,fon_direccion,
fon_telefono) SELECT
:fon_nombre,:fon_identificacion,:fon_correo,:fon_direccion,:fon_telefono
FROM dual
WHERE NOT EXISTS (select * from fondeadores
where fon_identificacion=:fon_identificacion)
LIMIT 1
";
  $datos=$this->conectar()->prepare($sql);
  $datos->bindValue(":fon_nombre",$nombre);
  $datos->bindValue(":fon_identificacion",$identificacion);
  $datos->bindValue(":fon_correo",$correo);
  $datos->bindValue(":fon_direccion",$direccion);
  $datos->bindValue(":fon_telefono",$telefono);
  $datos->execute();
  $verificacion=$datos->rowCount();
  $datos=null;
  return $verificacion;
  }
  public function buscar($fondeador)
  {
  $sql = "select  fon_identificacion FROM fondeadores WHERE fon_identificacion like :fon_identificacion";
  $datos=$this->conectar()->prepare($sql);
  $datos->bindValue(":fon_identificacion",$fondeador);
  $datos->execute();
  while ($fila[]=$datos->fetch(PDO::FETCH_OBJ)) { }
  $datos=null;
  return $fila;
  }
}



 ?>
