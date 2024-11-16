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
    public function showRequests($requests){
        require './Templates/header.phtml';
        require './Templates/listRequestLinks.phtml';
        require './Templates/footer.phtml';
    }
    public function showRequestsDetails($details){
        require './Templates/header.phtml';
        require './Templates/listRequestsDetails.phtml';
        require './Templates/footer.phtml';
    }
    public function ShowFormUpdateRequest($id){
        require './Templates/header.phtml';
        require './Templates/formUpdatePedido.phtml';
        require './Templates/footer.phtml';
    }
    public function ShowFormAdd($juegos){
        require './Templates/header.phtml';
        require './Templates/form_pedidos.phtml';
        require './Templates/footer.phtml';
    }
}