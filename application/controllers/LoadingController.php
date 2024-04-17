<?php

use application\controllers\MainController;

class LoadingController extends MainController
{
    public function index()
    {
        $sub_id = !empty($_GET['s1']) ? $_GET['s1'] : '';
        $view = $this->view('register');
        $view->bind('sub_id', $sub_id);
    }
}
