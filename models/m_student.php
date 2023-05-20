<?php
require_once "core/database.php";
class m_student extends DB
{
    public function get_all_user(){
        $sql = "SELECT * FROM users";
        return $this->get_list($sql);
    }

    public function get_all_students()
    {
        $sql = "SELECT * FROM users  WHERE role = 1 ";
        return $this->get_list($sql);
    }

    public function getAllRooms()
    {
        $sql = "SELECT * FROM rooms";
        return $this->get_list($sql);
    }

    public function insert_student($id,$password, $name, $sex, $date_birth, $address, $email, $phone,  $id_user_create,  $avatar_url)
    {
        $sql = "INSERT INTO users VALUES (null, '$id', '$password', '$name', $sex, '$date_birth', '$address', '$email', '$phone', '$avatar_url', 1 ,1 ,0)";

        $resulst = $this->query($sql);
        if ($resulst) {
            return true;
        }
        return false;
    }

    public function get_student_by_id($id)
    {
        $sql = "SELECT *  FROM users  WHERE username = '$id'";
        return $this->get_row($sql);
    }

    public function update_student_by_id($id, $name, $sex, $date_birth, $address, $email, $phone, $avatar_url, $id_edit)
    {
        $sql = "UPDATE users 
                SET username='$id',name='$name',sex=$sex,date_birth='$date_birth',address='$address',email='$email',
                phone='$phone',avatar_url='$avatar_url' WHERE username = '$id_edit'";
        // die($sql);
        $resulst =  $this->query($sql);
        if(!$resulst){
            return false;
        }else{
            return true;
        }
    }

    public function delete_student($id){
        
        $sql = "DELETE FROM users WHERE username = '$id'";
        // $sql = "UPDATE `users` SET `deleted_at` = '0' WHERE `username` = '$id'";
        return $this->query($sql);
    }

    public function checkNumStudent(){
        $sql = "SELECT rooms.id, COUNT(contracts.room_id) AS count FROM contracts LEFT JOIN rooms ON contracts.room_id = rooms.id GROUP BY contracts.room_id";
        return $this->get_list($sql);
    }


    public function checkIssetStudent($id){
        $sql = "SELECT username FROM users WHERE username = '$id'";
        return $this->get_list($sql);
    }

    public function getAllIdStudent(){
        $sql = "SELECT username FROM users";
        return $this->get_list($sql);
    }

    public function getContractById($id){
        $sql = "SELECT * FROM contracts WHERE student_id = '$id' AND liquidation IS NULL";
        return $this->get_row($sql);
    }
}
