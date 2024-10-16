<?php

class UserModel{
    private $db;

    public function __construct(){
        $this->db =new PDO('mysql:host=localhost;'.'dbname=tiendajuegos;charset=utf8', 'root', '');
    }

    public function getUser($user){
        $query = $this->db->prepare('SELECT * FROM usuario WHERE nombre_usuario = ?');

        $query->execute([$user]);

        $ususario = $query->fetch(PDO::FETCH_OBJ);

        return $ususario;
    }



}