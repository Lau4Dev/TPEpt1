<?php

class RequestView{
    
    public function ShowRequest($ListRequests, $error = ''){
        require './Templates/listrequests.phtml';
    }
}