<?php

use application\controllers\MainController;

class ProcessingController extends MainController
{
    public function index()
    {
        $sub_id = !empty($_GET['sub_id']) ? $_GET['sub_id'] : '';
        $view = $this->view('page/register-ads');
        $view->bind('sub_id', $sub_id);
    }
}