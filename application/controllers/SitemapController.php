<?php

use application\controllers\MainController;

#[\AllowDynamicProperties]
class SitemapController extends MainController
{
    public function index()
    {
        $view = $this->view('sitemap/index');
    }

    function post()
    {
        $limit = 500;
        $path = DOCUMENT_ROOT . '/cache/single/';
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $daftar = [];
        $damn = [];
        if ($handle = opendir($path)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $daftar[] = $entry;
                }
            }
            closedir($handle);
        }
        if (!empty($daftar)) :
            $i = 0;
            foreach ($daftar as $key => $val) {
                if (file_exists($path . $val)) {
                    $data = @file_get_contents($path . $val);
                    $unserialize = @unserialize($data);
                    if (is_array($unserialize)) {
                        $uhoh = [];
                        $uhoh['id']      = $unserialize['id'] ?? '';
                        $uhoh['slug']    = $unserialize['slug'] ?? '';
                        $uhoh['title']   = $unserialize['title'] ?? '';
                        $uhoh['pubdate'] = $unserialize['pubdate'] ?? '';
                        $damn[] = $uhoh;
                    }
                }
                $i++;
                if ($i == $limit) break;
            }
        endif;
        $recent_post = $damn;
        $view = $this->view('sitemap/sitemap-post');
        $view->bind('recent_post', $recent_post);
    }

    function search()
    {
        $limit = 500;
        $pos = '0';
        $sep = ",";
        $word_path = DOCUMENT_ROOT . '/keyword/';
        if (!file_exists($word_path)) :
            mkdir($word_path, 0755, true);
        endif;

        $handle = '';
        if (file_exists($word_path . 'items' . $pos . '.txt')) :
            $handle = file_get_contents($word_path . 'items' . $pos . '.txt');
        endif;

        $output = [];
        if (!empty($handle)) :
            $result = explode($sep, $handle);
            $res = array_slice($result, -$limit, $limit, true);
            if (!empty($res)) :
                shuffle($res);
                foreach ($res as $hasil) :
                    $hasil = trim($hasil);
                    if ($hasil !== '') :
                        $output[] = ['title' => $hasil];
                    endif;
                endforeach;
            endif;
        endif;

        if (empty($output)) :
            $output[] = ['title' => 'hello world'];
        endif;

        $view = $this->view('sitemap/sitemap-0');
        $view->bind('recent_post', $output);
    }
}
