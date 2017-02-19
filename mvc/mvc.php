<?php
$controller = 'home';
$action = 'login';

session_start();

if (isset($_SESSION['Email'])) {
    $controller = isset($_REQUEST['controller']) ? strtolower($_REQUEST['controller']) : 'home';
    $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';
}

require_once __DIR__ . "/controller/$controller.controller.php";

$controller = ucwords($controller) . 'Controller';
$controller = new $controller($action);

call_user_func( array( $controller, $action ) );
?>
