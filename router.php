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
        $controller = new JuegoController($res);
        $controller->showlinks();
        break;

    case 'listarjuegos':
        sessionAuthMiddleware($res);
        $controller= new JuegoController($res);
        $controller->ShowGames();
        break;
    case 'listarPedido':
        sessionAuthMiddleware($res);
        $controller = new RequestsController($res);
        $controller->ShowRequest($params[1]);
        break;
    case 'showLogin':
        sessionAuthMiddleware($res);
        $controller = new AuthController($res);
        $controller->showLogin();
        break;
    case 'login':
        $controller = new AuthController($res);
        $controller->login();
        break;
    case 'logout':
        $controller = new AuthController($res);
        $controller->logout();
        break;
    case 'aniadirjuego':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new JuegoController($res);
        $controller->AddGame();
        break;
    case 'actualizarjuego':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new JuegoController($res);
        $controller->UpdateGame();
        break;
    case 'eliminarjuego':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new JuegoController($res);
        $controller->DeleteGame($params[1]);
        break;
    case 'aniadirRequest':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new RequestsController($res);
        $controller->AddRequest();
        break;
    case 'actualizarRequest':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new RequestsController($res);
        $controller->UpdateRequest($params[1]);
        break;
    case 'eliminarRequest':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controller = new RequestsController($res);
        $controller->DeleteRequest($params[1]);
        break;
    
}