<?php
require_once './config.php';
class UserModel{
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

    public function getUser($user){
        $query = $this->db->prepare('SELECT * FROM usuario WHERE nombre_usuario = ?');

        $query->execute([$user]);

        $ususario = $query->fetch(PDO::FETCH_OBJ);

        return $ususario;
    }



}