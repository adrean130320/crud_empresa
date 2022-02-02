<?php
require_once '../modelos/BancosModelo.php';

/**
 *
 */
class BancosControlador
{
  private $model;
  function __construct()
  {
    $this->model=new BancosModelo();
  }

  public function listar()
  {
    return $this->model->listar();
  }
}
