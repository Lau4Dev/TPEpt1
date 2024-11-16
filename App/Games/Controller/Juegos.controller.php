<?php
require_once './App/Games/Model/Juegos.model.php';
require_once './App/Games/View/Juegos.view.php';

class JuegoController{
    private $model;
    private $modelPedidos;
    private $view;
    private $res;

    public function __construct($res){
        $this->model = new JuegoModel();
        $this->view = new JuegoView($res->user);
        $this->modelPedidos = new RequestModel();
    }
    
    public function showlinks(){
        $this->view->showLinks();
    }
    public function ShowGames(){
        $games = $this->model->getGames();
        $this->view->ShowGames($games); 
    }

    public function showFormAdd(){
        $this->view->showFormAdd();
    }
    public function showFormUpdate($id){
        $this->view->showFormUpdate($id);
    }
    public function AddGame($id){
        $nombre = $_POST['nombrejuego'];
        $genero = $_POST['generojuego'];
        $calificacion = $_POST['calificacionjuego'];

        if(empty($nombre) || empty($genero) || empty($calificacion || $nombre == null)){
            return $this->view->ShowGames('Faltan completar datos!');
        }

        $this->model->insertGame($nombre, $genero, $calificacion);
        
        header('Location: ' . BASE_URL);
    }
    public function UpdateGame($id) {
            $nombre = $_POST['nombreactualizarjuego'];
            $genero = $_POST['generoactualizarjuego'];
            $calificacion = $_POST['calificacionactualizarjuego'];
            $this->model->UpdateGame($nombre,$genero,$calificacion,$id);
            
            header('Location: ' . BASE_URL);
    }
    
    public function DeleteGame($id){
        //if($res->user){

        //}


        $juego = $this->model->getGameById($id);

        if(!$juego){
            return $this->view->ShowGames("No existe el juego con el id $id");
        }
        
        $pedidos = $this->modelPedidos->getRequests($id);

        if($pedidos){
            return $this->view->ShowError("No se puede eliminar el juego porque tiene pedidos asociados.");
        }



        $this->model->DeleteGame($id);

        header('Location: ' . BASE_URL);
    }

}