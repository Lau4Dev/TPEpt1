<?php
require_once './App/Model/tiendaJuegos.model.php';
require_once './App/View/tiendaJuegos.view.php';


class JuegoController{
    private $model;
    private $view;

    public function __construct(){
        $model = new JuegoModel();
        $view = new JuegoView();
    }
    
    public function ShowGames(){
        $games = $this->model->getGames();
        $this->view->ShowList($games); 
    }
}