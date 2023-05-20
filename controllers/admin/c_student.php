<?php
include "models/m_student.php";
class c_student extends controller
{

    public function __construct()
    {
        $this->auth();
        $this->permission(0);
    }

    public function index()
    {
        $student = new m_student();
        $students = $student->get_all_students();
        $rooms = $student->getAllRooms();
        $this->view("admin/student/index", compact('students', 'rooms'));
    }

    public function create()
    {

        $student = new m_student();
        $user = $student->get_all_user();
        $room = $student->getAllRooms();
        $check = $student->checkNumStudent();

        if (isset($_POST["idStudent"])) {
            $check = $student->checkIssetStudent($_POST["idStudent"]);
            if (count($check) == 0) {
                echo 1;
            } else {
                echo 0;
            }
            return 1;
        }

        if (isset($_POST["submit"])) {
            $id =  $_POST["id"];
            $password = "Sv" . $id;
            $name = $_POST["name"];
            $sex = $_POST["gender"];
            $date_birth = $_POST["date_birth"];
            $address = $_POST["address"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $avatar_url = ($_FILES['avatar']['error'] == 0) ? rand(0, 1000) . $_FILES['avatar']['name'] : "avatar-default.png";
            $id_user_create = $_SESSION['login']['id'];

            $insert = $student->insert_student($id, md5($password), $name, $sex, $date_birth, $address, $email, $phone, $id_user_create, $avatar_url);

            if ($insert) {
                if ($avatar_url != "") {
                    $this->uploadFileImage($_FILES['avatar']['tmp_name'], "public/avatar", $avatar_url);
                }
                setcookie("suc", "Thêm sinh viên thành công!", time() + 1, "/", "", 0);
                $this->redirect($this->base_url("admin/student/index"));
            }
        }
        $this->view("admin/student/create", compact('room', 'check'));
    }


    public function edit()
    {
        if (isset($_GET["id"])) {
            $result = new m_student();
            $student = $result->get_student_by_id($_GET["id"]);
            $rooms = $result->getAllRooms();
            $numStudent = $result->checkNumStudent();

            if (isset($_POST["idStudent"])) {
                $check = $result->checkIssetStudent($_POST["idStudent"]);
                if (count($check) == 0) {
                    echo 1;
                } elseif ($_POST["idStudent"] == $_GET["id"]) {
                    echo 1;
                } else {
                    echo 0;
                }
                return 1;
            }

            if (isset($_POST["submit"])) {
                $id = $_POST["id"];
                $name = $_POST["name"];
                $sex = $_POST["gender"];
                $date_birth = $_POST["date_birth"];
                $address = $_POST["address"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                $avatar_url = ($_FILES['avatar']['error'] == 0) ? rand(0, 1000) . $_FILES['avatar']['name'] : "";
                if (!$avatar_url) {
                    $avatar_url = $student["avatar_url"];
                }


                $update = $result->update_student_by_id($id, $name, $sex, $date_birth, $address, $email, $phone, $avatar_url, $_GET["id"]);
                if (!$update) {
                    setcookie("err", "Cập nhật thất bại!!", time() + 1, "/", "", 0);
                } else {
                    if ($avatar_url != "") {
                        unlink("public/avatar/" . $student["avatar_url"]);
                        if (!$this->uploadFileImage($_FILES['avatar']['tmp_name'], "public/avatar", $avatar_url)) {
                            setcookie("err", "Cập nhật file thất bại!!", time() + 1, "/", "", 0);
                        }
                        ;
                    }
                    setcookie("suc", "Cập nhật thành công!!", time() + 1, "/", "", 0);

                    $this->redirect($this->base_url("admin/student/index"));
                }
            }

            $this->view("admin/student/edit", compact('student', 'rooms', 'numStudent'));
        }
    }

    public function delete()
    {
        if (isset($_GET["id"])) {
            $result = new m_student();
            $student = $result->get_student_by_id($_GET["id"]);
            $link = $student["avatar_url"];

            $check = $result->getContractById($_GET["id"]);

            if ($check) {
                setcookie("err", "Lỗi! Vui lòng thanh lý hợp đồng trước khi xóa!", time() + 1, "/", "", 0);
            } else {
                $del = $result->delete_student($_GET["id"]);
                if (!$del) {
                    setcookie("err", "Không được xóa!", time() + 1, "/", "", 0);
                } else {
                    if ($link != "avatar-default.png") {
                        if (file_exists("public/avatar/" . $link)) {
                            $status = unlink("public/avatar/" . $link);
                            if ($status) {
                                setcookie("suc", "Xóa thành công", time() + 1, "/", "", 0);
                            }
                        }
                    }else{
                        setcookie("suc", "Xóa thành công", time() + 1, "/", "", 0);
                    }
                }
            }
            $this->redirect($this->base_url("admin/student/index"));
        }
    }
}