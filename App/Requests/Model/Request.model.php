<?php
require_once './config.php';
class RequestModel{
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
    

    public function getRequests($id){
        $query = $this->db->prepare('SELECT * FROM pedidojuegos WHERE Id_Juego = ?');

        $query->execute([$id]);

        $requests = $query->fetchAll(PDO::FETCH_OBJ);

        return $requests;
    }

    
    public function insertRequests($cantidad,$precio){
        $query = $this->db->prepare("INSERT INTO pedidojuegos (cantidad, precio) VALUES (?,?)");
        $query->execute([$cantidad,$precio]);

        $id = $this->db->lastInsertId();

        return $id;
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