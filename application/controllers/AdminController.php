<?php
class AdminController extends Controller
{
    private function getController($controller, $action = '', $parameter = '')
    {
        $controllerPath = ROOT . '/application/controllers/admin/' . ucfirst($controller) . 'Controller.php';

        if (file_exists($controllerPath)) {

            require_once $controllerPath;
            $controllerName = ucfirst($controller) . "Controller";
            $object = new $controllerName();

            $act = ($action != '') ? $action : 'index';
            $param = array($parameter);

            if (method_exists($controllerName, $act)) {
                call_user_func_array(array($object, $act), $param);
            } else die('Action not Found!');
        } else die('Controller not Found!');
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
