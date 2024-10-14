<?php
require_once './App/Juegos/Controller/Juegos.controller.php';
require_once './App/Pedidos/Controller/Request.controller.php';
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar';

if(!empty($_GET['action'])){
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch($params[0]){
    case 'listar':
        $controller= new JuegoController();
        $controller->ShowGames();
        break;
    case 'listarPedido':
        $controller = new RequestsController();
        $controller->ShowRequest($params[1]);
        break;
}