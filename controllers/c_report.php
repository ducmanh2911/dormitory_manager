<?php
include "models/m_report.php";
class c_report extends controller {
    public function __construct()
    {
        $this->auth();
    }

    public function index(){
        $this->view("report/index");
    }

    public function create(){
        $result = new m_report();
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $message = $_POST['message'];

            $create = $result->create_report($_SESSION["login"]["username"],$title,$message);
            if(!$create){
                setcookie("err", "Lỗi tạo báo cáo!", time()+1, "/","", 0);
            }else{
                setcookie("suc", "Gửi báo cáo thành công", time()+1, "/","", 0);
                $this->redirect($this->base_url("report/index"));
            }
        }
        $this->view("report/create");
    }
}