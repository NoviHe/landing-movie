<?php

use application\controllers\admin\AdminMainController;

class DashboardController extends AdminMainController
{
    public function index()
    {
        $this->template('admin/dashboard', 'Dashboard');
    }
}
