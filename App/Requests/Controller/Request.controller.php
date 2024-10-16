<?php
require_once './App/Requests/Model/Request.model.php';
require_once './App/Requests/View/Request.view.php';

class RequestsController{
    private $model;
    private $view;

    public function __construct() {
        $this->model = new RequestModel();
        $this->view = new RequestView();
    }

    public function ShowRequest($id){
        $ListRequests = $this->model->getRequests($id);
        $this->view->MostrarRequest($ListRequests);
    }
}