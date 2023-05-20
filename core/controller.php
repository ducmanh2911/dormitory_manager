<?php
class controller
{
    public function auth()
    {
        if (!isset($_SESSION["login"])) {
            setcookie("err", "Chưa đăng nhập!!", time() + 1, "/", "", 0);
            $this->redirect($this->base_url("login"));
            die();
        }else{
            if($_SESSION["login"]["status"] == 0){
                setcookie("err", "Tài khoản bị khóa!!", time() + 1, "/", "", 0);
                unset($_SESSION["login"]);
                $this->redirect($this->base_url("login"));
                die();
            }
        }
    }

    public function permission($role){
        if($role == 0){
            if($_SESSION["login"]["role"] == 1){
                // setcookie("err", "Bạn không đủ quyền truy cập trang này!!", time() + 1, "/", "", 0);
                $this->redirect($this->base_url("home/viewpermission"));
                die();
            }
        }

    }

    public function base_url($url = '')
    {
        $a = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"];
        if ($a == 'http://localhost') {
            $a = _WEB_ROOT;
        }
        return $a . '/' . $url;
    }

    public function redirect($url)
    {
        header("Location: {$url}");
        exit();
    }

    public function view($path, $data = [])
    {
        $view = "views/" . $path . ".php";
        if (file_exists($view)) {
            if(strlen(strstr($view, "admin")) > 0){
                $layout = "views/admin/layout/layout.php";
                require_once($layout);
            }else{
                $layout = "views/layout/layout.php";
                require_once($layout);
            }
        }
    }

    public function formatDate($date){
        return date_format(date_create($date), "d-m-Y");
    }

    public function uploadFileImage($tmp,$path, $basename){
        $link  = $path."/".$basename;
        if(!file_exists($path.$basename)){
            if (!file_exists($path)) {
                mkdir($path,  0777,  TRUE);
                move_uploaded_file($tmp, $link);
                return true;
            } else {
                move_uploaded_file($tmp, $link);
                return true;
            }
        }
        return false;
    }
}
