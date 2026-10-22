<?php

use application\controllers\admin\AdminMainController;

#[\AllowDynamicProperties]
class DashboardController extends AdminMainController
{
    public function index()
    {
        $this->template('admin/dashboard', 'Dashboard');
    }
}
