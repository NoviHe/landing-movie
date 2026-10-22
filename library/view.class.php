<?php

#[\AllowDynamicProperties]
class View
{
    public $viewName = NULL;
    public $isRender = FALSE;
    public $data = array();

    public function __construct($view)
    {
        $this->viewName = $view;
    }

    public function bind($name, $value = '')
    {
        $this->data[$name] = $value;
    }

    public function render()
    {
        $this->isRender = TRUE;
        extract($this->data);
        $view = ROOT . "/application/views/" . $this->viewName . ".view.php";
        if (file_exists($view)) {
            require $view;
        } else {
            echo ('View not Found: ' . htmlspecialchars((string)$this->viewName));
        }
    }

    public function __destruct()
    {
        if (!$this->isRender) {
            $this->render();
        }
    }
}
