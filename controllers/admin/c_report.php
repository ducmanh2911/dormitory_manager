<?php
include "models/m_report.php";
class c_report extends controller {

    function __construct()
    {
        $this->auth();
        $this->permission(0);
    }

    public function index(){
        $result = new m_report();
        $listRepot = $result->getAllReport();
        $this->view("admin/report/index", compact('listRepot'));
    }
    public function edit(){
        if(isset($_GET['id'])){
            $result = new m_report();
            $edit = $result->getEditReport($_GET['id']);
            if(!$edit){
                setcookie("err", "Không chấp nhận!", time()+1, "/","", 0);
            }else{
                setcookie("suc", "Đã xác nhận", time()+1, "/","", 0);
            }
            
            $this->redirect($this->base_url("admin/report/index"));
        }
    }
    public function delete()
    {
        if (isset($_GET["id"])) {
            $result = new m_report();
            $del = $result->delete_report($_GET["id"]);
            if (!$del) {
                setcookie("err", "Không được xóa!", time() + 1, "/", "", 0);
            } else {
                setcookie("suc", "Xóa thành công!", time() + 1, "/", "", 0);
            }
            $this->redirect($this->base_url("admin/report/index"));
        }
    }
}