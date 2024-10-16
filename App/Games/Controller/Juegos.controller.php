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


}