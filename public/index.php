<?php
session_start();

// konstanta ROOT
define('ROOT', dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);

// menyimpan data url 
$url = isset($_GET['url']) ? (string)$_GET['url'] : '';

// memanggil file config
require_once(ROOT . '/config/config.php');
require_once(ROOT . '/library/controller.class.php');
require_once(ROOT . '/library/model.class.php');
require_once(ROOT . '/library/view.class.php');
require_once(ROOT . '/library/tmdb.class.php');
require_once(ROOT . '/config/option.php');

// membuat function autoload
spl_autoload_register(function ($className) {
    $dir = ROOT . DS . str_replace("\\", DS, $className) . ".php";
    if (file_exists($dir)) require_once($dir);
});

// function pesan error
function setReporting()
{
    if (DEVELOPMENT_ENVIRONMENT == true) {
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors', '0');
        ini_set('log_errors', '1');
        ini_set('error_log', ROOT . '/tmp/log/error.log');
    }
}

// function memanggil controller sesuai nilai url
function callHook()
{
    global $url;
    $trimmedUrl = trim($url, "/");
    $urlArray = ($trimmedUrl !== '') ? explode("/", $trimmedUrl) : [];

    $controller = (!empty($urlArray[0])) ? $urlArray[0] : DEFAULT_CONTROLLER;

    $controllerPath = ROOT . '/application/controllers/' . ucfirst($controller) . 'Controller.php';

    if (file_exists($controllerPath)) {
        array_shift($urlArray);
        $action = (!empty($urlArray[0])) ? $urlArray[0] : "index";
        array_shift($urlArray);
        $parameter = $urlArray;

        require_once $controllerPath;
        $controllerName = ucfirst($controller) . "Controller";
        if (class_exists($controllerName)) {
            $object = new $controllerName();
            if (method_exists($object, $action)) {
                call_user_func_array(array($object, $action), $parameter);
            } else {
                http_response_code(404);
                die('Action not Found');
            }
        } else {
            http_response_code(404);
            die('Controller class not Found');
        }
    } else {
        http_response_code(404);
        die('Controller not Found');
    }
}

setReporting();
callHook();
