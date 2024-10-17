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

    public function insertGame($nombre,$genero,$calificacion){
        $query = $this->db->prepare("INSERT INTO juego (nombre_juego, generos, califiacion) VALUES (?,?,?)");
        $query->execute([$nombre,$genero,$calificacion]);
    }
    public function UpdateGame($nombre,$genero,$calificacion,$id){ 
        $query = $this->db->prepare('UPDATE juego SET nombre_juego = ? , generos = ? , califiacion = ? WHERE Id_Juego = ?');
        $query->execute([$nombre,$genero,$calificacion,$id]);
    
    }
    public function DeleteGame($id){
        $query = $this->db->prepare('DELETE FROM juego WHERE Id_Juego = ?');
        $query->execute([$id]);
    }
    
}
