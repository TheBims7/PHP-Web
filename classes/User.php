<?php
include_once '../config/Database.php';

class User {
    private $db;
    private $id;
    private $name;
    private $email;

    public function __construct(){
        $this->db = (new Database())->getConnection();
    }

        public function setUserData($id, $name, $email){
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
        }

        public function getName(){
            return $this->name;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getAllUsers(){
            $sql = "SELECT * FROM users";
            return $this->db->query($sql);
        }
}
?>