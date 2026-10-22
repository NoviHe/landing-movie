<?php

use application\controllers\admin\AdminMainController;

#[\AllowDynamicProperties]
class BuilderController extends AdminMainController
{
    public function index()
    {
        $this->template('admin/page-builder/index', 'Page Builder');
    }

    public function create()
    {
        $this->template('admin/page-builder/create', 'Page Builder');
    }
}
