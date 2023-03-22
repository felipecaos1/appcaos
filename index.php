<?php 
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php'; 
require_once 'helpers/helper.php';

?>

<?php if( $_GET['controller']=='usuario' && !$_GET['action']=='login'){
    require_once 'views/layouts/header.php'; 
} 
// require_once 'views/layouts/sidebar.php'; 
// require_once 'views/layouts/topbar.php';

?>

<?php
//Funcion para mostrar error
function showError()
{
    $error = new errorController();
    $error->index();
}

// 
if (isset($_GET['controller']) && class_exists($_GET['controller'] . 'Controller')) {

    $nombre_controlador = $_GET['controller'] . 'Controller';
    $controlador = new $nombre_controlador();

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {

        $action = $_GET['action'];
        $controlador->$action();
        
    }else {
        
        showError();
    }

}elseif (!isset($_GET['controller'])) {

    $nombre_controlador = CONTROLLER_DEFAULT.'Controller';
    $controlador = new $nombre_controlador();
    $action = ACTION_DEFAULT;
    $controlador->$action();

}else{
   
    showError();
}




require_once 'views/layouts/footer.php' ;