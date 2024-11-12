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

        if(empty($nombre) || empty($genero) || empty($calificacion)){
            return $this->view->ShowGames('Faltan completar datos!');
        }

        $this->model->insertGame($nombre, $genero, $calificacion);
        
        header('Location: ' . BASE_URL);
    }
    public function UpdateGame() {
        $nombre = $_POST['nombreactualizarjuego'];
        $genero = $_POST['generoactualizarjuego'];
        $calificacion = $_POST['calificacionactualizarjuego'];

        if(empty($nombre) || empty($genero) || empty($calificacion)){
            return $this->view->ShowGames('Faltan completar datos!');
        }

        $this->model->UpdateGame($nombre,$genero,$calificacion);

        header('Location: ' . BASE_URL);
    }
    
    public function DeleteGame($id){
        $juego = $this->model->getGameById($id);

        if(!$juego){
            return $this->view->ShowGames("No existe el juego con el id $id");
        }

        $this->model->DeleteGame($id);

        header('Location: ' . BASE_URL);
    }

}