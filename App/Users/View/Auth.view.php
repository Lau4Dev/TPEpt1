<?php

class AuthView{
    private $user = null;

    public function __construct($user){
        $this->user = $user;    
    }
    public function showLogin($error = ''){
        require './Templates/form_login.phtml';
    }
}