<?php

class RequestModel{
    private $db;

    public function __construct() {
        $this->db =new PDO('mysql:host=localhost;'.'dbname=tiendajuegos;charset=utf8', 'root', '');
    }

    public function getRequests($id){
        $query = $this->db->prepare('SELECT * FROM pedidojuegos WHERE Id_Juego = ?');

        $query->execute([$id]);

        $requests = $query->fetchAll(PDO::FETCH_OBJ);

        return $requests;
    }

    
    public function insertRequests($id,$idusuario,$cantidad,$precio){
        $query = $this->db->prepare("INSERT INTO pedidojuegos (Id_Juego,Id_Usario,cantidad, precio) VALUES (?,?,?,?)");
        $query->execute([$id,$idusuario,$cantidad,$precio]);
    }
    public function UpdateRequests($cantidad,$precio,$id){
        $query = $this->db->prepare('UPDATE pedidojuegos SET cantidad = ? , precio = ? WHERE Id_Juego = ?');
        $query->execute([$cantidad,$precio,$id]);
    
    }
    public function DeleteGame($id){
            $query = $this->db->prepare('DELETE FROM pedidojuegos WHERE id_pedido = ?');
            $query->execute([$id]);
    }



}