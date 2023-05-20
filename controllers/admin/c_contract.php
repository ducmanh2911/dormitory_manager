<?php
include "models/m_contract.php";
class c_contract extends controller {

    function __construct()
    {
        $this->auth();
        $this->permission(0);
    }

    public function index(){
        $result = new m_contract();
        $contract = $result->getAllContract();
        $this->view("admin/contract/index", compact('contract'));
    }
    public function indexliquid(){
        $result = new m_contract();
        $contract = $result->getAllContractLiqui();
        $this->view("admin/contract/indexLiqui", compact('contract'));
    }

    public function create(){
        $result = new m_contract();
        $students = $result->getAllStudent();

        if(isset($_POST['idS'])){
            $student = $result->getStudentByRoomsId($_POST['idS']);
            $roomss = $result->getAllRoomsByGender($student['sex']);
            foreach($roomss as $value) {
                echo '<option value="' . $value['id'] . '">' . $value['room_name'] . '</option>';
            }
            return 1;
        }else{
            if($students[0]['sex'] != null){
                $rooms = $result->getAllRoomsByGender($students[0]['sex']);
                
            }
        }

        if(isset($_POST["submit"])){
            $admin_id = $_SESSION["login"]["id"];
            $user_id = $_POST["user_id"];
            $room_id = $_POST["room_id"];
            $date_start = $_POST["date_start"];
            $date_end = $_POST["date_end"];
            $method_payment = $_POST["method_payment"];
            
            
            $result->insert_contract($admin_id, $user_id, $room_id, $date_start, $date_end, $method_payment);
            if(!$result){
                setcookie("err", "Thêm hợp đồng không thành công!", time()+1, "/","", 0);
            }else{
                setcookie("suc", "Thêm hợp đồng thành công", time()+1, "/","", 0);
                $this->redirect($this->base_url("admin/contract/index"));
            }
        }
        
        $this->view("admin/contract/create", compact('students','rooms'));
    }
    public function update(){
        $result = new m_contract();
        if(isset($_GET['id'])){
            $update = $result->updateLiqui($_GET['id']);
            if(!$update){
                setcookie("err", "Thanh lý không thành công!", time()+1, "/","", 0);
            }else{
                setcookie("suc", "Thanh lý thành công", time()+1, "/","", 0);
                $this->redirect($this->base_url("admin/contract/index"));
            }
        }
    }
    public function deletecontractliqui(){
        if(isset($_GET["id"])){
            $result = new m_contract();
            $del = $result->deleteContractLiqui($_GET["id"]);
            if(!$del){
                setcookie("err", "Không được xóa!", time()+1, "/","", 0);
            }else{
                setcookie("suc", "Xóa thành công!", time()+1, "/","", 0);
            }
            $this->redirect($this->base_url("admin/contract/indexliquid"));
        }
    }
}