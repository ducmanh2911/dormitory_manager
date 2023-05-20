<?php
include "models/m_bill.php";
class c_bill extends controller{
    public function __construct()
    {
        $this->auth();
    }

    public function index(){
        $result = new m_bill();
        $contract = $result->getRoomId($_SESSION["login"]["username"]);
        $bills = !empty($contract["room_id"]) ? $result->getBillByRoomId($contract["room_id"]) : $result->getBillByRoomId(9999);
        if(isset($_POST['payment'])){
            include "api/momo.php";
            // $update = $result->updateStatus()
        }
        $this->view("bill/bill", compact('bills'));
    }

    // public function payment(){
    //     if()
    // }
}