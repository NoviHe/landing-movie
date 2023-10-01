<?php

namespace application\controllers;

use Controller;

class MainController extends Controller
{
    public function template($viewName, $data = array())
    {
        // var_dump($data['hack_title']);
        // die;

        $view = $this->view('template');
        $view->bind('viewName', $viewName);
        $view->bind('data', $data);

        $view->bind('hack_title', isset($data['hack_title']) ? $data['hack_title'] : SITE_NAME . ' Movie Full HD');

        $view->bind('hack_description', isset($data['hack_description']) ? $data['hack_description'] : SITE_DESCRIPTION);

        $view->bind('hack_keywords', isset($data['data']['hack_keywords']) ? SITE_KEYWORDS . ', ' . $data['data']['hack_keywords'] : SITE_KEYWORDS);

        $view->bind('images', isset($data['data']['images']) ? $data['data']['images'] : null);
        
                $view->bind('hack_images', isset($data['data']['hack_images']) ? $data['data']['hack_images'] : null);

    }
}
