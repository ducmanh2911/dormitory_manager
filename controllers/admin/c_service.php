<?php
include "models/m_service.php";
class c_service extends controller
{

    function __construct()
    {
        $this->auth();
        $this->permission(0);
    }

    public function index()
    {
        $m_service = new m_service();
        $list_service = $m_service->getAllService();
        $this->view("admin/service/index", compact('list_service'));
    }

    public function create()
    {
        $m_service = new m_service();

        if (isset($_POST["submit"])) {
            $name = $_POST['name'];
            $describe = $_POST['describe'];
            $price = $_POST['price'];
            $status = $_POST['status'];

            $result = $m_service->insert_service($name, $describe, $price, $status);
            if (!$result) {
                setcookie("err", "Không thể thêm dịch vụ này!", time() + 1, "/", "", 0);
            } else {
                setcookie("suc", "Thêm dịch vụ thành công thành công", time() + 1, "/", "", 0);
                $this->redirect($this->base_url("admin/service/index"));
            }
        }
        $this->view("admin/service/create");
    }

    public function edit()
    {
        $m_service = new m_service();
        if (isset($_GET["id"])) {
            $service_id = $_GET["id"];
            $service_data = $m_service->getAllServiceByID($service_id);
            if (isset($_POST["submit"])) {
                $name = $_POST['name'];
                $describe = $_POST['describe'];
                $price = $_POST['price'];
                $status = $_POST['status'];

                $update = $m_service->update_service($_GET["id"], $name, $describe, $price, $status);
                if (!$update) {
                    setcookie("err", "Không thể sửa thông tin dịch vụ!", time() + 1, "/", "", 0);
                } else {
                    setcookie("suc", "Sửa dịch vụ thành công", time() + 1, "/", "", 0);
                    $this->redirect($this->base_url("admin/service/index"));
                }
            }
        }
        $this->view("admin/service/edit", compact('service_data'));
    }

    public function delete()
    {
        if (isset($_GET["id"])) {
            $m_service = new m_service();

            $del = $m_service->delete_service($_GET["id"]);
            if (!$del) {
                setcookie("err", "Không được xóa!", time() + 1, "/", "", 0);
            } else {
                setcookie("suc", "Xóa thành công!", time() + 1, "/", "", 0);
            }
            $this->redirect($this->base_url("admin/service/index"));
        }
    }
}
