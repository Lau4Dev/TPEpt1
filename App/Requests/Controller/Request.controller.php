<?php
require_once './App/Requests/Model/Request.model.php';
require_once './App/Requests/View/Request.view.php';

class RequestsController{
    private $model;
    private $view;

    public function __construct($res) {
        $this->model = new RequestModel();
        $this->view = new RequestView($res->user);
    }

    public function ShowRequest($id){
        $ListRequests = $this->model->getRequests($id);
        $this->view->MostrarRequest($ListRequests);
    }
    
    public function AddRequest(){
        $id = $_POST['idjuego'];
        $idusuario = $_POST['idusuario'];
        $cantidad = $_POST['cantidadrequest'];
        $precio = $_POST['preciorequest'];

        $juego = $this->model->getRequests($id);
        if($juego==null){
            echo "NO EXISTE EL JUEGO";
        }
        else{
            $this->model->insertRequests($id,$idusuario, $cantidad, $precio);
            
            header('Location: ' . BASE_URL);
        }
        
    }
    public function UpdateRequest(){
        $id = $_POST['idjuego'];
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