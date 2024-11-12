<?php
require_once './config.php';
class JuegoModel{
    private $db;

    public function __construct() {
        $this->db =new PDO("mysql:host=".MYSQL_HOST . ";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
        $this->_deploy();
    }
    private function _deploy() {
        
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if(count($tables) == 0) {
            $sql =<<<END

		END;
        $this->db->query($sql);
        }
    }

    public function getGames(){
        $query = $this->db->prepare("SELECT * FROM juego");

        $query->execute();

        $games = $query->fetchAll(PDO::FETCH_OBJ);

        return $games;
    }

    public function getGameById($id){
        $query = $this->db->prepare('SELECT * FROM juego WHERE Id_Juego = ?');
        $query->execute([$id]);

        $juego = $query->fetch(PDO::FETCH_OBJ);

        return $juego;
    }

    public function insertGame($nombre,$genero,$calificacion){

        $query = $this->db->prepare("INSERT INTO juego (nombre_juego, generos, califiacion) VALUES (?,?,?)");

        $query->execute([$nombre,$genero,$calificacion]);
    }

    public function UpdateGame($nombre,$genero,$calificacion){ 

        $query = $this->db->prepare('UPDATE juego SET nombre_juego = ? , generos = ? , califiacion = ?');

        $query->execute([$nombre,$genero,$calificacion]);
    }

    public function DeleteGame($nombre){

        $query = $this->db->prepare('DELETE FROM juego WHERE nombre_juego = ?');

        $query->execute([$nombre]);
    }
    
}
