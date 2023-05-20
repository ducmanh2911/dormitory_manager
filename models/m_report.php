<?php
include "core/database.php";
class m_report extends DB{

    public function create_report($student_id,$title, $message){
        $sql = "INSERT INTO reports VALUES (NULL,NULL,'$student_id','$title', '$message',NULL,0)";
        return $this->query($sql);
    }
    public function getAllReport(){
        $sql = "SELECT reports.*,users.name
        FROM reports
        INNER JOIN users ON reports.student_id = users.username
        WHERE users.role = 1";
        return $this->query($sql); 
    }
    public function getEditReport($id){
        $sql = "UPDATE reports SET status = 2 where id = $id";
        return $this->query($sql);
    }
    public function delete_report($id){
        $sql = "DELETE FROM reports WHERE id = $id";
        return $this->query($sql);
    }
}