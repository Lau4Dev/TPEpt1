<?php

class PedidoModel{
    private $db;

    public function __construct() {
        $this->db =new PDO('mysql:host=localhost;'.'dbname=tiendajuegos;charset=utf8', 'root', '');
    }

    public function getRequests(){
        $query = $this->db->prepare("SELECT * FROM pedidoJuegos");

        $query->execute();

        $requests = $query->fetchAll(PDO::FETCH_OBJ);

        return $requests;
    }

    public function insertRequests($nombre,$genero,$calificacion){
        $query = $this->db->prepare("INSERT INTO juegoPedidos (nombre_juego, generos, calificacion) VALUES (?,?,?)");
        $query->execute([$nombre,$genero,$calificacion]);
    }

    
}