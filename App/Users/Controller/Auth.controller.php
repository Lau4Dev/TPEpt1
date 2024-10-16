<?php
require_once './App/Users/Model/User.model.php';
require_once './App/Users/View/Auth.view.php';

class AuthController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin(){
        return $this->view->showLogin();
    }

    public function login() {
        if (!isset($_POST['username']) || empty($_POST['username'])) {
            return $this->view->showLogin('Falta completar el nombre de usuario');
        }
    
        if (!isset($_POST['password']) || empty($_POST['password'])) {
            return $this->view->showLogin('Falta completar la contraseña');
        }
    
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $userFromDB = $this->model->getUser($username);

        if($userFromDB && password_verify($password, $userFromDB->contraseña)){
            session_start();
            $_SESSION['ID_USER'] = $userFromDB->Id_Usario;
            $_SESSION['EMAIL_USER'] = $userFromDB->mail;
    
            header('Location: ' . BASE_URL);
        } else {
            return $this->view->showLogin('Credenciales incorrectas');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL);
    }



}