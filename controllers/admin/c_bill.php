<?php
include "models/m_bill.php";

class c_bill extends controller
{

    public function __construct()
    {
        $this->auth();
        $this->permission(0);
    }

    public function indexEWB()
    {
        $result = new m_bill();
        $bill_ew = $result->getAllEW();
        // echo 1;
        $this->view("admin/bill/electricWaterBill", compact('bill_ew'));
    }

    public function createEWB()
    {
        $result = new m_bill();
        $rooms = $result->getAllRooms();
        if (isset($_POST["submit"])) {
            $room_id = $_POST["room_id"];
            $e_first = $_POST["e_first"];
            $e_last = $_POST["e_last"];
            $price_per_e = $_POST["price_per_e"];
            $w_first = $_POST["w_first"];
            $w_last = $_POST["w_last"];
            $price_per_w = $_POST["price_per_w"];
            $start_date = $_POST["start_date"];
            $end_date = $_POST["end_date"];
            $status = $_POST["status"];
            $payment = isset($_POST["payment"]) ? $_POST["payment"] : null;

            $insert = $result->insertBillEW($room_id, $e_first, $e_last, $price_per_e, $w_first, $w_last, $price_per_w, $start_date, $end_date, $status, $payment);
            if ($insert) {
                setcookie("suc", "Tạo mới hóa đơn điền nước thành công!!", time() + 1);
                $this->redirect($this->base_url("admin/bill/list-electric-water"));
            }
        }
        $this->view("admin/bill/createElectricWaterBill", compact('rooms'));
    }

    public function editEWB()
    {
        $result = new m_bill();
        $id = $_GET["id"];
        $rooms  = $result->getAllRooms();
        $billew = $result->getEWBById($id);
        if (isset($_POST["submit"])) {
            $room_id = $_POST["room_id"];
            $e_first = $_POST["e_first"];
            $e_last = $_POST["e_last"];
            $price_per_e = $_POST["price_per_e"];
            $w_first = $_POST["w_first"];
            $w_last = $_POST["w_last"];
            $price_per_w = $_POST["price_per_w"];
            $start_date = $_POST["start_date"];
            $end_date = $_POST["end_date"];
            $status = $_POST["status"];
            $payment = isset($_POST["payment"]) ? $_POST["payment"] : null;

            $insert = $result->editEWB($id, $room_id, $e_first, $e_last, $price_per_e, $w_first, $w_last, $price_per_w, $start_date, $end_date, $status, $payment);
            if ($insert) {
                setcookie("suc", "Sửa hóa đơn điền nước thành công!!", time() + 1, "/", "", 0);
                $this->redirect($this->base_url("admin/bill/list-electric-water"));
            }
        }
        $this->view("admin/bill/editElectricWaterBill", compact('rooms', 'billew'));
    }


    public function deleteEWB()
    {
        if (isset($_GET["id"])) {
            $result = new m_bill();
            $deletee = $result->deleteById($_GET["id"]);
            if ($deletee) {
                setcookie("suc", "Xóa hóa đơn thành công!", time() + 1, "/", "", 0);
            }
            $this->redirect($this->base_url("admin/bill/list-electric-water"));
        }
    }


    public function invoice()
    {
        $m_bill = new m_bill();
        $invoice_list = $m_bill->getAllInvoice();
        $this->view("admin/bill/invoice", compact('invoice_list'));
    }

    public function invoiceDetails()
    {
        $m_bill = new m_bill();
        $invoiceDetails_list = $m_bill->getInvoiceDetailsByID($_GET['id']);
        $this->view("admin/bill/invoiceDetails", compact('invoiceDetails_list'));
    }

    public function createInvoice()
    {
        $m_bill = new m_bill();
        $allStudent = $m_bill->getAllUserByRole(1);
        $allService = $m_bill->getAllService();
        if (isset($_POST['submit'])) {
            $user_id = $_SESSION['login']['id'];
            $student_id = $_POST['student_id'];
            $status = $_POST['status'];
            $service = $_POST['service'];
            
            $create = $m_bill->create_invoice($user_id, $student_id, $status);
            if(!$create){
                setcookie("err", "Hoá đơn đã có!", time()+1, "/","", 0);
            }else{
                foreach($service as $value){
                    $ins = $m_bill->create_invoice_dentals($create, $value);
                }
                if(!$ins){
                    setcookie("err", "Không thêm đc!", time()+1, "/","", 0);
                }else{
                    setcookie("suc", "Thêm hoá đơn dịch vụ thành công", time()+1, "/","", 0);
                }
                $this->redirect($this->base_url("admin/bill/invoice"));
            }
        }
        $this->view("admin/bill/createInvoice", compact('allStudent','allService'));
    }

    public function editInvoice()
    {

        $this->view("admin/bill/editInvoice");
    }

    public function deleteInvoice()
    {
        if (isset($_GET["id"])) {
            $m_bill = new m_bill();
            $del = $m_bill->delete_invoice($_GET["id"]);
            if (!$del) {
                setcookie("err", "Không được xóa!", time() + 1, "/", "", 0);
            } else {
                setcookie("suc", "Xóa thành công!", time() + 1, "/", "", 0);
            }
            $this->redirect($this->base_url("admin/bill/invoice"));
        }
    }
}
