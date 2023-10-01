<?php

use application\controllers\MainController;

class LoadingController extends MainController
{
    public function index()
    {
        $sub_id = !empty($_GET['sub_id']) ? $_GET['sub_id'] : '';
        $view = $this->view('register');
        $view->bind('sub_id', $sub_id);
    }
}
