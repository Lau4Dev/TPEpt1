<?php

class RequestView{
    private $user = null;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function ShowRequest($ListRequests, $error = ''){
        require './Templates/header.phtml';
        require './Templates/listrequests.phtml';
        require './Templates/footer.phtml';

    }
}