<?php
require_once './App/Games/Controller/Juegos.controller.php';
require_once './App/Requests/Controller/Request.controller.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'app/middlewares/verify.auth.middleware.php';
require_once './libs/response.php';
require_once './App/Users/Controller/Auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar';

$res = new Response();



if(!empty($_GET['action'])){
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch($params[0]){
    case 'listar':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller= new JuegoController($res);
        $controller->ShowGames();
        break;
    case 'listarPedido':
        $controller = new RequestsController();
        $controller->ShowRequest($params[1]);
        break;
    case 'showLogin':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
}