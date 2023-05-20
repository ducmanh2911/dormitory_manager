<?php
include "core/database.php";

class m_service extends DB
{
    public function insert_service($name, $describe, $price, $status)
    {
        $sql = "INSERT INTO `services`(`id`, `name`, `describe`, `price`, `status`) 
                VALUES (null,'$name','$describe',$price,$status)";
        return $this->query($sql);
    }

    public function getAllService()
    {
        $sql = "SELECT * FROM `services` WHERE 1";
        return $this->get_list($sql);
    }

    public function getAllServiceByID($id)
    {
        $sql = "SELECT * FROM `services` WHERE id = $id";
        return $this->get_row($sql);
    }

    public function update_service($id, $name, $describe, $price, $status)
    {
        $sql = "UPDATE `services` SET `name`='$name',`describe`='$describe',`price`=$price,`status`=$status WHERE id = $id";
        return $this->query($sql);
    }

    public function delete_service($id)
    {
        $sql = "DELETE FROM `services` WHERE id=$id";
        return $this->query($sql);
    }
}
