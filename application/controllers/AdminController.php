<?php

#[\AllowDynamicProperties]
class AdminController extends Controller
{
    private function getController($controller, $action = '', $parameter = '')
    {
        $controllerPath = ROOT . '/application/controllers/admin/' . ucfirst($controller) . 'Controller.php';

        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $controllerName = ucfirst($controller) . "Controller";
            if (class_exists($controllerName)) {
                $object = new $controllerName();
                $act = (!empty($action)) ? $action : 'index';
                $param = ($parameter !== '' && $parameter !== null) ? array($parameter) : array();

                if (method_exists($object, $act)) {
                    call_user_func_array(array($object, $act), $param);
                } else {
                    die('Action not Found!');
                }
            } else {
                die('Controller Class not Found!');
            }
        } else {
            die('Controller not Found!');
        }
    }

    public function index()
    {
        $this->getController('dashboard');
    }

    public function builder($action = '', $parameter = '')
    {
        $this->getController('builder', $action, $parameter);
    }
}
