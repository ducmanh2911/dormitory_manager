<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
include "models/m_home.php";
class c_home extends controller{

    public function __construct()
    {
        $this->auth();
        $this->permission(0);
    }

    public function index(){
        // var_dump($_SESSION['login']['color_scheme']);
        // die($_SESSION['login']['color_scheme']);
        $today = date("Y-m-d");
        $result = new m_home();
        if(isset($_POST["valBg"])){
            $user_id = $_SESSION["login"]["id"];
            echo  $user_id ;
            if($_POST["valBg"] == "light"){
                $update = $result->updateBgColor(0,$user_id );
                var_dump($update);
            }
            if($_POST["valBg"] == "dark"){
                $update1 = $result->updateBgColor(1,$user_id );
                var_dump($update1);
            }
            $students = $result->getBgColor($user_id);
            $_SESSION['login']['color_scheme'] = $students["color_scheme"];
            return 1;
        }
        $students = $result->getAllStudent();

        $students_end = [];
        foreach($students as $key => $value){
            if(strtotime($value["date_end"]) < strtotime($today) ){
                array_push($students_end, $value);
            }
        }

        $rooms = $result->getAllRooms();

        $checkStudent = $result->checkNumStudent();

        $users = $result->getAllUsers();
        $this->view("admin/home/index", compact('students','students_end','rooms','checkStudent','users'));
    }

    public function statistic(){
        $this->view("admin/home/statistic");
    }
}