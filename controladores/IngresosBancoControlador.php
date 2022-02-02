<?php
require_once '../modelos/IngresosBancoModelo.php';

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
}
