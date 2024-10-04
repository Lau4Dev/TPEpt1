<?php
require_once './App/Model/tiendaJuegos.model.php';
require_once './App/View/tiendaJuegos.view.php';


class tiendaJuegosController{
    private $model;
    private $view;

    public function __construct(){
        $model = new tiendaJuegosModel();
        $view = new tiendaJuegosView();
    }

    public function ShowList(){
        $tienda = $this->model->TraerBD();
        $this->view->ShowList($tienda); 
    }
}