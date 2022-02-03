<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/crud_empresa/modelos/FondeadoresModelo.php';

require_once $_SERVER["DOCUMENT_ROOT"].'/crud_empresa/vendor/autoload.php';
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
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
    //header("location:../../vistas/fondeadores.php");
    $excel=$_FILES["fondeadores"];
    ;
    $ruta=$excel["tmp_name"];
    echo $ruta;
    $reader = ReaderEntityFactory::createReaderFromFile('../fondeadores.xlsx');

    $reader->open('../fondeadores.xlsx');

foreach ($reader->getSheetIterator() as $sheet) {
    foreach ($sheet->getRowIterator() as $row) {
        // do stuff with the row
        $cells = $row->getCells();
        $A = $cells[0]->getValue();
        $B = $cells[1]->getValue();
        $C = $cells[2]->getValue();
        $D = $cells[3]->getValue();
        $E = $cells[4]->getValue();
      ;



    }
}

$reader->close();
  }
}





 ?>
