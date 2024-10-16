<?php

class AuthView{
    
    public function showLogin($error = ''){
        require './Templates/form_login.phtml';
    }
}