<?php
include "core/database.php";
class m_bill extends DB
{

    public function getAllRooms()
    {
        $sql = "SELECT * FROM rooms";
        return $this->get_list($sql);
    }

    public function insertBillEW($room_id, $e_first, $e_last, $price_per_e, $w_first, $w_last, $price_per_w, $start_date, $end_date, $status, $payment)
    {
        if ($payment == '') {
            $sql = "INSERT INTO electric_water 
                VALUES (null,$e_first, $e_last, $price_per_e, $w_first, $w_last, $price_per_w, $room_id, '$start_date', '$end_date', null, $status)";
        } else {
            $sql = "INSERT INTO electric_water 
                VALUES (null,$e_first, $e_last, $price_per_e, $w_first, $w_last, $price_per_w, $room_id, '$start_date', '$end_date', $payment, $status)";
        }
        return $this->query($sql);
    }


    public function getAllEW()
    {
        $sql = "SELECT electric_water.*, rooms.room_name FROM electric_water INNER JOIN rooms ON electric_water.rooms_id = rooms.id";
        return $this->get_list($sql);
    }

    public function getEWBById($id){
        $sql = "SELECT electric_water.*, rooms.room_name FROM electric_water INNER JOIN rooms ON electric_water.rooms_id = rooms.id WHERE electric_water.id = $id";
        return $this->get_row($sql);
    }

    public function editEWB($id, $room_id, $e_first, $e_last, $price_per_e, $w_first, $w_last, $price_per_w, $start_date, $end_date, $status, $payment)
    {
        if ($payment == '') {
            $sql = "UPDATE electric_water 
                    SET e_first=$e_first,e_last=$e_last,price_per_e=$price_per_e,w_first=$w_first,w_last=$w_last,price_per_w=$price_per_w,rooms_id=$room_id,start_date='$start_date',end_date='$end_date',payment=null,status=$status 
                    WHERE id = $id";
        } else {
            $sql = "UPDATE electric_water 
                    SET e_first=$e_first,e_last=$e_last,price_per_e=$price_per_e,w_first=$w_first,w_last=$w_last,price_per_w=$price_per_w,rooms_id=$room_id,start_date='$start_date',end_date='$end_date',payment=$payment,status=$status
                    WHERE id = $id ";
        }
        return $this->query($sql);
    }

    public function deleteById($id){

        $sql = "DELETE FROM electric_water WHERE id = $id";

        return $this->query($sql);
    }

    public function getBillByRoomId($id){
        $sql = "SELECT * FROM electric_water WHERE rooms_id = $id";
        return $this->get_list($sql);
    }

    public function getRoomId($id){
        $sql = "SELECT room_id FROM contracts WHERE student_id = $id";
        return $this->get_row($sql);
    }

    #Invoice
    public function getAllInvoice()
    {
        $sql = "SELECT invoices.*, users.name
        FROM invoices INNER JOIN users
        ON invoices.student_id = users.username";
        return $this->get_list($sql);
    }

    public function getInvoiceDetailsByID($id)
    {
        $sql = "SELECT invoice_details.id as invoice_detailsID, invoice_details.service_id as serviceID, services.*
        FROM invoice_details 
        INNER JOIN services ON invoice_details.service_id = services.id
        WHERE invoice_details.invoices_id = $id";
        return $this->get_list($sql);
    }

    public function delete_invoice($id)
    {
        $sql = "DELETE FROM invoices WHERE id = $id";
        return $this->query($sql);
    }

    public function create_invoice($user_id, $student_id, $status)
    {
        $sql = "INSERT INTO invoices(id, created_at, user_id, student_id, status) 
                VALUES (null, STR_TO_DATE('".date('Y-m-d')."', '%Y-%m-%d'),$user_id,$student_id,$status)";
        return $this->lastId($sql);
    }

    public function getAllUserByRole($role)
    {
        $sql = "SELECT * FROM users WHERE role = $role AND status = 1";
        return $this->get_list($sql);
    }

    public function getAllService(){
        $sql = "SELECT * FROM services ";
        return $this->get_list($sql);
    }

    public function create_invoice_dentals($invoice_id, $service_id){
        $sql = "INSERT INTO invoice_details VALUES (null,$invoice_id,$service_id)";
        return $this->query($sql);
    }
}
