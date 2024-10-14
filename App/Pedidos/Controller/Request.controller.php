<?php
require_once './App/Pedidos/Model/Request.model.php';
require_once './App/Pedidos/View/Request.view.php';

class RequestsController{
    private $model;
    private $view;

    public function __construct() {
        $this->model = new RequestModel();
        $this->view = new RequestView();
    }

    public function ShowRequest($id){
        $ListRequests = $this->model->getRequestss($id);
        $this->view->MostrarRequest($ListRequests);
    }
}