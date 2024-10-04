<?php

class tiendaJuegosModel{
    private $db;

    public function __construct() {
        $this->db =new PDO('mysql:host=localhost;'.'dbname=tiendajuegos;charset=utf8', 'root', '');
    }

    public function getShopBD(){
        $query = $this->db->prepare("SELECT * FROM tiendajuegos");

        $query->execute();

        $tienda = $query->fetchAll(PDO::FETCH_OBJ);

        return $tienda;
    }

    public function insertGames($nombre,$genero,$calificacion){
        $query = $this->db->prepare("INSERT INTO juego (nombre_juego, generos, calificacion) VALUES (?,?,?)");
        $query->execute([$nombre,$genero,$calificacion]);
    }

    
}
