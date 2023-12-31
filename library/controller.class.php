<?php
class Controller
{
    protected function view($viewName)
    {
        return new View($viewName);
    }

    protected function model($modelName)
    {
        require_once ROOT . "/application/models/" . $modelName . ".model.php";
        $className = ucfirst($modelName) . "Model";
        $this->$modelName = new $className();
    }

    protected function template($viewName, $data = array())
    {
        $view = $this->view('template');
        $view->bind('viewName', $viewName);
        $view->bind('data', $data);
    }

    public function back()
    {
        echo '<script>histori.go(-1)</script>';
    }

    public function redirect($url = "")
    {
        header('location: ' . BASE_PATH . DS . $url);
    }

    public function validate($data)
    {
        return htmlentities(trim(strip_tags($data)));
    }

    protected function api($apiModelName)
    {
        require_once ROOT . "/application/api/" . $apiModelName . ".api.php";
        $classApiName = ucfirst($apiModelName) . "Api";
        $this->$apiModelName = new $classApiName();
    }
}
