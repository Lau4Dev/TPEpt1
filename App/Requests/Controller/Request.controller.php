<?php
require_once './App/Requests/Model/Request.model.php';
require_once './App/Requests/View/Request.view.php';

class RequestsController{
    private $model;
    private $modelJ;
    private $view;

    public function __construct($res) {
        $this->model = new RequestModel();
        $this->modelJ = new JuegoModel();
        $this->view = new RequestView($res->user);
    }

    public function ShowRequest($id){
        $ListRequests = $this->model->getRequests($id);
        $this->view->ShowRequest($ListRequests);
    }
    
    public function AddRequest(){
        
        $id_juego = $_POST['idjuego'];
        $cantidad = $_POST['cantidadrequest'];
        $precio = $_POST['preciorequest'];

        if(empty($cantidad)||empty($precio) || empty($id_juego)){
            $this->view->ShowRequest("Faltan completar datos weon!");
        }
        
        $juego = $this->modelJ->getGameById($id_juego);

        if(!$juego){
            $this->view->ShowRequest("No existe el juego con el id = $id_juego");
        }
            $this->model->insertRequests($cantidad, $precio);
            
            header('Location: ' . BASE_URL);
        
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
    public function DeleteRequest(){
            $id = $_POST['idpedidoeliminar'];
            $this->model->DeleteGame($id);
            header('Location: ' . BASE_URL);
    }
}