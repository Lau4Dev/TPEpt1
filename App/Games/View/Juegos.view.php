<?php

class JuegoView{
    private $user=null;

    public function __construct($user){
        $this->user = $user;    
    }

    public function ShowGames($games, $error = ''){
        require './Templates/listajuegos.phtml';
    }
}
