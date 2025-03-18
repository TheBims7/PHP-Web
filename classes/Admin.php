<?php
include_once 'User.php';

class Admin extends User {
    public function getName(){
        return "Admin: ".parent::getName();
    }

    public function getEmail(){
        return "Admin Email: ".parent::getEmail();
    }
}
?>