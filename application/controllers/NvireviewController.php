<?php

use application\controllers\MainController;

class NvireviewController extends MainController
{
    public function index()
    {
        // $sub_id = !empty($_GET['s1']) ? $_GET['s1'] : '';
        // $view = $this->view('locker/many-pacquiao');
        // $view->bind('s1', $sub_id);
        $this->redirect('processing');
    }

    function many_pacquiao()
    {
        // $sub_id = !empty($_GET['s1']) ? $_GET['s1'] : '';
        $view = $this->view('locker/many-pacquiao');
        // $view->bind('s1', $sub_id);
    }
}
