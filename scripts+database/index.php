<?php
ob_start();
session_start();
//load autoload
require_once 'autoload.php'; //autoload
require_once 'config/db.php'; //database
require_once 'config/parameters.php'; //params de url
require_once 'helpers/utils.php'; // helpers
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

function show_error(){
   $error = new ErrorController();
   $error->index();
}

//check if the parameter arrives
if(isset($_GET['controller'])){
    
$name_controller = $_GET['controller'].'Controller';
   
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    //to show the default html index
    $name_controller = controller_default;
}else{

    show_error();
    exit();
}
 

//check if driver exists
if (isset($name_controller) && class_exists($name_controller)) {
    
    $controllerr = new $name_controller();
    
    if (isset($_GET['action']) && method_exists($controllerr, $_GET['action'])) {
        $action = $_GET['action'];

        $controllerr->$action();
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        //to show the default html index
        $action_default = action_default;
        $controllerr->$action_default();
    } else {
        show_error();
    }
} else {
   show_error();
}
