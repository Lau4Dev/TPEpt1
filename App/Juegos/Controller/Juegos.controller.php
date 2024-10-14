<?php
require_once './App/Juegos/Model/Juegos.model.php';
require_once './App/Juegos/View/Juegos.view.php';

class JuegoController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new JuegoModel();
        $this->view = new JuegoView();
    }
    
    public function ShowGames(){
        $games = $this->model->getGames();
        $this->view->ShowGames($games); 
    }


}