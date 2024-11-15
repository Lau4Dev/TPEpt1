<?php

class JuegoView{
    private $user = null;

    public function __construct($user){
        $this->user = $user;    
    }

    public function ShowGames($games){
        require './Templates/header.phtml';
        require './Templates/listajuegos.phtml';
        require './Templates/footer.phtml';
    }

    public function ShowError($error = ' '){
        require './Templates/header.phtml';
        require './Templates/error.phtml';
        require './Templates/footer.phtml';
    }
    public function showLinks(){
        require './Templates/header.phtml';
        require './Templates/showLinks.phtml';
        require './Templates/footer.phtml';

    }
}
