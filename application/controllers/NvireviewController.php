<?php

use application\controllers\MainController;

#[\AllowDynamicProperties]
class NvireviewController extends MainController
{
    public function index()
    {
        $this->redirect('processing');
    }

    function many_pacquiao()
    {
        $view = $this->view('locker/many-pacquiao');
    }
}
