<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/crud_empresa/modelos/FondeadoresModelo.php';

require_once $_SERVER["DOCUMENT_ROOT"].'/crud_empresa/libs/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\{IOFactory,Cell\Coordinate};
/**
 *
 */
class FondeadoresControlador
{
  private $model;
  function __construct()
  {
    $this->model=new FondeadoresModelo();
  }

  public function listar()
  {
    return $this->model->listar();
  }

  public function insertar()
  {
    $fondeador = array('fon_nombre' =>$_POST["fon_nombre"],
    'fon_identificacion'=>$_POST["fon_identificacion"],
    'fon_correo'=>$_POST["fon_correo"],
    'fon_direccion'=>$_POST["fon_direccion"],
    'fon_telefono'=>$_POST["fon_telefono"]
   );
   header("location:../../vistas/Fondeadores.php");
   return $this->model->insertar($fondeador);
  }

  public function actualizar()
  {
    $fondeador = array('fon_id' =>$_POST["fon_id"],
    'fon_nombre'=>$_POST["fon_nombre"],
    'fon_identificacion'=>$_POST["fon_identificacion"],
    'fon_correo'=>$_POST["fon_correo"],
    'fon_direccion'=>$_POST["fon_direccion"],
    'fon_telefono'=>$_POST["fon_telefono"]
   );
   header("location:../../vistas/Fondeadores.php");
   return $this->model->actualizar($fondeador);
  }

  public function eliminar()
  {
    header("location:../../vistas/Fondeadores.php");
    return $this->model->eliminar($_GET["fon_id"]);
  }

  public function cargarExcel()
  {
    $excel=$_FILES["fondeadores"];
    $archivo=$excel['tmp_name'];
    $documento= IOFactory::load($archivo);
      $hojaActual=$documento->getSheet($i);
      $numeroFilas=$hojaActual->getHighestDataRow();
      $letra =  $hojaActual->getHighestColumn();
      $numeroLetra=Coordinate::columnIndexFromString($letra);
      //este recorre la fila
      for ($j=2; $j <=$numeroFilas ; $j++) {
        $datos = array();
        //este las columnas
        for ($k=1; $k <=$numeroLetra ; $k++) {

    $valor=$hojaActual->getCellByColumnAndRow($k,$j);
          array_push($datos,$valor);
        }
        $this->model->insertar($datos);
      }
  }
}





 ?>
