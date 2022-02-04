<?php
require_once '../modelos/IngresosBancoModelo.php';
require_once '../controladores/MotivosTransaccionControlador.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/crud_empresa/vendor/autoload.php';
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
/**
 *
 */
class IngresosBancoControlador
{
  private $model;
  function __construct()
  {
    $this->model=new IngresosBancoModelo();
  }

  public function listar()
  {
    return $this->model->listar();
  }

  public function cargarExcel()
  {
    $MotivosTransaccion = new MotivosTransaccionControlador();
    $excel=$_FILES["ingresos"];

    set_time_limit(900);
    $ruta=$excel["tmp_name"];

    $reader = ReaderEntityFactory::createXLSXReader();
    $reader ->open($ruta);

foreach ($reader->getSheetIterator() as $sheet) {
    foreach ($sheet->getRowIterator() as $row) {
        $cells = $row->getCells();
        $motivo= $MotivosTransaccion->buscar($cells[3]->getValue());
        var_dump($motivo);
         if (count($motivo)>1) {
          $this->model->insertarExcel($cells[0]->getValue(),$cells[1]->getValue(),$cells[2]->getValue(),$cells[3]->getValue(),$motivo[0]->emp_id,$cells[4]->getValue());
         }
         else {
           $this->model->insertarExcel($cells[0]->getValue(),$cells[1]->getValue(),$cells[2]->getValue(),$cells[3]->getValue(),'0',$cells[4]->getValue());
         }
    }
}
$reader->close();
header("location:../vistas/IngresosBanco.php");

  }

  }
