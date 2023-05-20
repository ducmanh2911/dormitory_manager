<?php
include "models/m_contract.php";
class c_contract extends controller{
    public function __construct()
    {
        $this->auth();
    }

    public function index(){
        $result = new m_contract();
        $contract = $result->getRoomByIdUser($_SESSION["login"]["username"]);
        $student = !empty($contract["student_id"]) ? $result->getStudentByRoomsId($contract["student_id"]) : "";
        $this->view("contract/index", compact('contract','student'));
    }
}
?>