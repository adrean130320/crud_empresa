<?php
require_once '../modelos/TransaccionalFondeoModelo.php';
require_once '../controladores/FondeadoresControlador.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/crud_empresa/vendor/autoload.php';
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

/**
 *
 */
class TransaccionalFondeoControlador
{
  private $model;
  function __construct()
  {
    $this->model=new TransaccionalFondeoModelo();
  }

  public function listar()
  {
    return $this->model->listar();
  }

  public function cargarExcel()
  {
    $fondeador = new FondeadoresControlador();
    $excel=$_FILES["trs_fondeo"];
    set_time_limit(900);
    $ruta=$excel["tmp_name"];
    if ($rest = substr($excel["name"], -4)=="xlsx") {
//       // code...
//
        $reader = ReaderEntityFactory::createXLSXReader();
        $reader ->open($ruta);
//
  foreach ($reader->getSheetIterator() as $sheet) {
      foreach ($sheet->getRowIterator() as $row) {
          $cells = $row->getCells();
          echo $cells[0]->getValue();
          $documento= $fondeador->buscar($cells[0]->getValue());
//         var_dump($motivo);
//          if (count($motivo)>1) {
//           $this->model->insertarExcel($cells[0]->getValue(),$cells[1]->getValue(),$cells[2]->getValue(),$cells[3]->getValue(),$motivo[0]->emp_id,$cells[4]->getValue());
//          }
//          else {
//            $this->model->insertarExcel($cells[0]->getValue(),$cells[1]->getValue(),$cells[2]->getValue(),$cells[3]->getValue(),'0',$cells[4]->getValue());
//          }
      }
    }
    $reader->close();
   }
//  return header("location:../vistas/IngresosBanco.php");
  }

}





 ?>
