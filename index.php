<?php
@session_start();
include_once "core/request.php";
include_once "core/controller.php";
define('_DIR_ROOT', __DIR__);

if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
}else{
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}

$forder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']),'', str_replace('\\','/', strtolower(_DIR_ROOT)));
$web_root = trim($web_root . trim($forder, '\\'), '/');

define('_WEB_ROOT', $web_root);

$request = new Request();
$controllerName = $request->controller;
$methodName = $request->method;
$role = $request->role;


// create controllerName
if($role == "admin"){
    require_once('controllers/admin/' . $controllerName . '.php');
}else{
    require_once('controllers/' . $controllerName . '.php');
}
$controller = new $controllerName();
$controller->{$methodName}();
