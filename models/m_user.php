<?php 
require_once "core/database.php";
class m_user extends DB{

    function login_account($a,$b){
        $sql = "SELECT *  FROM users WHERE username = '$a' AND password = '$b'";
        $b = $this->get_row($sql);
        return $b;
    }

    public function getAllUser(){
        $sql = "SELECT * FROM users WHERE role = 0";
        return $this->get_list($sql);
    }

    public function editStatus($id, $status){
        $sql = "UPDATE users SET status = $status WHERE id = $id";
        return $this->query($sql);
    }

    public function getStatusByUserId($id){
        $sql = "SELECT status FROM users WHERE id = $id";
        return $this->get_row($sql);
    }

    public function checkEmail($email){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        return $this->get_list($sql);
    }

    public function insert_user($name, $sex, $date_birth, $address, $email, $phone, $username, $password, $avatar_url){
        $sql = "INSERT INTO users VALUES (null, '$username', '$password','$name', $sex, '$date_birth', '$address', '$email', '$phone',  '$avatar_url', 0, 1 , 1)";

        return $this->query($sql);
    }

    public function update_user($name, $sex, $date_birth, $address, $email, $phone, $username, $password, $avatar_url, $id)
    {
        // if($password != null){
        //     $sql = "UPDATE users SET username='$username',password='$password',name='$name',sex=$sex,date_birth='$date_birth',address='$address',email='$email',phone='$phone',avatar_url='$avatar_url' WHERE id = $id";
        // }else{
            $sql = "UPDATE users SET username='$username',name='$name',sex=$sex,date_birth='$date_birth',address='$address',email='$email',phone='$phone',avatar_url='$avatar_url' WHERE id = $id"; 
        // }
        return $this->query($sql);
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = $id";
        return $this->get_row($sql);
    }

    public function updatePassword($pass, $email){
        $sql = "UPDATE users SET password ='" . md5($pass) . "' WHERE email = '$email'";
        return $this->query($sql);
    }
}