<?php
include "models/m_room.php";
class c_room extends controller {

    public function __construct()
    {
        $this->auth();
    }

    public function index(){
        $result = new m_room();
        $room = $result->getRoomByIdUser($_SESSION["login"]["username"]);
        $students = !empty($room["room_id"]) ? $result->getStudentByRoomsId($room["room_id"]) : "";
        $this->view("room/index", compact('room','students'));
    }

}
?>