<?php
require_once '../modelos/EmpresaModelo.php';

/**
 *
 */
class EmpresaControlador
{
  private $model;
  function __construct()
  {
    $this->model=new EmpresaModelo();
  }

  public function listar()
  {
    return $this->model->listar();
  }
}
