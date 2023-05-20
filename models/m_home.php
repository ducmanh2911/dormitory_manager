<?php
include "core/database.php";

class m_home extends DB{


    public function getAllStudent(){
        $sql = "SELECT * FROM contracts";
        return $this->get_list($sql);
    }

    public function getAllRooms(){
        $sql = "SELECT * FROM rooms";
        return $this->get_list($sql);
    }

    public function checkNumStudent(){
        $sql = "SELECT rooms.id, COUNT(contracts.room_id) AS count FROM `contracts` RIGHT JOIN rooms ON contracts.room_id = rooms.id GROUP BY contracts.room_id";
        return $this->get_list($sql);
    }

    public function getAllUsers(){
        $sql = "SELECT * FROM users";
        return $this->get_list($sql);
    }
    
    public function getBgColor($id){
        $sql = "SELECT color_scheme FROM users WHERE id = $id";
        return $this->get_row($sql);

    }

    public function updateBgColor($valBg, $id){
        $sql = "UPDATE users SET color_scheme = $valBg WHERE id = $id";
        return $this->query($sql);
    }
}