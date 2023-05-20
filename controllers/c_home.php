<?php
include "models/m_home.php";
class c_home extends controller {

    function __construct()
    {
        $this->auth();
    }

    public function index(){
        // die($_SESSION['login']['color_scheme']);
        $result = new m_home();
        if(isset($_POST["valBg"])){
            $user_id = $_SESSION["login"]["id"];
            echo  $user_id ;
            if($_POST["valBg"] == "light"){
                $update = $result->updateBgColor(0,$user_id );
                var_dump($update);
            }
            if($_POST["valBg"] == "dark"){
                $update1 = $result->updateBgColor(1,$user_id );
                var_dump($update1);
            }
            $students = $result->getBgColor($user_id);
            $_SESSION['login']['color_scheme'] = $students["color_scheme"];
            return 1;
        }
        $this->view("home/index");
    }

    public function viewpermission(){
        $this->view("home/permission");
    }
}
?>