<?php
    function sessionAuthMiddleware($res) {
        session_start();
        if(isset($_SESSION['ID_USER'])){
            $res->user = new stdClass();
            $res->user->Id_Usario = $_SESSION['ID_USER'];
            $res->user->mail = $_SESSION['EMAIL_USER'];
            return;
        }
    }
?>
