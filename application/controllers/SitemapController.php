<?php

use application\controllers\MainController;

class SitemapController extends MainController
{
    public function index()
    {
        // $sub_id = !empty($_GET['sub_id']) ? $_GET['sub_id'] : '';
        $view = $this->view('sitemap/index');
        // $view->bind('sub_id', $sub_id);
    }

    function post()
    {
        $limit = 500;
        $path = DOCUMENT_ROOT . '/cache/single/';
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        if ($handle = opendir($path)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $daftar[] = $entry;
                }
            }
        }
        if (is_array($daftar)) :
            $i = 0;
            foreach ($daftar as $key => $val) {
                if (file_exists($path . $val)) {
                    $data = @file_get_contents($path . $val);
                    $unserialize = unserialize($data);
                    $uhoh['id']      = $unserialize['id'];
                    $uhoh['slug']    = $unserialize['slug'];
                    $uhoh['title']   = $unserialize['title'];
                    $uhoh['pubdate'] = $unserialize['pubdate'];
                    $damn[] = $uhoh;
                }
                $i++;
                if ($i == $limit) break;
            }
        endif;
        closedir($handle);
        $recent_post = $damn;
        $view = $this->view('sitemap/sitemap-post');
        $view->bind('recent_post', $recent_post);
    }
}
