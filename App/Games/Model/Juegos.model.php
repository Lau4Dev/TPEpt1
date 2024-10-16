<?php

class JuegoModel{
    private $db;

    public function __construct() {
        $this->db =new PDO('mysql:host=localhost;'.'dbname=tiendajuegos;charset=utf8', 'root', '');
    }

    public function getGames(){
        $query = $this->db->prepare("SELECT * FROM juego");

        $query->execute();

        $games = $query->fetchAll(PDO::FETCH_OBJ);

        return $games;
    }

    public function insertGames($nombre,$genero,$calificacion){
        $query = $this->db->prepare("INSERT INTO juego (nombre_juego, generos, calificacion) VALUES (?,?,?)");
        $query->execute([$nombre,$genero,$calificacion]);
    }


    
}
