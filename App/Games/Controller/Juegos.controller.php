<?php
require_once './App/Games/Model/Juegos.model.php';
require_once './App/Games/View/Juegos.view.php';

class JuegoController{
    private $model;
    private $view;

    public function __construct($res){
        $this->model = new JuegoModel();
        $this->view = new JuegoView($res->user);
    }
    
    public function ShowGames(){
        $games = $this->model->getGames();
        $this->view->ShowGames($games); 
    }
    public function AddGame(){
        $nombre = $_POST['nombrejuego'];
        $genero = $_POST['generojuego'];
        $calificacion = $_POST['calificacionjuego'];
        
        $this->model->insertGame($nombre, $genero, $calificacion);
        
        header('Location: ' . BASE_URL);
    }
    public function UpdateGame() {
        $nombre = $_POST['nombreactualizarjuego'];
        $genero = $_POST['generoactualizarjuego'];
        $calificacion = $_POST['calificacionactualizarjuego'];
        $id = $_POST['idactualizarjuego'];
        $this->model->UpdateGame($nombre,$genero,$calificacion,$id);

        header('Location: ' . BASE_URL);
    }
    public function DeleteGame(){
        $id = $_POST['idjuegoeliminar'];
        $this->model->DeleteGame($id);
        header('Location: ' . BASE_URL);
    }



}