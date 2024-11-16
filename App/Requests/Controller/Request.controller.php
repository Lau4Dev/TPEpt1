<?php
require_once './App/Requests/Model/Request.model.php';
require_once './App/Requests/View/Request.view.php';
require_once './App/Games/Model/Juegos.model.php';

class RequestsController{
    private $model;
    private $modelJ;
    private $view;

    public function __construct($res) {
        $this->model = new RequestModel();
        $this->modelJ = new JuegoModel();
        $this->view = new RequestView($res->user);
    }

    public function ShowFormUpdateRequest($id){
        $this->view->ShowFormUpdateRequest($id);
    }
    public function ShowRequest($id){
        $ListRequests = $this->model->getRequests($id);
        $juegos = $this->modelJ->getGames();
        $this->view->ShowRequest($ListRequests, $juegos);
    }
    public function ShowRequestDetails($id){
        $ListRequests = $this->model->getRequestsDetails($id);
        $this->view->ShowRequestsDetails($ListRequests);
    }
    public function ShowRequests(){
        $ListRequests = $this->model->getAllRequests();
        $this->view->ShowRequests($ListRequests);
    }
    public function AddRequest(){
        
        $id = $_POST['id_juego'];
        $cantidad = $_POST['cantidadrequest'];
        $precio = $_POST['preciorequest'];

        if(empty($cantidad)||empty($precio) || empty($id_juego)){
            $this->view->ShowRequest("Faltan completar datos weon!");
        }
        
        $juego = $this->modelJ->getGameById($id);

        if(!$juego){
            $this->view->ShowRequest("No existe el juego con el id = $id");
        }
            $this->model->insertRequests($cantidad, $precio,$id);
            
            header('Location: ' . BASE_URL);
        
    }
    public function showFormAdd(){
        $juegos = $this->modelJ->getGames();
        $this->view->ShowFormAdd($juegos);
    }
    public function UpdateRequest($id){
        $cantidad = $_POST['cantidadrequest'];
        $precio = $_POST['preciorequest'];
        $juego = $this->model->getRequests($id);


        if($juego){
            $this->model->UpdateRequests($cantidad, $precio,$id);
            header('Location: ' . BASE_URL);
        }
    }
    public function UpdateRequestDetails($id){
        $cantidad = $_POST['cantidadrequest'];
        $precio = $_POST['preciorequest'];

        $this->model->UpdateRequestsDetails($cantidad, $precio,$id);
         header('Location: ' . BASE_URL);
    }
    public function DeleteRequest($id){
            $this->model->DeleteGame($id);
            header('Location: ' . BASE_URL);
    }
}