<?php
require_once "config.php";
class DB
{
    private $ketnoi;
    public function connect()
    {
        if (!$this->ketnoi) {
            $this->ketnoi = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME) or die('Error => DATABASE');
            mysqli_query($this->ketnoi, "set names 'utf8' ");
        }
    }
    public function dis_connect()
    {
        if ($this->ketnoi) {
            mysqli_close($this->ketnoi);
        }
    }
    public function query($sql)
    {
        $this->connect();
        $row = $this->ketnoi->query($sql);
        return $row;
    }
    public function remove($table, $where)
    {
        $this->connect();
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->ketnoi, $sql);
    }
    public function get_list($sql)
    {
        $this->connect();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result) {
            die('Câu truy vấn bị sai');
        }
        $return = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }
        mysqli_free_result($result);
        return $return;
    }
    public function get_row($sql)
    {
        $this->connect();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result) {
            die('Câu truy vấn bị sai');
        }
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if ($row) {
            return $row;
        }
        return false;
    }
    public function num_rows($sql)
    {
        $this->connect();
        $result = mysqli_query($this->ketnoi, $sql);
        if (!$result) {
            die('Câu truy vấn bị sai');
        }
        $row = mysqli_num_rows($result);
        mysqli_free_result($result);
        if ($row) {
            return $row;
        }
        return false;
    }
    public function lastId($sql){
        $this->connect();
         if($this->ketnoi->query($sql)){
            return mysqli_insert_id($this->ketnoi);
         }else{
            return false;
         }
    }
}

